<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\ResetPasswordverificationNotification;
use App\Http\Requests\Api\forgetpasswordRequest;

class forgetpasswordcontroller extends Controller
{
    public function forgetpassword(forgetpasswordRequest $request){
        $input = $request->only('email');
        $user = User::where('email',$input)->first();
        $user ->notify(new ResetPasswordverificationNotification());
        $Done['Done'] = true;
        return response()->json($Done,201);


    }
}

