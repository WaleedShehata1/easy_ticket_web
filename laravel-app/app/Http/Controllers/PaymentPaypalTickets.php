<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Validator;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Bus;
use App\Models\Transaction;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Notifications\ChargWallet;
use Illuminate\Support\Facades\Notification;

class PaymentPaypalTickets extends Controller
{
    // public function goPaymentTickets(Request $request)
    // {
    //     return view('auth.payment');
    // }


    public function cheakTicketsBus(Request $request)
    {
        
        $validated=validator::make($request->all(),
        [
            'PriceBus' => ['required','integer'],
            'ManyBus' => ['required','integer'],
        ],[

        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all);
        }
        // $bus=rand(1,6);
        $ticketId=$request->PriceBus;
        $TicketsBus= Bus::find($ticketId);

        $totalPrice= $TicketsBus->Ticket_price * $request->ManyBus;

        return view('auth.payment',
        ['TicketsBus'=>$TicketsBus,'totalPrice'=>$totalPrice]);

    }




    public function cheakTicketsMetro(Request $request)
    {
        $validated=validator::make($request->all(),
        [
            'TicketsMetro' => ['required','integer'],
            'ManyMetro' => ['required','integer'],
        ],[

        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all);
        }

        $ticketId=$request->TicketsMetro;
        $TicketsMetro= Ticket::find($ticketId);


        $totalPrice= $TicketsMetro->ticket_price * $request->ManyMetro;

        return view('auth.payment',
        ['TicketsMetro'=>$TicketsMetro,'totalPrice'=>$totalPrice]);

    }



    public function paymentTicketsBus(Request $request)
    {
        $user_id=$request->user_id;
        // $user= User::find($user_id);
        if($request->chosse_way=="wallet"){
            
            $user= User::find($user_id);
            if($user->wallet > $request->totalPrice){
                $UserWallet=$user->wallet - $request->totalPrice;
                $user=User::where('id', $user_id )->first();
                $user->update(['wallet' => $UserWallet]);
                
                $Transaction=Transaction::create([
                    'tickets_status'=>'not used',
                    'value_price'=>$request ->totalPrice,
                    'user_id'=>$request ->user_id,
                    'bus_id'=>$request ->ticket_id,
                ]);

                $notification="hellow: {$user->first_Name}
                you have pay the ticket Bus {$request ->totalPrice} EL";
                Notification::send($user, new ChargWallet($notification));

                return redirect()->route('dashboard')->with([ 'succsse' => 'Reservation completed' ]);
            }else{
                return redirect()->route('dashboard')->with([ 'erorr' => 'There is not enough balance' ]);
            }

        }else{
        
        $data = [];
        $data['items'] = [
            [
                'name' => 'Apple',
                'price' => $request->totalPrice,
                'desc'  => 'Macbook pro 14 inch',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('successpaymentTicketsBus');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $request->totalPrice;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        $Transaction=Transaction::create([
            'tickets_status'=>'not used',
            'value_price'=>$request ->totalPrice,
            'user_id'=>$request ->user_id,
            'bus_id'=>$request ->ticket_id,
        ]);

        return redirect($response['paypal_link']);

        }

    }

    public function cancel()
    {
        dd('Your payment is canceled.');
    }

    public function successpaymentTicketsBus(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            $user=User::where('id', auth()->user()->id)->first();
            $user->update(['wallet' => $user->wallet - $response['AMT']]);
            $notification="hellow: {$user->first_Name}
            you have pay the ticket Bus {$response['AMT']} EL";
            Notification::send($user, new ChargWallet($notification));
            // return $response['AMT'];

        return redirect()->route('dashboard')->with([ 'succsse' => 'Reservation completed' ]);
        }

    }




    public function paymentTicketsMetro(Request $request)
    {
        $user_id=$request->user_id;
        // $user= User::find($user_id);
        if($request->chosse_way=="wallet"){
            
            $user= User::find($user_id);
            if($user->wallet > $request->totalPrice){
                $UserWallet=$user->wallet - $request->totalPrice;
                $user=User::where('id', $user_id )->first();
                $user->update(['wallet' => $UserWallet]);
                
                $Transaction=Transaction::create([
                    'tickets_status'=>'not used',
                    'value_price'=>$request ->totalPrice,
                    'user_id'=>$request ->user_id,
                    'ticket_id'=>$request ->ticket_id,
                ]);
                $notification="hellow: {$user->first_Name}
            you have pay the ticket Metro {$request ->totalPrice} EL";
            Notification::send($user, new ChargWallet($notification));

                return redirect()->route('dashboard')->with([ 'succsse' => 'Reservation completed' ]);
            }else{
                return redirect()->route('dashboard')->with([ 'erorr' => 'There is not enough balance' ]);
            }

        }else{
        
        $data = [];
        $data['items'] = [
            [
                'name' => 'Apple',
                'price' => $request->totalPrice,
                'desc'  => 'Macbook pro 14 inch',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('successpaymentTicketsBus');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $request->totalPrice;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        $Transaction=Transaction::create([
            'tickets_status'=>'not used',
            'value_price'=>$request ->totalPrice,
            'user_id'=>$request ->user_id,
            'ticket_id'=>$request ->ticket_id,
        ]);

        return redirect($response['paypal_link']);

        }

    }

    public function cance()
    {
        dd('Your payment is canceled.');
    }

    public function successpaymentTicketsMetro(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            $user=User::where('id', auth()->user()->id)->first();
            $user->update(['wallet' => $user->wallet - $response['AMT']]);
            $notification="hellow: {$user->first_Name}
            you have pay the ticke Metro {$response['AMT']} EL";
            Notification::send($user, new ChargWallet($notification));
            // return $response['AMT'];

        return redirect()->route('dashboard')->with([ 'succsse' => 'Reservation completed' ]);
        }

    }
}
