<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
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
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_of_car', 50);
            $table->string('brand', 50);
            $table->string('years', 50);
            $table->string('model', 50);
            $table->string('engine', 50);
            $table->string('modification', 50);
            $table->string('image', 100);
            $table->string('alias', 100);
            $table->string('type_of_body', 100);
            $table->string('type_of_engine', 100);
            $table->string('wheel_drive', 100);
        });

        DB::update("ALTER TABLE cars AUTO_INCREMENT = 1000");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
