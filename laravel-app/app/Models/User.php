<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
<<<<<<< HEAD

use Tymon\JWTAuth\Contracts\JWTSubject;
// use App\Http\Controllers\Api\AuthController;


class User extends Authenticatable implements MustVerifyEmail,JWTSubject

=======

class User extends Authenticatable implements MustVerifyEmail
>>>>>>> 95fa834e1d3a9535b8993febfaaae998a99f0fbb
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
        protected $table='passengers';
      protected $fillable = [
        'national_ID',
        'first_Name',
        'last_Name',
        'gender',
        'password',
        'email',
        'health_status',
        'date_of_birth',
        'phone',
        'created_at',
        'updated_at',
        'email_verified_at',
        'profession'
    ];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
