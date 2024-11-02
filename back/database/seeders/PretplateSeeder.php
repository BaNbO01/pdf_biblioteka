<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pretplata;

class PretplateSeeder extends Seeder
{
    public function run()
    {
        Pretplata::factory()->count(5)->create(); 
    }
}
