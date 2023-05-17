<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\postcontroller;

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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
<<<<<<< HEAD
   // Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
=======
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [postcontroller::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
>>>>>>> 95fa834e1d3a9535b8993febfaaae998a99f0fbb
    });



Route::get('/passengers',[postcontroller::class,'index']);      //هنا عشان برجع البيانات
Route::get('/passengers/{id}',[postcontroller::class,'show']); //عشان يعرض بيانات معينة و يرجع ليا برسالة لما اختار الاي دي
Route::post('/passengers',[postcontroller::class,'store']);    // هنا عشان ادخل بيانات
Route::post('/passengers/{id}',[postcontroller::class,'update']);
Route::post('/passenger/{id}',[postcontroller::class,'destroy']);


