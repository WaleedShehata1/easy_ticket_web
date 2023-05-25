<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Otp;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Validator;
class ResetPasswordcontroller extends Controller
{
    private $otp;
    public function __construct(){
    $this->otp = new Otp; 
    }
    public function passwordRest(Request $request){


        $otp22 = $this->otp->validate($request->email,$request->otp,[
            'email' => ['required','email','exists:,users'],
            'otp' => ['required','max:6'],
        ]);

        if(!$otp22->status){
            return response()->json(['message' => 'the email or otp is invalid','status'=>false],201);
        }
        
        $Done['Done'] = true;
        return response()->json($Done,201);
    }





    public function passwordRest2 (Request $request){

        $input = Validator::make($request->all(), [
            'national_ID' => ['required','integer','exists:passengers,national_ID'],
            'password' => ['required','string','min:6'],
        ]);

        if ( $input->fails()){
            return response(['message' => 'the national_ID is invalid','status'=>false],201);
        }

        
        $user = User::where('national_ID',$request->national_ID)->first();
        $user->update(['password' => Hash::make( $request->password)]);
        $Done['status'] = true;
        $Done['message'] = "succeeded";
        return response()->json($Done,201);
    }


    public function passwordupdata (Request $request){

        $user= User::where('national_ID', $request->national_ID)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => 'the password is invalid',
                    'status'=> false
                ], 201);
            }

        $user->update(['password' => Hash::make( $request->newpassword)]);
        $Done['status'] = true;
        $Done['message'] = "succeeded";
        return response()->json($Done,201);
    }
}
