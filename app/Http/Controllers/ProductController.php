<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

use App\Mail\MailNewPublicKey;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = Product::withCount('keys')
        ->where('products.user_id', '=', Auth::id())
        ->paginate(10);
        

        return view('product.list', compact('products','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate_rsa_key(){
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
        // Create the private and public key
        $res = openssl_pkey_new($config);
        
        // Extract the private key from $res to $privKey
        openssl_pkey_export($res, $privKey);
        
        // Extract the public key from $res to $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];

        $pubKey = Str::replace('-----BEGIN PUBLIC KEY-----', '', $pubKey);
        $pubKey = Str::replace('-----END PUBLIC KEY-----', '', $pubKey);
       
        return array('private' => $privKey, 'public' => $pubKey);
    }

    public function store(Request $request)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }

        $request->validate([
            'name'=>'required',
            'latest_version' => 'required'
        ]);

        //generate RSA
        $key_set = $this->generate_rsa_key();
        $encrypted_private = Crypt::encryptString($key_set['private']);

        $public = $key_set['public'];

        //return $encrypted_private;

        $product = new Product([
            'user_id' => Auth::id(),
            'name' => $request->get('name'),
            'latest_version' => $request->get('latest_version'),
            'force_latest_version' => $request->has('force_latest_version'),
            'description'=> $request->get('description'),
            'private_key'=> $encrypted_private //encrypted
        ]);

        $product->save();

        Mail::to(Auth::user()->email)
        ->send(new MailNewPublicKey($public, $product->name, $product->id));


        return redirect('/products')->with('success', 'Product has been added. Your new public key is send via an email.&nbsp;
        <a class="text-indigo-700" onclick="copy_public_key()" href="#"><div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full" style="background: #10ff005e; color:#000;">Copy public key</div></a><input type="text" id="public_key" value="' . $public . '" style="display:none;"><script>function copy_public_key() { var copyText = document.getElementById("public_key"); copyText.select(); copyText.setSelectionRange(0, 99999); navigator.clipboard.writeText(copyText.value); alert("Key copied to clipboard"); }</script>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }



        //$keys = Key::where('product_id', '=', $product->id)->paginate(10);

        $keys = Key::select('keys.*', 'first_name', 'last_name', 'email', 'company')
        ->where('product_id', '=', $product->id)
        ->leftJoin('customers', 'keys.customer_id', '=', 'customers.id')
        ->paginate(10);

        //return $keys;

        return view('product.view',compact('product', 'keys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
     
        $request->validate([
            'name'=>'required',
            //'secret_code' => 'required',
            'latest_version' => 'required'
        ]);
        
        $product = Product::find($product->id);
        $product->name = $request->get('name');
        $product->latest_version = $request->get('latest_version');
        $product->force_latest_version = $request->has('force_latest_version');
        $product->description = $request->get('description');
        //$product->private_key = $request->get('secret_code');
 
        $product->update();
 
        return redirect('/products')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
         
        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted successfully');
    }
}
