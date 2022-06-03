<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class DashboardController extends Controller
{
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
