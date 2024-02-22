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
            ['nombre' => 'Frutas'],
            ['nombre' => 'Panadería'],
            ['nombre' => 'Carnes'],
            ['nombre' => 'Pescados'],
            ['nombre' => 'Congelados'],
            ['nombre' => 'Pastas'],
            ['nombre' => 'Salsas'],
            ['nombre' => 'Bebidas alcohólicas'],
            ['nombre' => 'Postres'],
            ['nombre' => 'Snacks'],
            ['nombre' => 'Cereales'],
            ['nombre' => 'Condimentos'],
            ['nombre' => 'Aceites y vinagres'],
            ['nombre' => 'Huevos'],
            ['nombre' => 'Productos orgánicos'],
        ]);
    }
}
