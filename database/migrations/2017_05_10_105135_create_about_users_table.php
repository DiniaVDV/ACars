<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('second_name');
            $table->integer('phone_number');
            $table->string('city');
            $table->string('street');
            $table->string('house_number');
            $table->string('flat_number')->nullable();
            $table->integer('car_id')->unsigned()->index()->nullable();
            $table->integer('car_id')->references('id')->on('cars')->onDelete('cascade');
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
        Schema::drop('about_user');
    }
}
