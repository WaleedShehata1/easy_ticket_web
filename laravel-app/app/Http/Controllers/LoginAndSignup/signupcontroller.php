<?php

namespace App\Http\Controllers\LoginAndSignup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\support\facades\Validator;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\Auth;

class signupcontroller extends Controller
{
    public function showsignup(){

        if(Auth::check()){
            return redirect(route('home'));
        }else{
            return view('signup');
        }

    }

    public function creatuser(Request $request){

        // return $request ->national_ID;
        // if(Auth::check()){
        //     return redirect(route('home'));
        // }else{
        //     return view('login');
        // }
        $validated=validator::make($request->all(),
        [
            'national_ID' => 'required|integer|unique:passengers,national_ID',
            'first_Name' => 'required|string|max:20',
            'last_Name' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'password' => 'required|max:20|confirmed',
            'email' => 'required|email|unique:passengers,email',
            'health_status'=>'required|string|max:30',
            'date_of_birth'=>'required|string|max:20',
            
   
   
        ],[
                // jjjjjjjjjjj?
        ]);
            if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all);
            }

                Passenger::create([
                'national_ID'=>$request ->national_ID,
                'first_Name'=>$request ->first_Name,
                'last_Name'=>$request ->last_Name,
                'gender'=>$request ->gender,
                'password'=>Hash::make($request ->password),
                'email'=>$request ->email,
                'health_status'=>$request ->health_status,
                'date_of_birth'=>$request ->date_of_birth,
                'phone'=> $request ->phone
            ]);
            // return 'ok';
            return redirect(route('login'));

    }
}
