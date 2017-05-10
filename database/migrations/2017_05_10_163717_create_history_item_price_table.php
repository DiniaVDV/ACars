<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryItemPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_item_price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->unsignet()->index();
            $table->integer('item_id')->references('id')->on('items');
            $table->float('price');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_item');
    }
}
