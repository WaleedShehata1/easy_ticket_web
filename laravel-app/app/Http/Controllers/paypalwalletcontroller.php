<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Notifications\ChargWallet;
use Illuminate\Support\Facades\Notification;

class paypalwalletcontroller extends Controller
{
    public $AmountWallet;

    // public function goPayment(){

    //     return view('products.welcome');

    // }
    public function payment(Request $request)
    {
        $id=$request->id;
        $this->AmountWallet=$request->AmountWallet;
        $data = [];
        $data['items'] = [
            [
                'id'=>$id,
                'name' => 'wallet',
                'price' => $this->AmountWallet,
                'desc'  => 'procces charge wallet',
                'qty' => 1
            ]
        ];
        // return $this->AmountWallet;
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('paymentWallet.success');
        $data['cancel_url'] = route('paymentWallet.cancel');
        $data['total'] = $request->AmountWallet;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function cancel()
    {
        dd('Your payment is canceled.');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // dd('Your payment was successfully.');
            // return  response($response);

            $user=User::where('id', auth()->user()->id)->first();
            $user->update(['wallet' => $user->wallet + $response['AMT']]);
            $notification="hellow: {$user->first_Name}
            you have charged the wallet {$response['AMT']}";
            Notification::send($user, new ChargWallet($notification));
            return redirect(url('/profile'));
        }

        dd('Please try again later.');
    }
}
