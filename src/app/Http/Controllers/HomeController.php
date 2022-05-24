<?php

namespace App\Http\Controllers;

use App\Models\DayHour;
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
        $launchHours = DayHour::where('id', '<', 7)->where('id', '>', 1)->get();
        $dinnerHours = DayHour::where('id', '>=', 8)->get();
        $userWeekDays = UserWeekDay::where('user_id', Auth::user()->id)->get();
        $userWeekDays = $userWeekDays->keyBy('week_day_id')->toArray();
        // dd($userWeekDays);
        return view('home', compact('loginsUfsc', 'loginUfsc', 'weekDays', 'userWeekDays', 'launchHours', 'dinnerHours'));
    }

    public function faq()
    {
        return view('faq');
    }
}
