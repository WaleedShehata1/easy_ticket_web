<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_timing extends Model
{
    use HasFactory;
    public function Bus_route(){
        return $this-> belongsTo(related:'App\Models\Bus_route',foreignKey:'bus_route_id');
    }
}
