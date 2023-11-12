<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SignalStrengthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('signal_strengths')->insert([
            'strength' => '1',
            'name' => '微弱でかろうじて受信できる信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '2',
            'name' => '大変弱い信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '3',
            'name' => '弱い信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '4',
            'name' => '弱いが受信容易な信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '5',
            'name' => 'かなり適度な強さの信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '6',
            'name' => '適度な強さの信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '7',
            'name' => 'かなり強い信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '8',
            'name' => '強い信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('signal_strengths')->insert([
            'strength' => '9',
            'name' => 'きわめて強い信号',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
    }
}
