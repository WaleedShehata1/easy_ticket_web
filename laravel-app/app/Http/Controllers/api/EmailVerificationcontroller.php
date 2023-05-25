<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Otp;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Container\BindingResolutionException;
class EmailVerificationcontroller extends Controller 
{
    private $otp;
    public function __construct(){
        $this->otp = new Otp;

    }
    public function email_verification(Request $request){
        // $otp22 = $this->otp->validate($request->email,$request->otp);
        
        $otp22 = $this->otp->validate($request->email,$request->otp,[
            'email' => ['required','email','exists:users'],
            'otp' => ['required','max:6'],
        ]);
        
        if (!$otp22->status){
            return response([$otp22],201);
        }
    
        $user =User::where('email',$request->email)->first();
        $user->update(['email_verified_at'=>now()]);
        $Done['status'] = true;
        $Done['message'] = 'succeeded';
        return response()->json($Done,201);
    }
}
