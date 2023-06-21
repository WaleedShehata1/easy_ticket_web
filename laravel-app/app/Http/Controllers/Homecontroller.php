<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Homecontroller extends Controller
{
    public function showhome(){

        return view('home');
        
    }
    public function test(){

        $user=User::find(2);

        return $user->transaction ;

    }

}
