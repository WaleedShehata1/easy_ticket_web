<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAndSignup\logandsigncontroller;
use App\Http\Controllers\LoginAndSignup;


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

// Route::get('/bus',[Bus_route_andstationcontroller::class,'getbus']);

// Route::get('/passenger',[Passengercontroller::class,'getpassender'])->name('ahmed');
// Route::get('/home',[Buscontroller::class,'showHome']);
Route::get('/login',[logandsigncontroller::class,'showlogin']);
Route::get('/signup',[logandsigncontroller::class,'showsignup']);

