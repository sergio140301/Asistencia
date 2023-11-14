<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\listaCurso;
use App\Models\Curso;
use App\Models\Instructor;

class ListaCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        listaCurso::factory(10)
               ->create();
    }
}
