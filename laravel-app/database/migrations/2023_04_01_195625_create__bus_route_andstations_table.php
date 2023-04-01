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
        Schema::create('_bus_route_andstations', function (Blueprint $table) {
            $table->id();
            $table->intger('Bus_route_number');
            $table->datetime('waiting_period');
            $table->float('Ticket_price');
            $table->datetime('Bus_timings');
            $table->string('starting_station');
            $table->string('end station');
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
        Schema::dropIfExists('_bus_route_andstations');
    }
};
