<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('almacens')->insert([
            ['nombre' => 'Arinaga'],
            ['nombre' => 'Pozo Izquierdo'],
            ['nombre' => 'Maspalomas'],
            ['nombre' => 'Arguineguín'],
            ['nombre' => 'Vecindario'],
            ['nombre' => 'Telde'],
            ['nombre' => 'Las Palmas'],
            ['nombre' => 'Agaete'],
            ['nombre' => 'Gáldar'],
            ['nombre' => 'Arucas'],
            ['nombre' => 'Teror'],
            ['nombre' => 'Santa Brígida'],
            ['nombre' => 'San Mateo'],
            ['nombre' => 'Ingenio'],
            ['nombre' => 'Agüimes'],
            ['nombre' => 'Valsequillo'],
            ['nombre' => 'Tejeda'],
            ['nombre' => 'Santa Lucía'],
            ['nombre' => 'San Bartolomé de Tirajana'],
            ['nombre' => 'Teguise'],
        ]);
    }
}
