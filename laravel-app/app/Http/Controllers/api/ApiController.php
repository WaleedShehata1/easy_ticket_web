<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Models\Ticket;
use App\Models\Metro_line;
use App\Models\Metro;
use App\Models\Metro_timing;
use App\Models\Visa;
use App\Models\Bus;
use App\Models\notifications;
use App\Models\Transaction;
use App\Models\Drivers_and_bus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\EmailverificationNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ChargWallet;

class ApiController extends Controller
{
    function login(Request $request)
    {
        $user= User::where('national_ID', $request->national_ID)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'data' => null,
                    'message' => 'the national_ID or password is invalid',
                    'status'=> false
                ], 201);
            }
        
            $token = $user->createToken($user->first_Name, ['post:login'])->plainTextToken;
        
            $response = [
                'data' => $user,
                'token' => $token,
                'message' => 'succeeded',
                'status'=> true
            ];
        
            return response($response, 201);
    }





    public function register(Request $request){
        $validator = Validator::make($request->all(), [

            'national_ID' => 'unique:passengers,national_ID',
            'email' => 'unique:passengers,email',

        ]);

        if ($validator->fails()){
            return response([
                'message'=> 'the national_ID or email has already been taken',
                'status'=> false,
                'data' => null,
            ],201);
        }
        $user=User::create([
            'national_ID'=>$request ->national_ID,
            'first_Name'=>$request ->first_Name,
            'last_Name'=>$request ->last_Name,
            'gender'=>$request ->gender,
            'password'=>Hash::make($request ->password),
            'email'=>$request ->email,
            'health_status'=>$request ->health_status,
            'date_of_birth'=>$request ->date_of_birth,
            'phone'=> $request ->phone,
            'profession'=> $request ->profession
        ]);
        
        if($user){
            $user ->notify(new EmailVerificationNotification());
            $response = [
                'data' => $user,
                'message' => 'succeeded',
                'status'=> true
            ];

            return response($response, 200);
        }
        return response([
        'message' => 'The Post Not Save',
        'status'=> false,
        'data' => null
        ],201);
                                
    }


    public function update(Request $request,$id){
        $user = User::find($id);
        if(!$user){
            $response = [
                'data'=> null ,
                'message' => 'The updata invalid',
                'status'=> false,
            ];
            return response($response,201);
        }

        $user->update([
            'email'=>$request ->email,
            'health_status'=>$request ->health_status,
            'profession'=> $request ->profession,
            'phone'=> $request ->phone,
        ]);
        if($user){

            $response = [
                'data'=>$user ,
                'message' => 'The updata succeeded',
                'status'=> true,
            ];

            return response($response,201);
                                    
            }
        }



        public function logout(Request $request) {
            auth()->user()->tokens()->delete();
    
            return response( [
                'message' => 'succeeded',
                'status'=> true
            ],201);
        }



    public function show( $request,$id){
        $user = User::find($id);
        if(!$user){
            $response = [
                'data'=> null ,
                'message' => 'The user is invalid',
                'status'=> false,
            ];
            return response($response,201);
        }

        if($user){
            if (auth()->user()->tokenCan('post:login')) {
                $response = [
                    'data'=>$user ,
                    'message' => 'The user is succeeded',
                    'status'=> true,
                ];
    
                return response($response,201);
            }
                                    
            }
    }
    ///////////////////////////////// DRIVER //////////////////////////////
    function login_driver(Request $request)
    {
        $driver= Driver::where('id_driver', $request->id_driver)->first();
        //return $driver->password;
        if (! $driver || !Hash::check($request->password,  $driver->password)) {
                return response([
                    'data' => null,
                    'message' => 'the id or password is invalid',
                    'status'=> false
                ], 201);
            }
        
            $token = $driver->createToken('post:driver')->plainTextToken;
        
            $response = [
                'data' => $driver,
                'token' => $token,
                'message' => 'succeeded',
                'status'=> true
            ];
        
            return response($response, 201);
   }
   public function logout_driver(Request $request) {
    auth()->user()->tokens()->delete();


    return response( [
        'message' => 'succeeded',
        'status'=> true
    ],201);
}


    ///////////////////////////////// tickets //////////////////////////////
    public function tickets(){

        $ticket=Ticket::all();

        $metro=Metro_line::find(2);
        // return response($lineandstatione -> stations,200);
        // return $lineandstatione;
        $data['ticket']=$ticket;
        return response($data,201);
    }

    ///////////////////////////////// charge wallet //////////////////////////////

    public function charge(Request $request)
    {

        $wallet = Validator::make($request->all(), [
            'visa_number' => ['required','integer','exists:visas,visa_number'],
        ]);

        if ( $wallet->fails()){
            return response(['message'=> 'the visa is invalid','status'=> false,'wallet' => null,],201);
        }

        $visa = visa::where('visa_number', $request->visa_number)->first();
        if($visa->expire !== $request->expire){
            return response(['message'=> 'the visa is invalid','status'=> false,'wallet' => null,],201);
        }

        if($visa->The_owner_of_the_visa !== $request->The_owner_of_the_visa){
            return response(['message'=> 'the visa is invalid','status'=> false,'wallet' => null,],201);
        }

        if($visa->cvv != $request->cvv){
            return response(['message'=> 'the visa is invalid','status'=> false,'wallet' => null,],201);
        }

        if ($request->cost > $visa->Visa_balance){
            return response(['message'=> 'Your balance is not enough','status'=> false,'wallet' => null,],201);
        }

        $Visa_balance=$visa->Visa_balance - $request->cost;
        $visa->update(['Visa_balance' =>$Visa_balance]);

        $national_ID = Validator::make($request->all(), [
            'national_ID' => ['required','integer','exists:passengers,national_ID'],
        ]);
        if ($national_ID->fails()){
            return response(['message'=> 'the national_ID not found','status'=> false,'wallet' => null,],201);
        }
        $user= User::where('national_ID', $request->national_ID)->first();
        $user->update(['wallet' => $user->wallet + $request->cost ]);
        return response(['message'=> 'succeeded','status'=> true,'wallet' => $user->wallet,],201);

    }
    ///////////////////////////////// Metro //////////////////////////////

    public function Metro_lineAndStatione(){

        $first_line=Metro_line::with('stations')->find(1);
        $second_line=Metro_line::with('stations')->find(2);

        $data['first_line']=$first_line;
        $data['second_line']=$second_line;
        
        return response($data,201);
    }


    public function metroAndTiming(){
        
        $metros_count=metro::count('id');

        for($i=1;$i<=$metros_count;$i++){

            $metros["metro{$i}"]=metro::with('metro_timing')->find($i);

        }
        
        return response($metros,201);
    }

    public function BusAndStations(){
        
        $bus_count=Bus::count('id');

        for($i=1;$i<=$bus_count;$i++){

            $bus[]=Bus::with('Bus_timings')->find($i);

        }

        return response($bus,201);

    }
/////////////////////////////////////////////////////////////////////


    public function PaymentWallet(Request $request){
        
        // $user_id;
        // $ticket_id;
        // $totalPrice;
        // $count;
        // $password;
        // $ticket_type;
        // $bus_id;

        $user= User::where('id', $request->user_id)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => 'the password  is invalid',
                    'status'=> false
                ], 201);
            }elseif($user->wallet >= $request->totalPrice){

                $userwallet=$user->wallet - $request->totalPrice;
                $user->update(['wallet'=>$userwallet]);

                for($i=1 ; $i <= $request->count ; $i++ ){
                $Transaction=Transaction::create([
                    'tickets_status'=>'not used',
                    'value_price'=>($request ->totalPrice/$request->count),
                    'user_id'=>$request ->user_id,
                    'ticket_id'=>$request ->ticket_id,
                    'bus_id'=>$request ->bus_id

                ]);
                
            }
            $notification="hellow: {$user->first_Name} you have pay {$request->count} the ticket {$request->ticket_type} {$request ->totalPrice} EL";
            Notification::send($user, new ChargWallet($notification));

                return response([
                    'message' => 'succeeded',
                    'status'=> true
                ], 201);
                
            }else{

                return response([
                    'message' => 'There is not enough balance',
                    'status'=> false
                ], 201);

            }

    }



    public function notifications(Request $request){

        $user_id;

        $notification=notifications::where('notifiable_id','=',$request->user_id)->get();
        return response([
            'data'=>$notification,
            'message' => 'succeeded',
            'status'=> true
        ], 201);

    }

    public function BusDriver(){

        $buss=Bus::all('id','bus_number');
        return response([
            'data'=>$buss,
            'message' => 'succeeded',
            'status'=> true
        ], 201);
    }




    public function Drivers_and_bus(Request $request){

        $bus_id;
        $driver_id;

        $Drivers_and_bus=Drivers_and_bus::create([
            'bus_id'=>$request ->bus_id,
            'driver_id'=>$request ->driver_id,
        ]);

        return response([
            'message' => 'succeeded',
            'status'=> true
        ], 201);


    }

    public function scan(Request $request){

        $transaction_id;
        $tickets_status;

        $transaction=Transaction::find($request->transaction_id);
        $transaction->update([
            'tickets_status'=>$request->tickets_status
        ]);
        return response([
            'message' => 'succeeded',
            'status'=> true
        ], 201);

    }




    public function deletTransaction(Request $request){

        $transaction_id;

        $transaction=Transaction::find($request->transaction_id);

        if(!$transaction){

        return response([
            'message' => 'faild',
            'status'=> false
        ], 201);

        }
        $user=User::find($transaction->user_id);

        $user->update([
            'wallet'=>$user->wallet + $transaction->value_price
        ]);
        $transaction->delete();

        return response([
            'message' => 'succeeded',
            'status'=> true
        ], 201);

    }

    public function ShowTicketUser(Request $request){

        $user_id;

        $user=User::find($request->user_id);
        return response([
            'data'=>$user->Transaction,
            'message' => 'succeeded',
            'status'=> true
        ], 201);

    }


    public function PaymentVisa(Request $request){

        $visa_number;
        $expire;
        $The_owner_of_the_visa;
        $cvv;
        $totalprice;

        $count;
        $user_id;
        $bus_id;
        $ticket_id;
        $ticket_type;

        $wallet = Validator::make($request->all(), [
            'visa_number' => ['required','integer','exists:visas,visa_number'],
        ]);

        if ( $wallet->fails()){
            return response(['message'=> 'the visa is invalid','status'=> false,'data' => null,],201);
        }

        $visa = visa::where('visa_number', $request->visa_number)->first();

        if($visa->expire !== $request->expire){
            return response(['message'=> 'the visa is invalid','status'=> false,'data' => null,],201);
        }

        if($visa->The_owner_of_the_visa !== $request->The_owner_of_the_visa){
            return response(['message'=> 'the visa is invalid','status'=> false,'data' => null,],201);
        }

        if($visa->cvv != $request->cvv){
            return response(['message'=> 'the visa is invalid','status'=> false,'data' => null,],201);
        }

        if ($request->totalprice > $visa->Visa_balance){
            return response(['message'=> 'Your balance is not enough','status'=> false,'data' => null,],201);
        }

        $visa->update([
            'Visa_balance'=>$visa->Visa_balance - $request->totalprice
        ]);

        $user= User::where('id', $request->user_id)->first();


        for($i=1 ; $i <= $request->count ; $i++ ){
            $Transaction=Transaction::create([
                'tickets_status'=>'not used',
                'value_price'=>($request->totalprice/$request->count),
                'user_id'=>$request ->user_id,
                'ticket_id'=>$request ->ticket_id,
                'bus_id'=>$request ->bus_id

            ]);}

            

            $notification="hellow: {$user->first_Name} you have pay {$request->count} the ticket {$request->ticket_type} {$request ->totalprice} EL";
            Notification::send($user, new ChargWallet($notification));

                return response([
                    'message' => 'succeeded',
                    'status'=> true
                ], 201);

    }

}