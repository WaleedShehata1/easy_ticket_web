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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\EmailverificationNotification;

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



}
