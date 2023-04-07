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
}
