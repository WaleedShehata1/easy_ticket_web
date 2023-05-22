<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\ResetPasswordverificationNotification;
use Illuminate\Support\Facades\Validator;

class forgetpasswordcontroller extends Controller
{
    public function forgetpassword(Request $request){
        // $input = $request->only('email');
        // $input =validate($request->email,[
        //     'email' => ['required','email','exists:users'],
        // ]);

        $input = Validator::make($request->all(), [
             'email' => ['required','email','exists:passengers,email'],
        ]);

        if ( $input->fails()){
            return response(['message'=> 'not found','status'=> false,'data' => null,],201);
        }

        $user = User::where('email',$request->email)->first();
        $user ->notify(new ResetPasswordverificationNotification());
        $Done['Done'] = true;
        return response()->json($Done,201);


    }
}

