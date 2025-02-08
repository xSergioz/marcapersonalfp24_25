<?php

namespace Database\Seeders;

use App\Models\Competencia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersCompetenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_competencias')->truncate();

        // obtengo todos los usuarios
        $users = User::all();

        foreach ($users as $user){
            // selecciono competencias aleatorias.
            // inRandomOrder() selecciona las competencias en orden aleatorio
            // limit(rand(0, 2)) limita la cantidad de competencias que se asigan
            $competencias = Competencia::inRandomOrder()->limit(rand(0, 2))->get();

            // asigno las competencias al usuario en la tabla intermedia
            // competencias() es el método que se define en el Modelo User
            // attach() es el método que se usa para asignar las competencias al usuario
            // ['docente_validador' => rand(1, 10)] agrega un valor aleatorio al campo "docente_validador"
            $user->competencias()->attach($competencias, ['docente_validador' => rand(1, 10)]);
        }
    }
}
