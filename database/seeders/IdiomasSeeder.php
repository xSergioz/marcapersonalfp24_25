<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('idiomas')->truncate();

        DB::table('idiomas')->insert([
            [
                'alpha2' => 'en',
                'alpha3t' => 'eng',
                'alpha3b' => 'eng',
                'english_name' => 'English',
                'native_name' => 'English',
            ],
            [
                'alpha2' => 'es',
                'alpha3t' => 'spa',
                'alpha3b' => 'spa',
                'english_name' => 'Spanish',
                'native_name' => 'Español',
            ],
            [
                'alpha2' => 'fr',
                'alpha3t' => 'fra',
                'alpha3b' => 'fre',
                'english_name' => 'French',
                'native_name' => 'Français',
            ],
                ]);
    }
}
