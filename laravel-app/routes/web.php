<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAndSignup;
use App\Http\Controllers\LoginAndSignup\signupcontroller;
use App\Http\Controllers\LoginAndSignup\logincontroller;




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
 Route::get('/home',[logincontroller::class,'showhome'])->name('home');
 Route::get('/login',[logincontroller::class,'showlogin'])->name('login');
 Route::post('/loginuser',[logincontroller::class,'loginuser'])->name('loginuser');
 Route::get('/logoutuser',[logincontroller::class,'logoutuser'])->name('logoutuser');
 Route::get('/signup',[signupcontroller::class,'showsignup']);
 Route::post('/creatuser',[signupcontroller::class,'creatuser'])->name('creatuser');
