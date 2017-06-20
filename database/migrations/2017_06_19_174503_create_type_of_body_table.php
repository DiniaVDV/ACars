<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfBodyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_body', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->integer('type_of_body_id')->unsigned()->index()->change();
            $table->foreign('type_of_body_id')->references('id')->on('type_of_body')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_body');
    }
}
