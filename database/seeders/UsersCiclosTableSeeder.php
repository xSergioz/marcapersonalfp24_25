<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use App\Models\User;
use App\Models\UsersCiclos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersCiclosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersCiclos::truncate();
        $users = User::all();
        $ciclos = Ciclo::all();

        foreach ($users as $user) {
            $numCiclos = rand(0, 2);

            if ($numCiclos > 0) {
                $ciclosAleatorios = $ciclos->random($numCiclos);

                foreach ($ciclosAleatorios as $ciclo) {
                    $user->ciclos()->attach($ciclo->id);
                }
            }
        }

/*
        Propuesta de solución que no funciona, al asignar usuarios a ciclos se crean
        registros adicccionales eeen la tabla piiivotee,  porque al asignarrse 207 ciclos existentes
        0,1 o 2 uusuarios, de los 11 que hay en la tabla users, se crean registros adicionales en la
        tabla pivote, que al hacer un GET  usuarios hace que un usuariio tenga  assignados mas de  2 ciclo
                    foreach ($users as $user) {
                        $numCiclos = rand(0, 2);
                        if ($numCiclos > 0) {
                            $ciclosAleatorios = $ciclos->random($numCiclos);
                            $user->ciclos()->attach($ciclosAleatorios);
                        }
                    }
                    foreach ($ciclos as $ciclo) {
                        $numUsers = rand(0, 2);
                        if ($numUsers > 0) {
                            $usersAleatorios = $users->random($numUsers);
                            $ciclo->users()->attach($usersAleatorios);
                        }
                     }
                        */




    }
}
