<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\Auth\Emailverctionrequest;
use App\Http\Requests\email;
use Otp;
use App\Models\User;
class EmailVerificationcontroller extends Controller 
{
    private $otp;
    public function _construct(){
        $this ->otp = new Otp;

    }
    public function email_verification(email $request){

        // $otp22 = $this->otp->validate($request->email,$request->otp);
        $otp22 ;

        if(!$otp22->status){
            return response(['error'=>$otp22],404);
        }

        $user =User::where('email',$request->email)->first();

        $user->update(['email_verified_at'=>now()]);

        $Done['status']= true ;
        return response($Done,201); 
    }
}
