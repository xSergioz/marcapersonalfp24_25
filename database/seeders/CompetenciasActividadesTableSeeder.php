<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetenciasActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('competencias_actividades')->truncate();
        $competencias = DB::table('competencias')->get();
        $actividades = DB::table('actividades')->get();
        foreach($competencias as $competencia){
            $relaciones=rand(0,2);
            $actividadesRandom=$actividades->random($relaciones);
            foreach($actividadesRandom as $actividad){
                try {
                    DB::table('competencias_actividades')->insert([
                        'actividad_id'=>$actividad->id,
                        'competencia_id'=>$competencia->id
                    ]);
                } catch (\Exception $e) {
                    $this->command->error('Error al insertar actividad ' . $actividad->id . ' en competencia ' . $competencia->id);
                }
            }
        }
    }
}
