<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metro_line extends Model
{
    use HasFactory;
    
    public function stations(){
        return $this -> belongsToMany(
            related:'App\Models\Station',
            table:'stations_and_metro_lines',
            foreignPivotKey:'metro_line_id',
            relatedPivotKey:'station_id');
    }
    public function metros(){
        return $this-> hasMany(related:'App\Models\Metro',foreignKey:'metro_line_id');
    }
    public function metro_timing(){
        return $this-> hasMany(related:'App\Models\Metro_timing',foreignKey:'metro_line_id');
    }

    // public function Station(){
    //     return $this -> belongsToMany(
    //     related:'App\Models\Station',
    //     table:'stations_and_metro_lines',
    //     foreignPivotKey:'metro_line_id',
    //     relatedPivotKey:'station_id');
    // }
}
