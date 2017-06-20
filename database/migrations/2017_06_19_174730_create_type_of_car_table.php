<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->renameColumn('type_of_car', 'type_of_car_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_car');
    }
}
