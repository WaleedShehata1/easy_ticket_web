<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\EmailVerificationRequest;
use otp;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
class EmailVerificationcontroller extends Controller 
{
    private $otp;
    public function _construct(){
        $this ->otp = new otp;

    }
    public function email_verification(EmailVerificationRequest $request){
        $otp22 = $this->otp->validate($request->email,$request->otp);
        if(! $otp22->status){
            return response()->json(['error'=>$otp22],404);
        }
        $user =User::where('email',$request->email)->first();
        $user->update(['email_verified_at'=>now()]);
        $Done['Done']=true;
        return response()->json($Done,201);
    }
}
