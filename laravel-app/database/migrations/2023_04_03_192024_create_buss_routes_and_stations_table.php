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
        Schema::create('buss_routes_and_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id');
            $table->foreignId('bus_route_id');
            $table->timestamps();
        });
        #bus and passenger
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buss_routes_and_stations');
    }
};
