<?php

namespace App\Http\Controllers\LoginAndSignup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logandsigncontroller extends Controller
{
    public function create(){
     $validated=validator::make($request->all(),
     [
         'national_ID' => 'required|integer|max:14|unique:passengers,national_ID',
         'first_Name' => 'required|string|max:15',
         'last_Name' => 'required|string|max:15',
         'gender' => 'required|string|max:7',
         'password' => 'required|max:20',
         'confirm_password' => 'required|max:20|confirmed',
         'email' => 'required|email',
         'health_status'=>'required|string|max:20',
         'date_of_birth'=>'required|string|max:20',
         


     ],[
         'name.required'=>'اكب الاسم ياذكى',
         'adrres.required'=>'اكتب الاميل ياعم الحج',
         'desc.required'=>'وكمان ناسى تكتب دا',
     ]);
         if($validated->fails()){
         return redirect()->back()->withErrors($validated)->withInput($request->all);
         }
    }
}
