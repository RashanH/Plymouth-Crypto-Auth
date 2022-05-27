<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = Key::where('user_id', '=', Auth::id())->paginate(10);

        return view('product.list', compact('products','products'));
    }
    
    public function generate_serial_code() {

        $serial = Str::random(5) . '-' . Str::random(5) . '-' . Str::random(5) . '-' . Str::random(5) . '-' . Str::random(5);
        $serial = strtoupper($serial);

        if (Key::where('key_code', '=', $this->plainKeyToEncrypted($serial))->where('user_id', '=', Auth::id())->count() > 0){
            $this->generate_serial_code();
        }
    
        return $serial;
    }

    public function generate_serial(Request $request) {
        return $this->generate_serial_code();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Product $product)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        //return $product;
        $productx = Product::select('user_id')
        ->where('id', '=', $product->id)
        ->first();

        if ($productx->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }
        $serial = $this->generate_serial_code();

        return view('key.create', compact('product', 'serial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }

        $request->validate([
            'product_id'=>'required',
            'key_code' => 'required',
            'maximum_devices' => 'required',
            'expires_at' => 'required',
            'customer_email' => 'required|email',
        ]);

        $product = Product::select('user_id')
        ->where('id', '=', $request->get('product_id'))
        ->first();

        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }

        
            if (Key::where('key_code', '=', $this->plainKeyToEncrypted($request->get('key_code')))->where('user_id', '=', Auth::id())->count() > 0){ return back()->withErrors('The serial key is already available.')->withInput(); }
        
        $prev_customer = Customer::select('id')
            ->where('user_id', '=', Auth::id())
            ->where('email', '=', $request->get('customer_email'))
            ->first();
        
            

        $customer_id = 0;
        if (!$prev_customer) { 
            //create customer
            $customer = new Customer([
                'user_id' => Auth::id(),
                'first_name' => $request->get('customer_first_name'),
                'last_name'=> $request->get('customer_last_name'),
                'email'=> $request->get('customer_email'),
                'company'=> $request->get('customer_company'),
            ]);
            $customer->save();
            $customer_id = $customer->id;
        } else{
            $customer_id = $prev_customer->id;
        }
        
        //$mytime = Carbon::now();

        $key = new Key([
            'user_id' => Auth::id(),
            'product_id' => $request->get('product_id'),
            'customer_id' =>  $customer_id,
            'key_code' => $this->plainKeyToEncrypted($request->get('key_code')),
            'maximum_devices' => $request->get('maximum_devices'),
            'is_blocked' => $request->has('is_blocked'),
            'notes'=> $request->get('notes'),
            'expires_at'=> Carbon::createFromFormat('Y-m-d', $request->get('expires_at'))->toDateTimeString()
        ]);

        $key->save();
        return redirect('/products/' . $request->get('product_id'),)->with('success', 'Key has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function show(Key $key)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function edit(Key $key)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        //return $key;
        if ($key->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }

        $key->key_code = $this->encryptedToPlainKey($key->key_code);


        $product = Product::where('user_id', '=', Auth::id())
        ->where('id', '=', $key->product_id)
        ->first();
        //return $product;
        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }

        $customer = Customer::where('user_id', '=', Auth::id())
        ->where('id', '=', $key->customer_id)
        ->first();
        //return $customer;

        //todo - handle if delete customer
        //if ($customer->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }


        return view('key.edit',compact('key', 'product', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Key $key)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        $request->validate([
            'product_id'=>'required',
            'key_code' => 'required',
            'maximum_devices' => 'required',
            'expires_at' => 'required',
            'customer_email' => 'required|email',
        ]);

        $product = Product::select('user_id')
        ->where('id', '=', $request->get('product_id'))
        ->first();

        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }
        if ($key->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }

       
        if ($key->key_code != $this->plainKeyToEncrypted($request->get('key_code'))){
            if (Key::where('key_code', '=', $this->plainKeyToEncrypted($request->get('key_code')))->where('user_id', '=', Auth::id())->count() > 0){ return back()->withErrors('The serial key is already available.')->withInput(); }
        }

        $prev_customer = Customer::select('id')
            ->where('user_id', '=', Auth::id())
            ->where('email', '=', $request->get('customer_email'))
            ->first();
            
        $customer_id = 0;
        if (!$prev_customer) { 
            //create customer
            $customer = new Customer([
                'user_id' => Auth::id(),
                'first_name' => $request->get('customer_first_name'),
                'last_name'=> $request->get('customer_last_name'),
                'email'=> $request->get('customer_email'),
                'company'=> $request->get('customer_company'),
            ]);
            $customer->save();
            $customer_id = $customer->id;
        } else{
            $customer_id = $prev_customer->id;
        }
        
        $key = Key::find($key->id);
        $key->customer_id = $customer_id;
        $key->key_code = $this->plainKeyToEncrypted($request->get('key_code'));
        $key->maximum_devices = $request->get('maximum_devices');
        $key->is_blocked = $request->has('is_blocked');
        $key->notes = $request->get('notes');
        $key->expires_at = Carbon::createFromFormat('Y-m-d', $request->get('expires_at'))->toDateTimeString();
 
        $key->update();
        return redirect('/products/' . $request->get('product_id'),)->with('success', 'Key updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(Key $key)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        if ($key->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }

        $product_id = $key->product_id;

        $key->delete();
        return redirect('/products/'. $product_id)->with('success', 'Key deleted successfully');
    }

    public function plainKeyToEncrypted($plain_key) {
        return base64_encode(str_rot13($plain_key));
    }

    public function encryptedToPlainKey($_encrypted_key){
        return str_rot13(base64_decode($_encrypted_key));
    }
}
