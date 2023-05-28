<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\PapPalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| payment paypal
|--------------------------------------------------------------------------
*/

Route::get('go-payment', [PapPalController::class, 'goPayment'])->name('payment.go');
Route::get('payment',[PapPalController::class, 'payment'])->name('payment');
Route::get('cancel',[PapPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PapPalController::class, 'success'])->name('payment.success');

// Route::get('/home',[Homecontroller::class, 'showhome'])->name('home')->middleware(['auth', 'verified']);

/*
|--------------------------------------------------------------------------
| edit profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





