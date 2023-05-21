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
        Schema::create('metros_and_stations', function (Blueprint $table) {
            $table->id();
            $table->datetime('arrival_time');
            $table->datetime('arrival_date');
            $table->datetime('waiting_period');
            $table->foreignId('metro_id');
            $table->foreignId('station_id');
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
        Schema::dropIfExists('metros_and_stations');
    }
};
