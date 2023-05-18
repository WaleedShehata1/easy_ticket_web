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
            $table->integer('national_ID');
            $table->string('first_Name',30);
            $table->string('last_Name',30);
            $table->set('gender', ['male', 'female']);
            $table->integer('password')->unique();
            $table->string('email')->unique();
            $table->string('health_status');
            $table->string('profession');
            $table->date('date_of_birth');
            $table->string('phone');
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
        Schema::dropIfExists('passengers');
    }
};
