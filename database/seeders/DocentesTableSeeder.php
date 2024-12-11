<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DocentesTableSeeder extends Seeder
{
    public function run(): void
    {
        Docente::truncate();
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call(DocentesTableSeeder::class);

        Model::reguard();

        Schema::enableForeignKeyConstraints();
        Docente::factory(10)->create();
    }
}
