<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city')->unique();
            $table->time('sunrise');
            $table->time('sunset');
            $table->string('icon');
            $table->unsignedSmallInteger('pressure');
            $table->unsignedSmallInteger('humidity');
            $table->smallInteger('temp_min');
            $table->smallInteger('temp_max');
            $table->unsignedSmallInteger('clouds');
            $table->smallInteger('wind_speed');
            $table->smallInteger('wind_deg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers');
    }
}
