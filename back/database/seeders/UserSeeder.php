<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Pretplata;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Kreiraj korisnike
        $korisnici = User::factory()->count(10)->create();

        // Uzmi sve pretplate iz baze
        $pretplate = Pretplata::all();

        // Poveži korisnike sa pretplatama
        foreach ($korisnici as $korisnik) {
            // 50% šanse da korisnik ima pretplatu
            if (rand(0, 1) === 1) {
                // Izaberi nasumičnu pretplatu
                $pretplata = $pretplate->random();
                $korisnik->pretplate()->attach($pretplata->id, [
                    'datum_pocetka' => now(),
                    'datum_isteka' => now()->addMonths($pretplata->brojUMesecima),
                ]);
            }
        }
    }
}

 
