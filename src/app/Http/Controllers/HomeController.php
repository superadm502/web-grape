<?php

namespace App\Http\Controllers;

use App\Models\LoginUfsc;
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
        $loginUfsc = LoginUfsc::where('user_id', Auth::user()->id)->first();
        return view('home', compact('loginUfsc'));
    }

    public function faq()
    {
        return view('faq');
    }
}
