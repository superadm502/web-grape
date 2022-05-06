<?php

use App\Http\Controllers\LoginUfscController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/login_ufsc/form', [LoginUfscController::class, 'form'])->name('login_ufsc_form');
    Route::post('/login_ufsc/form', [LoginUfscController::class, 'store'])->name('login_ufsc_store');
    Route::delete('/login_ufsc/form/{id}', [LoginUfscController::class, 'delete'])->name('login_ufsc_delete');
});

