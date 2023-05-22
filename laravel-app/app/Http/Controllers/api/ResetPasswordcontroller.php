<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Otp;
use App\Models\User;
use Hash;
class ResetPasswordcontroller extends Controller
{
    private $otp;
    public function __construct(){
    $this->otp = new Otp; 
    }
    public function passwordRest(Request $request){
        // $otp22 = $this->otp->validate($request->email,$request->otp);

        $otp22 = $this->otp->validate($request->email,$request->otp,[
            'email' => ['required','email','exists:users'],
            'otp' => ['required','max:6'],
            'password' => ['required','string','min:6'],
        ]);



        if(! $otp22->status){
            return response()->json(['error' => $otp22],201);
        }
        $user = User::where('email',$request->email)->first();
        $user->update(['password' => Hash::make( $request->password)]);
        $Done['Done'] = true;
        return response()->json($Done,201);
    }
}
