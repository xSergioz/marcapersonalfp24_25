<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectosCiclosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proyectos_ciclos')->truncate();
        $ciclos = DB::table('ciclos')->get();
        $proyectos = DB::table('proyectos')->get();

        foreach ($ciclos as $ciclo) {
            foreach ($proyectos as $proyecto) {
                DB::table('proyectos_ciclos')->insert([
                    'ciclo_id' => $ciclo->id,
                    'proyecto_id' => $proyecto->id,
                ]);
            }
        }
    }
}
