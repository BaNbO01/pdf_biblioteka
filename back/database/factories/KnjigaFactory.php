<?php

namespace Database\Factories;

use App\Models\Knjiga;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnjigaFactory extends Factory
{
    protected $model = Knjiga::class;

    public function definition()
    {
        return [
            'naziv' => $this->faker->sentence(3),
            'putanja_slike' => $this->faker->imageUrl(),
            'putanja_pdf' => $this->faker->filePath('pdfs', 'pdf'), 
        ];
    }
}
