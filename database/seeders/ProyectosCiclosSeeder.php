<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use App\Models\Proyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyectosCiclosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proyectos_ciclos')->truncate();
        // Asignar proyectos a ciclos
        $ciclos = Ciclo::all()->take(10);
        $proyectos = Proyecto::all();

        foreach ($ciclos as $ciclo) {

            $registros = rand(0, 2);

            for ($i = 0; $i < $registros; $i++) {
                $proyecto = $proyectos->random();
                $ciclo->proyectos()->attach($proyecto);
            }
        }

        $this->command->info('¡Tabla proyectos_ciclos inicializada con datos!');
    }
}
