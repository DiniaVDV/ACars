<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->string('brand');
            $table->string('years');
            $table->string('model');
            $table->string('engine');
            $table->timestamps();
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
    }}
