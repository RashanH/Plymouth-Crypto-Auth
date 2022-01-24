<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class TestController extends Controller
{
    public function enc(Request $request){
        return Crypt::encryptString('Rashan-Test');
    }

     public function dec(Request $request){
         try {
             $decrypted = Crypt::decryptString('eyJpdiI6InhseGFPMGxBbzlaMk84TEhUZDlkUGc9PSIsInZhbHVlIjoiK2Q5QmdWaWpr');
             return $decrypted;
        } catch (DecryptException $e) {
            //
        }
     }
}



