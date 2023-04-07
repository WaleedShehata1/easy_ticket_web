<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function Buss(){
        return $this -> belongsToMany(related:'APP\Models\Buss',table:'drivers_and_buss',foreignPivotKey:' bus_id',relatedPivotKey:'driver_id');
    }
    public function stations(){
        return $this -> belongsToMany(related:'APP\Models\stations',table:'drivers_and_stations',foreignPivotKey:'metro_id',relatedPivotKey:'station_id');
    }
    public function metros(){
        return $this -> belongsToMany(related:'APP\Models\metros',table:'drivers_and_metros',foreignPivotKey:'metro_id',relatedPivotKey:'station_id');
    }
}
/*
php artisan make:migration create__table 
php artisan make:model 
php artisan make:controller Bus_route_andstationcontroller 
foreignId
 */