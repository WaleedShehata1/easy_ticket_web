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
        Schema::create('shipping_operations', function (Blueprint $table) {
            $table->id();
            $table->integer('Shipping_number');
            $table->datetime('date');
            $table->datetime('time');
            $table->float('Shipping_value');
            $table->integer('Shipping_account_number');
            $table->foreignId('passenger_id');
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
        Schema::dropIfExists('shipping_operations');
    }
};
