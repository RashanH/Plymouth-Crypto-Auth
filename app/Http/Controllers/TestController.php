<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class TestController extends Controller
{

    public function index(Request $request)
    {

        //return $request;
       
        //create keys
        //[$privateKey, $publicKey] = (new KeyPair())->generate();
        //return response()->json([$privateKey, $publicKey]);

        //$privateKey="-----BEGIN PRIVATE KEY-----\n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\nQHd2h9mCH+ZQMWgPWwy93klXFVi3LbiynQ==\n-----END PRIVATE KEY-----\n";

        //$publicKey="-----BEGIN PUBLIC KEY-----\nMIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEApp75ceY/FNKML2G+Nc3L\n40845XthhMfxXJcEdzC3FAYhHPCd7VkP6qhN/zaC9mAQjoAj8Dw1SDv4FTHZDNku\nJ8y/vPzx0J01n6orD+JxJ5YYry5f4Y8+ZU8Ta0eLQvjEulpvEtLFG0imCqK2DR9u\nQ7NlUemSOsoOPyvemhPVbIKgoZMhn10upTK4MzDoPsf6LGaqcV2qTaCUcO0jeZT9\n4h+kA2lQ/ZlZWud/GEbYOSEweCtpkJIugWBYHN0/6EvAu5f3fI0gijNcnJKWPT3S\nYx3PX7TUHPxPYTlZ3+5bl3qvwoo6WGbGwCjTrl2ym0mQ3TzwtWk5guAnyvN+2QJy\nQdmkAYsMy4t1SOq0oRhyZk76pmxoZ+PgCz7BKRfcZKEqV8TdBvSpGrn+RjyGbyGL\nJTbTh3jQO3y08ZpmFFfk2feGz8CkndwLUTVdEEXdYq5v8j/ox4Dz2TtGhvUPDLCR\n+1AfSxbvzRLQdE85/QdL6F8cmND571QFkK/iWwQ/rHR0+0Ai+SOGtV6NMWEB9cHX\nmKUECzwxoPp0IhSXv4Ll1Lq9epiTLI3ULSfmWWrebsyPAU8NkPKCydX+JCL+ja7K\nMWxtAFhb90TiWyqGpVw71X3vQahRk9+Y3dSOVZSE18tiT26IgWj8B3TL2KL1w5/E\nWybyzw9j0p7SehmpZH3RUy8CAwEAAQ==\n-----END PUBLIC KEY-----\n";

        //$data = 'my secret data X1';

        //encrypt
        //$privateKeyX = PrivateKey::fromString($privateKey);
        
        //$encryptedData = $privateKeyX->encrypt($data); // returns something unreadable

        //$encryptedData =  Storage::get('test.txt');

        //return $encryptedData;
        
        //$publicKeyX = PublicKey::fromString($publicKey);

        //return $publicKeyX;
        //$decryptedData = $publicKeyX->decrypt($encryptedData); 

        //Storage::disk('local')->put('private.txt',$privateKey);
        //Storage::disk('local')->put('public.txt',$publicKey);
        //Storage::disk('local')->put('encrypted.txt',$encryptedData);

        //return $decryptedData;

        //return response()->json([$privateKey, $publicKey, $encryptedData, $decryptedData]);

        //echo $privateKey. '////' . $publicKey . '////' . $encryptedData;


        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
           
        // Create the private and public key
        $res = openssl_pkey_new($config);
        
        // Extract the private key from $res to $privKey
        openssl_pkey_export($res, $privKey);
        
        // Extract the public key from $res to $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];
        
        $data = 'Rashan Test';
        
        // Encrypt the data to $encrypted using the public key
        openssl_public_encrypt($data, $encrypted, $pubKey);
        
        // Decrypt the data using the private key and store the results in $decrypted
        openssl_private_decrypt($encrypted, $decrypted, $privKey);
        
        Storage::disk('local')->put('private.txt',$privKey);
        Storage::disk('local')->put('public.txt',$pubKey);
        Storage::disk('local')->put('encrypted.txt',$encrypted);
        Storage::disk('local')->put('decrypted.txt',$decrypted);

        return response()->json([$pubKey, $privKey, htmlentities($encrypted), $decrypted]);

        return 'x';

    }

    public function index2(Request $request){
        //return Crypt::encryptString("Rashan Test 123");
        $string  = 'NEXEF-KVHIY-75G0P-ONUIB-GDDEP';
        return $this->plainKeyToEncrypted($string);

        //RCOT13 > Base64
    }

    public function plainKeyToEncrypted($plain_key) {
        return base64_encode(str_rot13($plain_key));
    }

    public function encryptedToPlainKey($_encrypted_key){
        return str_rot13(base64_decode($_encrypted_key));
    }

}
