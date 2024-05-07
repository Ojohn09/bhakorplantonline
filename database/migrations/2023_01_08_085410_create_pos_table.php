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
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->integer('pos_id');
            $table->integer('location_id');
            $table->integer('user_id');
            $table->string('customer_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('amount');
            $table->integer('price');
            $table->string('pos_invoice');
            $table->string('payment_type');
            $table->string('date');
            $table->string('comment');

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
        Schema::dropIfExists('pos');
    }
};
