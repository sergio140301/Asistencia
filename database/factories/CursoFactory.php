<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fechaInicio = $this->faker->date();
        $fechaFinal = $this->faker->dateTimeBetween($fechaInicio, '+2 months')->format('Y-m-d');
    
        return [
            'nombreCurso' => fake()->name(),
            'areaTematica' => fake()->cityPrefix(),
            'fechaInicio' => $fechaInicio,
            'fechaFinal' => $fechaFinal
        ];
    }
}
