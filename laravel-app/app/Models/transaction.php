<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function Payment_transaction (){
        return $this->hasMany(
            related:'App\Models\Payment_transaction',
            foreignKey:'payment_transaction_id',
            localKey:'id'
        );
    }
    public function Passenger (){
        return $this->belongsTo(
            related:'App\Models\Passenger',
            foreignKey:'passenger_id',
            localKey:'id'
        );
    }
}
