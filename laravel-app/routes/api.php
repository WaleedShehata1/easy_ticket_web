<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\EmailVerificationcontroller;
use App\Http\Controllers\api\ResetPasswordcontroller;
use App\Http\Controllers\api\forgetpasswordcontroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post("login",[ApiController::class,'login']);
Route::post("register",[ApiController::class,'register']);
Route::post("emailverification",[EmailVerificationcontroller::class,'email_verification']);

Route::post("password/forget-password",[forgetpasswordcontroller::class,'forgetpassword']);
Route::post("password/rest",[ResetPasswordcontroller::class,'passwordRest']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('/updatae/{id}', [ApiController::class, 'update']);
    Route::get('/show/{id}', [ApiController::class, 'show']);
    Route::post('/logout', [ApiController::class, 'logout']);
   
});





