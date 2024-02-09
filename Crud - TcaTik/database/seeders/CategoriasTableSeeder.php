<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Fritos'],
            ['nombre' => 'Bebida'],
            ['nombre' => 'Comida rápida'],
            ['nombre' => 'Lácteo'],
            ['nombre' => 'Verduras'],
            ['nombre' => 'Frutas']
        ]);
    }
}
