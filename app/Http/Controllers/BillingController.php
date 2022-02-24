<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $invoices = $user->invoices();
        $current_plan = $user->sparkPlan();


        return view('billing.index', compact('user', 'invoices', 'current_plan'));
        //return $current_plan;
    }
}
