<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ActividadReconocimientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('actividad_reconocimiento')->truncate();
        // Asignar proyectos a ciclos
        $actividades = DB::table('actividad')->get();
        $reconocimientos = DB::table('reconosimiento')->get();

        foreach ($actividades as $actividad) {
            foreach ($reconocimientos as $reconocimiento) {
                DB::table('actividad_reconocimiento')->insert([
                    'actividad_id' => $actividad->id,
                    'reconocimiento_id' => $reconocimiento->id,
                ]);
            }
        }

        $this->command->info('¡Tabla proyectos_ciclos inicializada con datos!');
    }
}
