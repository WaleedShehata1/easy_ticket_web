<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\postcontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

                          ############ buss###################
Route::get('/bus',[postcontroller::class,'index']);      //هنا عشان برجع البيانات
Route::get('/bus/{id}',[postcontroller::class,'show']); //عشان يعرض بيانات معينة و يرجع ليا برسالة لما اختار الاي دي
Route::post('/bus',[postcontroller::class,'store']);    // هنا عشان ادخل بيانات


