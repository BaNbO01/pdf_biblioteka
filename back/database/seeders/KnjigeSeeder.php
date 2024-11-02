<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Knjiga;
use App\Models\Autor;
use App\Models\Zanr;

class KnjigeSeeder extends Seeder
{
    public function run()
    {
        $autori = Autor::all();
        $zanrovi = Zanr::all();

        foreach ($autori as $autor) {
            Knjiga::factory()
                ->count(3)
                ->create()
                ->each(function ($knjiga) use ($autor, $zanrovi) {
                    $knjiga->autori()->attach($autor->id);
                    $knjiga->zanrovi()->attach($zanrovi->random(2)->pluck('id')); 
                });
        }
    }
}
