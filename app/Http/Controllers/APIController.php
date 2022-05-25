<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Device;
use App\Models\Key;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Validator;

class APIController extends Controller
{
    public function hello(Request $request){

        $validator = Validator::make($request->all(), [
            'product_id'=>'required',
            'payload'=>'required',
            //'version'=>'required',
            //'hwid'=>'required'
        ]);

        if ($validator->fails()) {    
            return response()->json([ 'status' => 'error', 'message' => 'missing_info' ]);
        }

        $product = Product::where('id', '=', $request->product_id)->first();
        if ($product === null) { return response()->json(['status' => 'error', 'message' => 'associated_product_is_not_available']); }
        
        $pvt_key_text = Crypt::decryptString($product->private_key);
        
        //decrypt
        $private_key = openssl_pkey_get_private($pvt_key_text);
        openssl_private_decrypt(base64_decode($request->payload), $decrypted_payload, $private_key);

        //return $decrypted_payload;
        
        $decoded_json = json_decode($decrypted_payload, true);
        $version = $decoded_json['version'];
        $hwid = $decoded_json['hwid'];
        
        $device = Device::where('hardware_unique', '=', $hwid)->where('product_id', '=', $request->product_id)->first();  //TODO: Delete/update when re-register
        if ($device === null) { return response()->json(['status' => 'error', 'message' => 'hwid_not_registered_on_the_system']); }

        $key = Key::where('id', '=', $device->key_id)->first();
        if ($key === null) { return response()->json(['status' => 'error', 'message' => 'associated_key_is_not_available']); }

        $customer = Customer::where('id', '=', $key->customer_id)->first();
        if ($customer === null) { return response()->json(['status' => 'error', 'message' => 'associated_customer_is_not_available']); }

        //version check
        if ($product->force_latest_version == true){
            if ($product->latest_version != $version){ return response()->json(['status' => 'error', 'message' => 'latest_version_is_required', 'latest_version' => $product->latest_version]); }
        }

        //is blocked
        if ($key->is_blocked == true) { return response()->json(['status' => 'error', 'message' => 'key_is_blocked']); }

        //expired
        if (Carbon::parse($key->expires_at) < Carbon::now()) { return response()->json(['status' => 'error', 'message' => 'key_expired']); }

        //return product_id, hwid, expire, customer info => enmcrpyed
        $results = array(
            "product_id"=>$request->product_id, 
            "latest_version"=>$product->latest_version, 
            "force_latest"=>$product->force_latest_version,
            "hwid"=>$hwid, 
            "expire"=>$key->expires_at,
            "customer_id"=>$customer->id,
            "customer_email"=>$customer->email
        );

        $results_json = json_encode($results);
        openssl_private_encrypt(base64_encode($results_json), $encrypted_result, $private_key);

        return response()->json(['status' => 'success', 'message' => base64_encode($encrypted_result)]);
    }
    
}
