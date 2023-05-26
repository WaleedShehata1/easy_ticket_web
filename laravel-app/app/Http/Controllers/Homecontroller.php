<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metro_line;

class Homecontroller extends Controller
{
    public function showhome(){
        return view('home');
    }





    public function lineandstation(){
        $lineandstatione=Metro_line::with('stations')->where('id','>',0)->get();
        // return response($lineandstatione -> stations,200);
        // return $lineandstatione;
        return response([
            "metro_line"=>$lineandstatione
        ], 201);
    }
}
