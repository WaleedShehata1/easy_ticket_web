<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metro extends Model
{
    use HasFactory;
    public function stations(){
        return $this -> belongsToMany(
        related:'App\Models\Station',
        table:'drivers_and_metros',
        foreignPivotKey:'metro_id',
        relatedPivotKey:'station_id',);
    }
}
