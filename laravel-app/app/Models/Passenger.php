<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\Api\AuthController;


class Passenger extends Model
{
    use HasFactory;

    protected $table='passengers';
    protected $fillable = [
      'national_ID',
      'first_Name',
      'last_Name',
      'gender',
      'password',
      'email',
      'email_verified_at',
      'remember_token',
      'health_status',
      'date_of_birth',
      'phone',
      'profession',
      'created_at',
      'updated_at'
  ];
  protected $hidden = [
    'password',
    'remember_token',
    'created_at',
    'updated_at',
];
}
