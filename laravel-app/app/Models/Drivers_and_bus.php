<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers_and_bus extends Model
{
    use HasFactory;
    protected $table='drivers_and_buss';
    protected $fillable = [
        'bus_id',
        'driver_id',
    ];
}
