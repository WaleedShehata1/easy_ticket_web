<?php

namespace App\Http\Controllers\LoginAndSignup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\support\facades\Validator;
use Illuminate\support\facades\Auth;

class logincontroller extends Controller
{
    public function showlogin(){
        if(Auth::check()){
            return redirect(route('home'));
        }else{
            return view('login');
        }
    }

    public function loginuser(Request $request){
        // if(Auth::check()){
        //     return redirect(route('home'));
        // }else{
        //     return view('login');
        // }
        $validated=validator::make($request->all(),
        [
            'national_ID' => 'required|integer',
            'password' => 'required|max:20',
        ],[
                // jjjjjjjjjjj?
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all);
            }

            $islogged=Auth::attempt(['national_ID' => $request->national_ID, 'password' => $request->password]);

            if(!$islogged){
                return redirect()->back();
            }
            return redirect(route('home'));
    }

    public function logoutuser(){
        Auth::logout();
        return redirect(route('login'));
    }

    public function showhome(){
        return view('home');
    }

}

