<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'Date_of_entry',
        'time_of_Entry',
        'time_of_out',
        'Entry_station',
        'Exit_station',
        'tickets_status',
        'value_price',
        'date_of_use',
        'user_id',
        'ticket_id',
        'bus_id',
    ];


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

    public function tickets (){
        return $this->belongsTo(
            related:'App\Models\Ticket',
            foreignKey:'ticket_id',
        );
    }

    public function bus (){

        return $this->belongsTo(
            related:'App\Models\Bus',
            foreignKey:'bus_id',
        );

    }


}
