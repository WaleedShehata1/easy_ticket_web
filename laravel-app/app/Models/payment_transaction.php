<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_transaction extends Model
{
    use HasFactory;
    public function Transactions (){
        return $this->hasMany(
            related:'App\Models\Payment_transaction',
            foreignKey:'payment_transaction_id',
            localKey:'id'
        );
    }
}
