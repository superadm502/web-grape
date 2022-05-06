<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ApiArtisanController extends Controller
{
    public function scheduleRun()
    {
        Artisan::call('schedule:run');
        return 'Sucess';
    }
}
