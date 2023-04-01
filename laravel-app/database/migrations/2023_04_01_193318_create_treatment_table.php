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
        Schema::create('treatment', function (Blueprint $table) {
            $table->id();
            $table->intger('Transaction_number');
            $table->datetime('Date_of_entry');
            $table->datetime('Entrytime');
            $table->datetime('time_to_go_out');
            $table->srting('Entry_station');
            $table->srting('exitterminal');
            $table->set('tiket_status', ['used', 'not used']);
            $table->datetime('date_of_use');
            $table->foreignId('tiket_id');
            $table->foreignId('theoperation_id');
            $table->foreignId('bus_id');
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
        Schema::dropIfExists('treatment');
    }
};
