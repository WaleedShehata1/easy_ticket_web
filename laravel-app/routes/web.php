<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\PapPalController;
use App\Http\Controllers\paypalwalletcontroller;
use App\Http\Controllers\PaymentPaypalTickets;
use App\Models\Ticket;
use App\Models\Bus;

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
    $TicketsMetro= Ticket::where('type','=','LRT')->orwhere('type','=','Metro')->get();
    $TicketsBus= Bus::all();
    return view('home',['TicketsMetro'=>$TicketsMetro,'TicketsBus'=>$TicketsBus]);
});

Route::get('/home', function () {
    $TicketsMetro= Ticket::where('type','=','LRT')->orwhere('type','=','Metro')->get();
    $TicketsBus= Bus::all();
    return view('home',['TicketsMetro'=>$TicketsMetro,'TicketsBus'=>$TicketsBus]);
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

/*
|--------------------------------------------------------------------------
| payment paypal tickets
|--------------------------------------------------------------------------
*/

Route::get('test', [Homecontroller::class, 'test'])->name('');


Route::post('/cheakTicketsBus', [PaymentPaypalTickets::class, 'cheakTicketsBus'])->name('cheakTicketsBus');
Route::post('/cheakTicketsMetro', [PaymentPaypalTickets::class, 'cheakTicketsMetro'])->name('cheakTicketsMetro');
Route::post('/paymentTicketsBus',[PaymentPaypalTickets::class, 'paymentTicketsBus'])->name('paymentTicketsBus');
Route::post('/paymentTicketsMetro',[PaymentPaypalTickets::class, 'paymentTicketsMetro'])->name('paymentTicketsMetro');
Route::get('/paymentpaymentTicketsBus',[PaymentPaypalTickets::class, 'paymentpaymentTicketsBus'])->name('paymentpaymentTicketsBus');
Route::get('/successpaymentTicketsBus', [PaymentPaypalTickets::class, 'successpaymentTicketsBus'])->name('successpaymentTicketsBus');
Route::get('/DeletTransactionTicket/{Transaction_id}', [PaymentPaypalTickets::class, 'DeletTransactionTicket'])->name('DeletTransactionTicket');

// Route::get('/home',[Homecontroller::class, 'showhome'])->name('home')->middleware(['auth', 'verified']);


/*
|--------------------------------------------------------------------------
| payment paypal wallet
|--------------------------------------------------------------------------
*/
// Route::get('go-payment', [paypalwalletcontroller::class, 'goPayment'])->name('payment.go');
Route::get('paymentWallet',[paypalwalletcontroller::class, 'payment'])->name('paymentWallet');
Route::get('cancelWallet',[paypalwalletcontroller::class, 'cancel'])->name('paymentWallet.cancel');
Route::get('payment/successWallet', [paypalwalletcontroller::class, 'success'])->name('paymentWallet.success');


/*
|--------------------------------------------------------------------------
| edit profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profileUpdate', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





