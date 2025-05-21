<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Curso::factory()->count(10)->create();
        
        Curso::create([
            'name' => 'Ingeniería de Software',
            'descripcion' => 'Curso del plan curricular que abarca patrones de diseño, testing y arquitectura.'
        ]);

        Curso::create([
            'name' => 'Desarrollo Web',
            'descripcion' => 'Curso práctico sobre tecnologías web frontend y backend.'
        ]);
    }
}
