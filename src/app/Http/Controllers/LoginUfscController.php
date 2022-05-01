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
        
        LoginUfsc::create($content);
        return redirect()->route("home");
    }
}
