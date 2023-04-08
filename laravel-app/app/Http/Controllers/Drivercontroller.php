<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;


class Drivercontroller extends Controller
{
    public function getdrive(){
        $driver=Driver::with(relations:'metros')->find(id:1);
        return $driver;
    }
}
