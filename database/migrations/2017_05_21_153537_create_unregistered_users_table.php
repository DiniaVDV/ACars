<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnregisteredUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unregistered_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('second_name', 100);
            $table->string('email', 100)->unique();
            $table->integer('phone_number');
            $table->string('city', 50);
            $table->string('street', 50);
            $table->string('house_number', 10);
            $table->string('flat_number', 10)->nullable();
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
        Schema::dropIfExists('unregistered_users');
    }
}
