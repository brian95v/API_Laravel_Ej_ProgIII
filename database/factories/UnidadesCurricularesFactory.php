<?php

namespace Database\Factories;

use App\Models\Carreras;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnidadesCurriculares>
 */
class UnidadesCurricularesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ucNombre' => $this->faker->unique()->words(2, true),
            'carrera_id' => Carreras::factory(),
            
        ];
    }
}
