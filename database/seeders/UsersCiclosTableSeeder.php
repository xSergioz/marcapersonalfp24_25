<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UsersCiclos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersCiclosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersCiclos::truncate();
        if(UsersCiclos::count() == 0) {
            if(config('app.env') ==='local'){
                try{
                    UsersCiclos::factory(10)->create();
                    UsersCiclos::factory()->create([
                        'user_id' => 1,
                        'ciclo_id' => 1
                    ]);
                }catch(\Exception $e){
                    echo "Da el siguiente error de duplicado: {$e->getMessage()}\n";
                }
            }
        }
    }
}
