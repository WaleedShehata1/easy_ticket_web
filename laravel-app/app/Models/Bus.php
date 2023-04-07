<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    public function stations(){
        return $this -> belongsToMany(related:'APP\Models\station',table:'stations_and_buss',foreignPivotKey:' bus_id',relatedPivotKey:'station_id');
    }
    public function drivers(){
        return $this -> belongsToMany(related:'APP\Models\drivers',table:'drivers_and_buss',foreignPivotKey:'driver_id',relatedPivotKey:' bus_id');
    }
}
