<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function show(Request $request){
        $user = Auth::user();
      return 'ds';
    }

    public function charge(){
    	
    }
}
