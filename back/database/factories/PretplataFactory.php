<?php

namespace Database\Factories;

use App\Models\Pretplata;
use Illuminate\Database\Eloquent\Factories\Factory;

class PretplataFactory extends Factory
{
    protected $model = Pretplata::class;

    public function definition()
    {
        $brojUMesecima = $this->faker->randomElement([1, 3, 6, 12]);
        $cena = 0;

        // Postavljamo cenu na osnovu broja meseci
        if ($brojUMesecima === 1) {
            $cena = 2;
        } elseif ($brojUMesecima === 3) {
            $cena = 5;
        } elseif ($brojUMesecima === 6) {
            $cena =8;
        } elseif ($brojUMesecima === 12) {
            $cena = 14;
        }

        return [
            'brojUMesecima' => $brojUMesecima,
            'cena' => $cena,
        ];
    }
}
