<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCommunicationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communication_logs', function (Blueprint $table) {
            $table->integer('my_r')->nullable()->change();
            $table->integer('my_s')->nullable()->change();
            $table->integer('my_s_digital')->nullable();
            $table->integer('his_r')->nullable()->change();
            $table->integer('his_s')->nullable()->change();
            $table->integer('his_s_digital')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('communication_logs', function (Blueprint $table) {
            $table->integer('my_r')->change();
            $table->integer('my_s')->change();
            $table->dropColumn('my_s_digital')->nullable();
            $table->integer('his_r')->change();
            $table->integer('his_s')->change();
            $table->dropColumn('his_s_digital')->nullable();
        });
    }
}
