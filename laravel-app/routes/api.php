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

/*
|--------------------------------------------------------------------------
| login and register for user
|--------------------------------------------------------------------------
*/
Route::post("login",[ApiController::class,'login']);
Route::post("driver",[ApiController::class,'login_driver']);
Route::post("register",[ApiController::class,'register']);

/*
|--------------------------------------------------------------------------
| emailverification for user
|--------------------------------------------------------------------------
*/
Route::post("emailverification",[EmailVerificationcontroller::class,'email_verification']);

/*
|--------------------------------------------------------------------------
| password for user
|--------------------------------------------------------------------------
*/
Route::post("password/forget-password",[forgetpasswordcontroller::class,'forgetpassword']);
Route::post("password/reset",[ResetPasswordcontroller::class,'passwordRest']);
Route::post("password/resetpassword",[ResetPasswordcontroller::class,'passwordRest2']);
Route::post("password/updata",[ResetPasswordcontroller::class,'passwordupdata']);

/*
|--------------------------------------------------------------------------
| ????????????? 
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('/updatae/{id}', [ApiController::class, 'update']);
    Route::get('/show/{id}', [ApiController::class, 'show']);
    Route::post('/logout', [ApiController::class, 'logout']);
    Route::post('/logoutdriver', [ApiController::class, 'logout_driver']);

});

Route::post('/charge-wallet', [ApiController::class, 'charge']);


/*
|--------------------------------------------------------------------------
| Metro
|--------------------------------------------------------------------------
*/

Route::get('Metro_lineAndStatione', [ApiController::class, 'Metro_lineAndStatione']);
Route::get('metroAndTiming', [ApiController::class, 'metroAndTiming']);




