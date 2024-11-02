<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zanr;

class ZanroviSeeder extends Seeder
{
    public function run()
    {
        $zanrovi = ['Akcija', 'Komedija', 'Istorija', 'Tehnologija', 'Naucna fantastika', 'Romantika'];

        foreach ($zanrovi as $zanr) {
            Zanr::factory()->create(['naziv' => $zanr]);
        }
    }
}
