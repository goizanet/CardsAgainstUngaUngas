<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmbitoContinenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //AMBITOS
        DB::table('ambitos')->insert([
            'nombre' => 'Antropología'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Sociología'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Geografía'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Historia'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Derecho'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Ciencias políticas'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Economía'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Pedagogía'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Psicología'
        ]);

        DB::table('ambitos')->insert([
            'nombre' => 'Filosofía'
        ]);

        DB::table('ambitos')->insert([
            'id' => 99,
            'nombre' => 'Indefinido'
        ]);

        //CONTINENTES
        DB::table('continentes')->insert([
            'nombre' => 'Europa'
        ]);

        DB::table('continentes')->insert([
            'nombre' => 'Asia'
        ]);

        DB::table('continentes')->insert([
            'nombre' => 'Africa'
        ]);

        DB::table('continentes')->insert([
            'nombre' => 'America'
        ]);

        DB::table('continentes')->insert([
            'nombre' => 'Oceania'
        ]);
    }
}
