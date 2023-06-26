<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buss_and_passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'passenger_id',
    ];
}
