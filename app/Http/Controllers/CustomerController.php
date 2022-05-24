<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Device;
use App\Models\Key;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('user_id', '=', Auth::id())
        ->paginate(10);
        return view('customer.list', compact('customers','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        return view('customer.create');
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
            'email'=>'required|email'
        ]);

        $prev_customer = Customer::where('user_id', '=', Auth::id())
        ->where('email', '=', $request->get('email'))
        ->first();

        if ($prev_customer != null) {
            return back()->withErrors('A customer with this email address already exists.')->withInput();
         }
         
        $customer = new Customer([
            'user_id' => Auth::id(),
            'first_name' => $request->get('first_name'),
            'last_name'=> $request->get('last_name'),
            'email'=> $request->get('email'),
            'company'=> $request->get('company'),
        ]);
 
        $customer->save();
        return redirect('/customers')->with('success', 'Customer has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        if ($customer->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }

        $keys = Key::where('customer_id', '=', $customer->id)->where('user_id', '=', Auth::id())->with('product')->paginate(10);
        $keys_count = Key::where('customer_id', '=', $customer->id)->where('user_id', '=', Auth::id())->count();
        //return $keys;
        return view('customer.view',compact('customer', 'keys', 'keys_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        if ($customer->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        if ($customer->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
     
        $request->validate([
            'email'=>'required|email'
        ]);
        
        $customer = Customer::find($customer->id);
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->email = $request->get('email');
        $customer->company = $request->get('company');
 
        $customer->update();
 
        return redirect('/customers')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if (!Auth::user()->subscribed()) { return back()->withErrors('You don\'t have permission.')->withInput(); }
        if ($customer->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
        $customer->delete();
        return redirect('/customers')->with('success', 'Customer deleted successfully');
    }

    public function autocomplete(Request $request)
    {
        $data = Customer::select("email")
        ->where("user_id","=", Auth::id())
        ->where('email','like','%' . $request->input('query') . '%')
        ->take(5)
                ->get();

        //return $data;
   
        return response()->json($data);
    }


    public function get_details_by_email(Request $request)
    {
        $email = $request->input('query');

        $data = Customer::select('first_name','last_name', 'company')
        ->where("user_id","=", Auth::id())
        ->where("email","=", $email)
        ->take(1)->first();

        //return $email;
   
        return response()->json($data);
    }
}
