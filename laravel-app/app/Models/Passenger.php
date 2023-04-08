<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $table="passengers";
    public function buss(){
        return $this->belongsToMany(related:'App\Models\Bus',
        table:'buss_and_passengers',
        foreignPivotKey:'passenger_id',
        relatedPivotKey:'bus_id',
        parentKey:'id',
        relatedKey:'id');
    }

    public function Shipping_operations(){
        return $this-> hasMany(related:'App\Models\Shipping_operation',foreignKey:'passenger_id');
    }

    public function transactions (){
        return $this->hasMany(
            related:'App\Models\Transaction',
            foreignKey:'passenger_id',
            localKey:'id'
        );
    }
}
