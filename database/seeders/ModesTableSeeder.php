<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class ModesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modes')->insert([
            'name' => 'AM',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('modes')->insert([
            'name' => 'FM',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('modes')->insert([
            'name' => 'SSB',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('modes')->insert([
            'name' => 'CW',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('modes')->insert([
            'name' => 'DV',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
    }
}
