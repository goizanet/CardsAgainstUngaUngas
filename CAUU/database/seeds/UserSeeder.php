<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@desayunosfeministas.com',
            'rol_id' => 1,
            'password' => bcrypt('AdminDesayuno')
        ]);

        DB::table('users')->insert([
            'name' => 'a',
            'email' => 'a@a.com',
            'rol_id' => 2,
            'password' => bcrypt('2dw3')
        ]);

        DB::table('colecciones')->insert([
            'id' => 1
        ]);

        DB::table('jugadores')->insert([
            'usuario_id' => 2,
            'coleccion_id' => 1
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 1
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 2
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 3
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 4
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 5
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 6
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 7
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 8
        ]);

        DB::table('coleccion_mujer')->insert([
            'coleccion_id' => 1,
            'mujer_id' => 9
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 1
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 2
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 3
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 4
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 5
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 6
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 7
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 8
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 9
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 10
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 11
        ]);

        DB::table('coleccion_datos')->insert([
            'coleccion_id' => 1,
            'dato_id' => 12
        ]);
    }
}
