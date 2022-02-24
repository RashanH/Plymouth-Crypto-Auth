<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
        $customers = Customer::paginate(10);
        return view('customer.list', compact('customers','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([
            'email'=>'required|email'
        ]);
 
        $student = new Customer([
            'user_id' => Auth::id(),
            'first_name' => $request->get('first_name'),
            'last_name'=> $request->get('last_name'),
            'email'=> $request->get('email'),
            'company'=> $request->get('company'),
        ]);
 
        $student->save();
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
        return view('customer.view',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
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
        if ($customer->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
     
        $request->validate([
            'email'=>'required|email'
        ]);
        
        $student = Customer::find($customer->id);
        $student->first_name = $request->get('first_name');
        $student->last_name = $request->get('last_name');
        $student->email = $request->get('email');
        $student->company = $request->get('company');
 
        $student->update();
 
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
        if ($customer->user_id != Auth::id()){ return back()->withErrors('You don\'t have permission.')->withInput(); }
        $customer->delete();
        return redirect('/customers')->with('success', 'Customer deleted successfully');
    }
}
