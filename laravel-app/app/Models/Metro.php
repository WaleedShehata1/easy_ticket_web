<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metro extends Model
{
    use HasFactory;


    protected $hidden = [];



    public function stations(){
        return $this -> belongsToMany(
        related:'App\Models\Station',
        table:'metros_and_stations',
        foreignPivotKey:'metro_id',
        relatedPivotKey:'station_id',);
        // ->withPivot('arrival_time','waiting_period')
    }
    public function metro_line(){
        return $this-> belongsTo(related:'App\Models\Metro_line',foreignKey:'metro_line_id');
    }

    public function metro_timing(){
        return $this-> hasMany(related:'App\Models\Metro_timing',foreignKey:'metro_id');
    }
}
