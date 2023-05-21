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
        Schema::create('drivers_and_metros', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_of_work');
            $table->datetime('end_of_work');
            $table->datetime('date');
            $table->foreignId('metro_id');
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
        Schema::dropIfExists('drivers_and_metros');
    }
};
