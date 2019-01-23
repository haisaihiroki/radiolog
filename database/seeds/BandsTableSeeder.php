<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            'name' => 'AM',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('bands')->insert([
            'name' => 'FM',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('bands')->insert([
            'name' => 'SSB',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('bands')->insert([
            'name' => 'CW',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('bands')->insert([
            'name' => 'DV',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
    }
}
