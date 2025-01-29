<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersIdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_idiomas')->truncate();


        DB::table('user_idiomas')->insert([
            [
                'user_id' => 1,
                'idioma_id' => 1,
                'nivel' => 'Básico',
                'certificado' => 0,
            ],
            [
                'user_id' => 1,
                'idioma_id' => 2,
                'nivel' => 'Intermedio',
                'certificado' => 1,
            ],
            [
                'user_id' => 2,
                'idioma_id' => 1,
                'nivel' => 'Intermedio',
                'certificado' => 0,
            ],
            [
                'user_id' => 2,
                'idioma_id' => 2,
                'nivel' => 'Avanzado',
                'certificado' => 1,
            ],
        ]);
    }
}
