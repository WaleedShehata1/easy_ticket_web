<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    public function Buss(){
        return $this -> belongsToMany(related:'App\Models\Bus',
        table:'drivers_and_buss',
        foreignPivotKey:'driver_id',
        relatedPivotKey:'bus_id');
    }
    public function stations(){
        return $this -> belongsToMany(related:'APP\Models\Station',
        table:'drivers_and_stations',
        foreignPivotKey:'metro_id',
        relatedPivotKey:'station_id',
        parentKey:'id',
        realtedKey:'id');
    }
    public function metros(){
        return $this -> belongsToMany(
        related:'App\Models\Metro',
        table:'drivers_and_metros',
        foreignPivotKey:'driver_id',
        relatedPivotKey:'metro_id',);
    }
}
/*
php artisan make:migration create__table 
php artisan make:model 
php artisan make:controller Bus_route_andstationcontroller 
foreignId
 */