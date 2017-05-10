<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('item_id')->unsigned()->index();
            $table->integer('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->float('price');
            $table->timestamps();
        });
        DB::update("ALTER TABLE orders AUTO_INCREMENT = 10000");
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
}
