<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandItemTable extends Migration
{

    /**
     * Disable created_at and updated_at columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_item', function (Blueprint $table) {
            $table->integer('brand_id')->unsignet()->index();
            $table->integer('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('item_id')->unsignet()->index();
            $table->integer('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_item');
    }
}
