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
        // dd($request->all());
        $weekDays = WeekDay::all();
        $userWeekDays = UserWeekDay::where('user_id', Auth::user()->id)->get();

        foreach ($userWeekDays as $key => $userWeekDay) {
            $id = $userWeekDay->week_day_id;
            if (!in_array($id, $request->week_days))
                $userWeekDay->delete();
            else {
                $userWeekDay->update([
                    'launch' => in_array($id, $request->launch ?? []),
                    'dinner' => in_array($id, $request->dinner ?? []),
                    'launch_hour_id' => $request->launchHours[$id],
                    'dinner_hour_id' => $request->dinnerHours[$id]
                ]);
            }
        }

        foreach ($weekDays as $key => $weekDay) {
            if (in_array($weekDay->id, $request->week_days) && !in_array($weekDay->id, $userWeekDays->pluck('week_day_id')->toArray()))
                UserWeekDay::create([
                    'user_id' => Auth::user()->id,
                    'week_day_id' => $weekDay->id,
                    'launch' => in_array($weekDay->id, $request->launch ?? []),
                    'dinner' => in_array($weekDay->id, $request->dinner ?? []),
                    'launch_hour_id' => $request->launchHours[$weekDay->id],
                    'dinner_hour_id' => $request->dinnerHours[$weekDay->id]
                ]);
        }

        return redirect()->route("home");
    }
}
