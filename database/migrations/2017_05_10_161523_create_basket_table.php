<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->integer('user_id')->unsignet()->index();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('item_id')->unsignet()->index();
            $table->integer('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->integer('counts');
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
        Schema::dropIfExists('basket');
    }
}
