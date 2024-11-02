<?php

namespace Database\Factories;

use App\Models\Zanr;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZanrFactory extends Factory
{
    protected $model = Zanr::class;

    public function definition()
    {
        return [
            'naziv' => $this->faker->word,
        ];
    }
}
