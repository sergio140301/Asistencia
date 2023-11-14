<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instructor;
use App\Models\Lista;
use App\Models\Curso;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lista>
 */
class ListaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $horaInicio = \Faker\Factory::create()->time();
        $horaFinal = \Faker\Factory::create()->time($max = 'now');

        // Asegúrate de que la hora final sea mayor que la hora inicial
        while (strtotime($horaFinal) <= strtotime($horaInicio)) {
            $horaFinal = \Faker\Factory::create()->time($max = 'now');
        }

        return [
            'horaInicio' => $horaInicio,
            'horaFinal' => $horaFinal,
            'lugar' => \Faker\Factory::create()->company(),
            'curso_id' => Curso::factory(),
            'instructor_id' => Instructor::factory(),
        ];
    }
}
