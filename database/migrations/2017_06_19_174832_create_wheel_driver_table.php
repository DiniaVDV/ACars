<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWheelDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wheel_drive', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->renameColumn('wheel_drive', 'wheel_drive_id');
            $table->integer('wheel_drive_id')->unsigned()->index()->change();
            $table->foreign('wheel_drive_id')->references('id')->on('wheel_drive')->onDelete('cascade')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wheel_drive');
    }
}
