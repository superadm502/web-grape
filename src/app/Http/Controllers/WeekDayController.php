<?php

namespace App\Http\Controllers;

use App\Models\LoginUfsc;
use App\Models\UserWeekDay;
use App\Models\WeekDay;
use Illuminate\Http\Request;
use Auth;

class WeekDayController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $weekDays = WeekDay::all();
        $userWeekDays = UserWeekDay::where('user_id', Auth::user()->id)->get();
        
        foreach ($userWeekDays as $key => $userWeekDay) {
            if (!in_array($userWeekDay->week_day_id, $request->week_days))
                $userWeekDay->delete();
        }

        foreach ($weekDays as $key => $weekDay) {
            if (in_array($weekDay->id, $request->week_days) && !in_array($weekDay->id, $userWeekDays->pluck('week_day_id')->toArray()))
                UserWeekDay::create(['user_id' => Auth::user()->id, 'week_day_id' => $weekDay->id]);
        }

        return redirect()->route("home");
    }
}
