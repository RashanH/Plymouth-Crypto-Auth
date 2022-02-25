<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Product $product)
    {
        //return $product;
        $productx = Product::select('user_id')
        ->where('id', '=', $product->id)
        ->first();

        if ($productx->user_id != Auth::id()){ return back()->withErrors('You don\'t have permissions.')->withInput(); }

        return view('key.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'key_code' => $request->get('key_code'),
            'maximum_devices' => $request->get('maximum_devices'),
            'is_blocked' => $request->has('is_blocked'),
            'notes'=> $request->get('notes'),
            'expires_at'=> Carbon::now()->addDays($request->get('expires_at'))->toDateTimeString()
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(Key $key)
    {
        //
    }
}
