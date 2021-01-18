<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MujeresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mujeres')->insert([
            'nombre' => 'Test',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 1,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);
    }
}
