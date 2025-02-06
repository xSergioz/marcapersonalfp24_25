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

            if(config('app.env') ==='local'){
                try{
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

                    // UsersCiclos::factory(10)->create();
                    // UsersCiclos::factory()->create([
                    //     'user_id' => 1,
                    //     'ciclo_id' => 1
                    // ]);
                }catch(\Exception $e){
                    echo "Da el siguiente error de duplicado: {$e->getMessage()}\n";
                }
            }

    }
}
