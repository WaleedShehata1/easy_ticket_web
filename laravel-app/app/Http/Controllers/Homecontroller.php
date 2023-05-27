<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metro_line;
use App\Models\Metro;
use App\Models\Metro_timing;


class Homecontroller extends Controller
{
    public function showhome(){
        return view('home');
    }





    // public function lineandstation(){
    //     $lineandstatione=Metro_line::with('stations')->where('id','>',0)->get();
    //     // return response($lineandstatione -> stations,200);
    //     // return $lineandstatione;
    //     return response([
    //         "metro_line"=>$lineandstatione
    //     ], 201);
    // }

    // public function metrostation(){
    //     $metrostations=Metro::with('stations')->where('id','>',0);
    //     // return response($lineandstatione -> stations,200);
    //     // return $lineandstatione;
    //     return response([
    //         "metro"=>$metrostations
    //     ], 201);
    // }

    public function metrotiming(){

        $first_line=Metro_line::with('stations')->find(1);
        $second_line=Metro_line::with('stations')->find(2);
        $first_line_and_metros=Metro_line::find(1);
        $second_line_and_metros=Metro_line::find(2);
        $first_metros=metro::find(1);
        $second_metros=metro::find(2);
        $data['first_line']=$first_line;
        // $data['first_line']['metro']=$first_line_and_metros->metros;
        $data['second_line']=$second_line;
        // $data['second_line']['metro']=$second_line_and_metros->metros;
        
        
        return response($data,201);
    }

    public function metro(){

        $first_metros=metro::find(1);
        $second_metros=metro::find(2);
        $data['first_line']=$first_line;
        // $data['first_line']['metro']=$first_line_and_metros->metros;
        $data['second_line']=$second_line;
        // $data['second_line']['metro']=$second_line_and_metros->metros;
        
        
        return response($data,201);
    }







}
