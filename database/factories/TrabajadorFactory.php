<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departamento;
use App\Models\Puesto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trabajador>
 */
class TrabajadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->name(),
            'apellidoP'=>fake()->firstname(),
            'apellidoM'=>fake()->lastname(),
            'rfc'=>fake()->regexify('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'),
            'fechaIngreso'=>fake()->date(),
            'escolaridad'=>fake()->randomElement(['Primaria', 'Secundaria', 'Preparatoria', 'Universidad']),
            'departamento_id'=>Departamento::factory(),
            'puesto_id'=>Puesto::factory()
        ];
    }
}
