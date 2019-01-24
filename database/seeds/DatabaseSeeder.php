<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ModesTableSeeder::class,
            ReadabilitiesTableSeeder::class,
            SignalStrengthsTableSeeder::class,
            TonesTableSeeder::class,
        ]);
    }
}
