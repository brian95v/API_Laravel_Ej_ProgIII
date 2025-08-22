<?php

namespace Database\Factories;

use App\Models\Carreras;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carreras>
 */
class CarrerasFactory extends Factory
{
    // Defino el modelo
    protected $model = Carreras::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'carNombre' => $this->faker->unique()->sentence(3)
        ];
    }

    // Crea un nuevo método 'configure' para definir la secuencia
    public function configure(): static
    {
        return $this->sequence(
            ['carNombre' => 'Tecnicatura en Software'],
            ['carNombre' => 'Profesorado de Primaria'],
            ['carNombre' => 'Profesorade de Matemática'],
            ['carNombre' => 'Tecnicatura de Enfermería'],
        );
    }
}
