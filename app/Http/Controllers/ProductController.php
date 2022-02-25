<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', '=', Auth::id())->paginate(10);

        return view('product.list', compact('products','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'name'=>'required',
            'secret_code' => 'required',
            'latest_version' => 'required'
        ]);
 
        $product = new Product([
            'user_id' => Auth::id(),
            'name' => $request->get('name'),
            'latest_version' => $request->get('latest_version'),
            'force_latest_version' => $request->has('force_latest_version'),
            'description'=> $request->get('description'),
            'secret_code'=> $request->get('secret_code')
        ]);

        $product->save();
        return redirect('/products')->with('success', 'Product has been added.');
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


        $keys = Key::where('product_id', '=', $product->id)->paginate(10);

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
        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
     
        $request->validate([
            'name'=>'required',
            'secret_code' => 'required',
            'latest_version' => 'required'
        ]);
        
        $product = Product::find($product->id);
        $product->name = $request->get('name');
        $product->latest_version = $request->get('latest_version');
        $product->force_latest_version = $request->has('force_latest_version');
        $product->description = $request->get('description');
        $product->secret_code = $request->get('secret_code');
 
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
        if ($product->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted successfully');
    }
}
