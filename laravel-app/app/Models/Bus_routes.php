<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_routes extends Model
{
    public function stations(){
        return $this -> belongsToMany(related:'APP\Models\Stations',table:'Buss_routes_and_station',foreignPivotKey:'station_id',relatedPivotKey:'bus_route_id');
    }
}

  
