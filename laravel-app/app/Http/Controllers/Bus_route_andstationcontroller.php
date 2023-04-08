<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus_route;

class Bus_route_andstationcontroller extends Controller
{
    public function getbus(){
        $buss=Bus_route::with(relations:'buss')->find(id:1);
        return $buss;
    }
}
