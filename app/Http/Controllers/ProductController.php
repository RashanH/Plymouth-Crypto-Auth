<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::where('user_id', '=', Auth::id())->paginate(2);

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
            'txt_name'=>'required',
            'txt_secret_code' => 'required'
        ]);
 
        $product = new Product([
            'user_id' => Auth::id(),
            'name' => $request->get('txt_name'),
            'description'=> $request->get('txt_description'),
            'secret_code'=> $request->get('txt_secret_code')
        ]);
 
        $product->save();
        return redirect('/products')->with('success', 'Product has been added');
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
        return view('product.view',compact('product'));
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
            'txt_name'=>'required',
            'txt_secret_code' => 'required'
        ]);
 
 
        $product = Product::find($product->id);
        $product->name = $request->get('txt_name');
        $product->description = $request->get('txt_description');
        $product->secret_code = $request->get('txt_secret_code');
 
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
