<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function transactions (){
        return $this->hasMany(
            related:'App\Models\transaction',
            foreignKey:'transaction_id',
            localKey:'id'
        );
    }

}
