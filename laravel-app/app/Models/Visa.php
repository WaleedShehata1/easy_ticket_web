<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $fillable = [
        'visa_number',
        'expire',
        'The_owner_of_the_visa',
        'Visa_balance',
    ];
    
}
