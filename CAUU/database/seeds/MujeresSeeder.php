<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        DB::table('mujeres')->insert([
            'nombre' => 'Test 2',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 2,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 3',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 3,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 4',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 4,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 5',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 5,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 6',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 6,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 7',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 7,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 8',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 8,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 9',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 1,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 10',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 2,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 11',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 3,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 12',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 4,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 13',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 5,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 14',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 6,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 15',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 7,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 16',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 8,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);

        DB::table('mujeres')->insert([
            'nombre' => 'Test 17',
            'lore_es' => 'Testing woman data',
            'zona_geografica' => 'Earth',
            'ambito_id' => 9,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::now(),
        ]);
    }
}
