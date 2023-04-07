<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function Bus_routes(){
        return $this -> belongsToMany(related:'APP\Models\Bus_routes',table:'Buss_routes_and_station',foreignPivotKey:' bus_route_id',relatedPivotKey:'station_id');
    }
    public function Buss(){
        return $this -> belongsToMany(related:'APP\Models\Buss',table:'stations_and_buss',foreignPivotKey:' station_id',relatedPivotKey:'bus_id');
    }
    public function drivers(){
        return $this -> belongsToMany(related:'APP\Models\drivers',table:'drivers_and_stations',foreignPivotKey:'station_id ',relatedPivotKey:'metro_id');
    }
}
