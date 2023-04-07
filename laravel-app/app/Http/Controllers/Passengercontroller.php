<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;

class Passengercontroller extends Controller
{
    public function getp(){
        return $passengers=Passenger::with(relations:'buss')->find(1);

    }
}
