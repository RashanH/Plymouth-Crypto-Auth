<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;

class TestController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $stripeCustomer = $user->createAsStripeCustomer();
        return  $stripeCustomer;
    }
}
