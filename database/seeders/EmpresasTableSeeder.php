<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas')->insert([
            [
                'nif' => 'A12345678',
                'nombre' => 'Empresa Uno',
                'token' => 'Token1234567890',
                'user_id' => 1,
            ],
            [
                'nif' => 'B87654321',
                'nombre' => 'Empresa Dos',
                'token' => 'Token0987654321',
                'user_id' => 2,
            ],
            [
                'nif' => 'C11223344',
                'nombre' => 'Empresa Tres',
                'token' => 'Token1122334455',
                'user_id' => 3,
            ],
        ]);
    }
}
