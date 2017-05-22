<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavbarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
        Schema::create('navbar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position');
            $table->string('title', 50);
            $table->string('alias', 50);
            $table->string('placing', 50);
            $table->string('for_reg_users', 50)->default('true');
            $table->string('for_unreg_users', 50)->default('true');
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
    Schema::dropIfExists('navbar');
}
}
