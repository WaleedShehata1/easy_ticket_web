<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_route extends Model
{
    use HasFactory;
    public function stations(){
        return $this -> belongsToMany(
        related:'App\Models\Station',
        table:'Buss_routes_and_stations',
        foreignPivotKey:'bus_route_id',
        relatedPivotKey:'station_id');
    }
}
