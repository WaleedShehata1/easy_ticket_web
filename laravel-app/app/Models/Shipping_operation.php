<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_operation extends Model
{
    use HasFactory;
    public function Passengers(){
        return $this-> belongsTo(related:'App\Models\Passenger',foreignKey:'passenger_id');
    }
}
