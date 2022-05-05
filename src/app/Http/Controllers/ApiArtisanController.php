<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ApiArtisanController extends Controller
{
    public function scheduleRun(Request $request)
    {
        if(env('SCHEDULE_KEY') == $request->key)
            Artisan::call('schedule:run');
    }
}
