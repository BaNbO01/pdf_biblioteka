<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutoriSeeder extends Seeder
{
    public function run()
    {
        Autor::factory()->count(10)->create(); // Kreira 10 autora
    }
}
