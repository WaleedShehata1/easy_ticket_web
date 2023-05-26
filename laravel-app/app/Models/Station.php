<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    public function Bus_routes(){
        return $this -> belongsToMany(
        related:'App\Models\Bus_route',
        table:'Buss_routes_and_stations',
        foreignPivotKey:'station_id',
        relatedPivotKey:'bus_route_id');
    }
    public function Buss(){
        return $this -> belongsToMany(
        related:'App\Models\Bus',
        table:'stations_and_buss',
        foreignPivotKey:' station_id',
        relatedPivotKey:'bus_id');
    }
    public function Metros(){
        return $this -> belongsToMany(
        related:'App\Models\Metro',
        table:'drivers_and_stations',
        foreignPivotKey:'station_id',
        relatedPivotKey:'metro_id');
    }

    public function metro_lines(){
        return $this -> belongsToMany(
        related:'App\Models\Metro_line',
        table:'stations_and_metro_lines',
        foreignPivotKey:'station_id',
        relatedPivotKey:'metro_line_id');
    }
}
