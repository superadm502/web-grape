<?php

namespace App\Http\Controllers;

use App\Models\LoginUfsc;
use App\Models\UserWeekDay;
use App\Models\WeekDay;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loginsUfsc =  LoginUfsc::all();
        $loginUfsc = LoginUfsc::where('user_id', Auth::user()->id)->first();
        $weekDays = WeekDay::all();
        $userWeekDays = UserWeekDay::where('user_id', Auth::user()->id)->get()->pluck('week_day_id')->toArray();
        return view('home', compact('loginsUfsc', 'loginUfsc', 'weekDays', 'userWeekDays'));
    }

    public function faq()
    {
        return view('faq');
    }
}
