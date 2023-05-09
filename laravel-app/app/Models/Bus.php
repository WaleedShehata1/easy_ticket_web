<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Passengercontroller;
use App\Http\Controllers\postcontroller;

class Bus extends Model
{

    use HasFactory;
    protected $table="buss";
    protected $fillable=['bus_number','position','bus_line_id'];
    // protected $spatialFields = ['location'];
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
        related:'App\Models\station',
        table:'stations_and_buss',
        foreignPivotKey:' bus_id',
        relatedPivotKey:'station_id');
    }
    public function drivers(){
        return $this -> belongsToMany(
        related:'App\Models\Bus',
        table:'stations_and_buss',
        foreignPivotKey:' bus_id',
        relatedPivotKey:'driver_id');
    }

    public function bus_route(){
        return $this->belongsto(
            related:'App\Models\Bus_route',
            foreignKey:'bus_line_id',
            localKey:'id'
        );
    }
}
