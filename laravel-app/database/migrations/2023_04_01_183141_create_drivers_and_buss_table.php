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
        Schema::create('drivers_and_buss', function (Blueprint $table) {
            $table->id();
            $table->datetime('end_of_work');
            $table->datetime('start_of_work');
            $table->foreignId('bus_id');
            $table->foreignId('driver_id');
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
        Schema::dropIfExists('drivers_and_buss');
    }
};
