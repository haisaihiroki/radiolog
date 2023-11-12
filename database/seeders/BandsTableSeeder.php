<?php

namespace Database\Seeders;

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
            'band' => '2190m',
            'lower_freq' => 0.1357,
            'upper_freq' => 0.1378,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '630m',
            'lower_freq' => 0.472,
            'upper_freq' => 0.479,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '560m',
            'lower_freq' => 0.501,
            'upper_freq' => 0.504,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '160m',
            'lower_freq' => 1.8,
            'upper_freq' => 2.0,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '80m',
            'lower_freq' => 3.5,
            'upper_freq' => 4.0,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '60m',
            'lower_freq' => 5.06,
            'upper_freq' => 5.45,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '40m',
            'lower_freq' => 7.0,
            'upper_freq' => 7.3,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '30m',
            'lower_freq' => 10.1,
            'upper_freq' => 10.15,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '20m',
            'lower_freq' => 14.0,
            'upper_freq' => 14.35,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '17m',
            'lower_freq' => 18.068,
            'upper_freq' => 18.168,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '15m',
            'lower_freq' => 21.0,
            'upper_freq' => 21.45,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '12m',
            'lower_freq' => 24.890,
            'upper_freq' => 24.99,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '10m',
            'lower_freq' => 28.0,
            'upper_freq' => 29.7,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '8m',
            'lower_freq' => 40,
            'upper_freq' => 45,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '6m',
            'lower_freq' => 50,
            'upper_freq' => 54,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '5m',
            'lower_freq' => 54.000001,
            'upper_freq' => 69.9,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '4m',
            'lower_freq' => 70,
            'upper_freq' => 71,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '2m',
            'lower_freq' => 144,
            'upper_freq' => 148,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '1.25m',
            'lower_freq' => 222,
            'upper_freq' => 225,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '70cm',
            'lower_freq' => 420,
            'upper_freq' => 450,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '33cm',
            'lower_freq' => 902,
            'upper_freq' => 928,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '23cm',
            'lower_freq' => 1240,
            'upper_freq' => 1300,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '13cm',
            'lower_freq' => 2300,
            'upper_freq' => 2450,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '9cm',
            'lower_freq' => 3300,
            'upper_freq' => 3500,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '6cm',
            'lower_freq' => 5650,
            'upper_freq' => 5925,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '3cm',
            'lower_freq' => 10000,
            'upper_freq' => 10500,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '1.25cm',
            'lower_freq' => 24000,
            'upper_freq' => 24250,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '6mm',
            'lower_freq' => 47000,
            'upper_freq' => 47200,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '4mm',
            'lower_freq' => 75500,
            'upper_freq' => 81000,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '2.5mm',
            'lower_freq' => 119980,
            'upper_freq' => 123000,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '2mm',
            'lower_freq' => 134000,
            'upper_freq' => 149000,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => '1mm',
            'lower_freq' => 241000,
            'upper_freq' => 250000,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
        DB::table('bands')->insert([
            'band' => 'submm',
            'lower_freq' => 300000,
            'upper_freq' => 7500000,
            'created_at' => '2023/11/08 00:00:00',
            'updated_at' => '2023/11/08 00:00:00',
        ]);
    }
}