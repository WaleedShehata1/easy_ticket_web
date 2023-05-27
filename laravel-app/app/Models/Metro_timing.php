<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metro_timing extends Model
{
    use HasFactory;
    public function metro(){
        return $this-> belongsTo(related:'App\Models\Metro',foreignKey:'metro_id');
    }
}
