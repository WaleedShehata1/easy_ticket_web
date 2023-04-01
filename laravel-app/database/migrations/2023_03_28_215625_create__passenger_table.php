<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->integer('national ID',14);
            $table->string('first Name',30);
            $table->string('last Name',30);
            $table->set('gender', ['male', 'female']);
            $table->integer('password')->unique();
            $table->string('email')->unique();
            $table->string('health status')->unique();
            $table->date('date_of_birth');
            $table->integer('phone',11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_passenger');
    }
};