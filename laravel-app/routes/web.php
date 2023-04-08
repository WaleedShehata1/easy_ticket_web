<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Passengercontroller;
use App\Http\Controllers\Bus_route_andstationcontroller;

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

Route::get('/bus',[Bus_route_andstationcontroller::class,'getbus']);

