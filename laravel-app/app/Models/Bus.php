<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Passengercontroller;

class Bus extends Model
{

    use HasFactory;
    protected $table="buss";
    public function passengers(){
        return $this->belongsToMany(related:'App\Models\Passenger',
        table:'buss_and_passengers',
        foreignPivotKey:'bus_id',
        relatedPivotKey:'passenger_id',
        parentKey:'id',
        realtedKey:'id');
    }
    public function stations(){
        return $this -> belongsToMany(
        related:'App\Models\Station',
        table:'Stations_and_Buss',
        foreignPivotKey:'bus_id',
        relatedPivotKey:'station_id');
    }
    public function drivers(){
        return $this -> belongsToMany(
        related:'App\Models\Bus',
        table:'stations_and_buss',
        foreignPivotKey:' bus_id',
        relatedPivotKey:'driver_id');
    }

    public function Bus_timings(){
        return $this-> hasMany(related:'App\Models\Bus_timing',foreignKey:'bus_id');
    }
}
