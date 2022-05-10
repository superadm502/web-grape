<?php

namespace App\Http\Controllers;

use App\Models\LoginUfsc;
use App\Models\UserWeekDay;
use App\Models\WeekDay;
use Illuminate\Http\Request;
use Auth;

class LoginUfscController extends Controller
{
    public function form(){
        $loginUfsc = LoginUfsc::where('user_id', Auth::user()->id)->first();
        return view('login_ufsc.form', compact('loginUfsc'));
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

        $weekDays = WeekDay::all();
        foreach ($weekDays as $key => $day) {
            UserWeekDay::create([
                'user_id' => $content['user_id'],
                'week_day_id' => $day->id
            ]);
        }
        
        return redirect()->route("home");
    }

    public function delete(int $id){
        $userWeekDays = UserWeekDay::where('user_id', Auth::user()->id)->get();
        foreach ($userWeekDays as $key => $userWeekDay) {
            $userWeekDay->delete();
        }

        $loginUfsc = LoginUfsc::find($id);
        $loginUfsc->delete();
        return redirect()->route("home");
    }
}
