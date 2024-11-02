<?php

namespace Database\Factories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutorFactory extends Factory
{
    protected $model = Autor::class;

    public function definition()
    {

        $datumRodjenja = $this->faker->date($format = 'Y-m-d', $max = 'now');
        
        
        $datumSmrti = $this->faker->boolean(70) 
            ? $this->faker->dateTimeBetween($startDate = $datumRodjenja, $endDate = '+20 years')->format('Y-m-d')
            : null;

            return [
                'ime' => $this->faker->firstName,
                'prezime' => $this->faker->lastName,
                'datum_rodjenja' => $datumRodjenja,
                'datum_smrti' => $datumSmrti,
            ];
    }
}
