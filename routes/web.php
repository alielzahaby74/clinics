<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware'=>"auth"],function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    require_once __DIR__.'/dash/specialities.php';
    require_once __DIR__.'/dash/branches.php';
    require_once __DIR__.'/dash/doctors.php';
    require_once __DIR__.'/dash/shifts.php';
    require_once __DIR__.'/dash/appointments.php';
    require_once __DIR__.'/dash/patients.php';
    require_once __DIR__.'/dash/medicalHistories.php';
});


Route::group(['as'=>"doctor.",'prefix'=>"doctor"],function () {
    Route::get('/login',[\App\Http\Controllers\Dash\Doctor\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[\App\Http\Controllers\Dash\Doctor\Auth\LoginController::class,'login'])->name('login');

    Route::post('/logout',[\App\Http\Controllers\Dash\Doctor\Auth\LoginController::class,'logout'])->name('logout');

    Route::get('/password/reset',[\App\Http\Controllers\Dash\Doctor\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
});

Route::get('/doc',function () {
    return "Hi ".\auth()->user()->name;
})->middleware('auth:doctor');


Auth::routes(['register' => false]);
