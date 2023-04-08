<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class drivers_and_metroscontroller extends Controller
{
    public function get(){
    return $drivers=Metro::with(relations:'buss')->find(1);
    }
}
