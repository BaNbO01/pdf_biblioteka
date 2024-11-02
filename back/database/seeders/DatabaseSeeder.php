<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PretplateSeeder::class,
            AutoriSeeder::class,
            ZanroviSeeder::class,
            UserSeeder::class,
            KnjigeSeeder::class,
        ]);
    }
}
