<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metro extends Model
{
    public function drivers(){
        return $this -> belongsToMany(related:'APP\Models\drivers',table:'drivers_and_metros',foreignPivotKey:'station_id',relatedPivotKey:'metro_id');
    }
}
