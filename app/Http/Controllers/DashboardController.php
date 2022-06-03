<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Key;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class DashboardController extends Controller
{
    public function index(){

        $product_count = Product::where('user_id', '=', Auth::id())->count();
        $key_count = Key::where('user_id', '=', Auth::id())->count();
        $customer_count = Customer::where('user_id', '=', Auth::id())->count();
        $user_name = Auth::user()->name;;
        $current_plan = Auth::user()->sparkPlan();

        //return $current_plan;
        return view('dashboard', compact('product_count', 'key_count', 'customer_count', 'user_name', 'current_plan'));
    }



    public function contact(Request $request){
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        Mail::raw('Name: '. $name . '

Email: ' . $email . '.

Message:
'. $message, function ($message) {
            $message->from('support@cryptfence.com', 'CryptFence');
            $message->to('rashanhasa@gmail.com');
            $message->subject('New contact form request');
        });

        return redirect('/contact')->with('success', 'Thank you, we will follow up soon!');

    }
}
