<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication_log', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->string('his_callsign');
            $table->string('his_name')->nullable();
            $table->dateTime('time');
            $table->string('my_qth')->nullable();
            $table->string('his_qth')->nullable();
            $table->integer('my_r');
            $table->integer('my_s');
            $table->integer('my_t')->nullable();
            $table->integer('his_r');
            $table->integer('his_s');
            $table->integer('his_t')->nullable();
            $table->float('band');
            $table->integer('mode_id');
            $table->float('my_power')->nullable();
            $table->float('his_float')->nullable();
            $table->boolean('is_public');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communication_log');
    }
}