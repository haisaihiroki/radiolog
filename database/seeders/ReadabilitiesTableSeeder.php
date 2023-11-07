<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReadabilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('readabilities')->insert([
            'readability' => '1',
            'name' => '了解できない',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('readabilities')->insert([
            'readability' => '2',
            'name' => 'かろうじて了解できる',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('readabilities')->insert([
            'readability' => '3',
            'name' => 'かなり困難だが了解できる',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('readabilities')->insert([
            'readability' => '4',
            'name' => '実用上困難なく了解できる',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('readabilities')->insert([
            'readability' => '5',
            'name' => '完全に了解できる',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
    }
}
