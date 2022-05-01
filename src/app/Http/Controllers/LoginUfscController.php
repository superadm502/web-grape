<?php

namespace App\Http\Controllers;

use App\Models\LoginUfsc;
use Illuminate\Http\Request;
use Auth;

class LoginUfscController extends Controller
{
    public function form(){
        return view('login_ufsc.form');
    }

    public function store(Request $request){
        $content = $request->except('_token');
        $content['user_id'] = Auth::user()->id;  

        $password = $content['password'];
        $key = base64_decode(env('PASSWORD_KEY'));
        $nonce = base64_decode(env('PASSWORD_NONCE'));
        $encrypted_result = sodium_crypto_secretbox($password, $nonce, $key );
        $encoded = base64_encode( $nonce . $encrypted_result );
        $content['password'] = $encoded;

        LoginUfsc::create($content);
        return redirect()->route("home");
    }
}
