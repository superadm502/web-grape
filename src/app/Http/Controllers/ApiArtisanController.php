<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ApiArtisanController extends Controller
{
    public function scheduleRun()
    {
        Artisan::call('schedule:run');
    }
}