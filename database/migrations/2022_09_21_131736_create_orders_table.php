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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->integer('phone');
            $table->string('adress');
            $table->string('city');
            $table->integer('totalPrice');
            $table->string('orderStatus')->default('0');
            $table->string('message')->nullable();
            $table->string('trackingNumber');
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
        Schema::dropIfExists('orders');
    }
};
