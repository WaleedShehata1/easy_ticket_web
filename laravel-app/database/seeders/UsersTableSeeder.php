<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passengers')->insert([
            'national_ID' => '12345678912345',
            'first_Name' => 'abdo',
            'last_Name' => 'adel',
            'gender' => 'male',
            'password' => Hash::make('123456789'),
            'health_status' => 'good',
            'profession' => 'student',
            'date_of_birth' => '2000-2-2',
            'phone' => '12345678912',
            'email' => 'john@doe.com',
        ]);
    }
}
