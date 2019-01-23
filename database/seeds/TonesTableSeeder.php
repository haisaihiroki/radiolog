<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tones')->insert([
            'tone' => '1',
            'name' => '極めてあらい音',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '2',
            'name' => '大変あらい交流音で、楽音の感じは少しもしない音調',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '3',
            'name' => 'あらくて低い調子の交流音でいくぶん楽音に近い音調',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '4',
            'name' => 'いくらかあらい交流音で、かなり楽音性に近い音',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '5',
            'name' => '楽音的で変調された音色',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '6',
            'name' => '変調された音、すこしビューッという音を伴っている',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '7',
            'name' => '直流に近い音で、少しリプルが残っている',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '8',
            'name' => 'よい直流音色だが、ほんのわずかにリプルが感じられる',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
        DB::table('tones')->insert([
            'tone' => '9',
            'name' => '完全な直流音',
            'created_at' => '2019/01/23 00:00:00',
            'updated_at' => '2019/01/23 00:00:00',
        ]);
    }
}
