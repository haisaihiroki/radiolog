<?php

use App\CommunicationLog;
use App\Band;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('communication_logs', function (Blueprint $table) {
            $table->integer('band_id')->default(0);
        });

        $logs = CommunicationLog::all();
        foreach ($logs as $log)
        {
            $band = new Band();
            $tmp = $band->getBand($log->band);
            $log->band_id = $tmp->id;
            $log->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('communication_logs', function (Blueprint $table) {
            $table->dropColumn('band_id');
        });
    }
};
