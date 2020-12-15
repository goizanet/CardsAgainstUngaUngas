<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablasDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ambitos'))
        {
            Schema::create('ambitos', function (Blueprint $table) {
                $table->id();
                $table->string("nombre");
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('continentes'))
        {
            Schema::create('continentes', function (Blueprint $table) {
                $table->id();
                $table->string("nombre");
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('mujeres'))
        {
            Schema::create('mujeres', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('apellido');
                $table->longText('lore_es');
                $table->longText('lore_eus');
                $table->longText('lore_en');
                $table->string('zona_geografica');
                //
                $table->unsignedBigInteger('ambito_id');
                $table->foreign('ambito_id')->references('id')->on('ambitos')->onDelete('cascade');
                //
                $table->unsignedBigInteger('continente_id');
                $table->foreign('continente_id')->references('id')->on('continentes')->onDelete('cascade');
                //
                $table->date('fecha_nacimiento');
                $table->date('fecha_muerte');
                $table->binary('foto');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('colecciones'))
        {
            Schema::create('colecciones', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('jugadores'))
        {
            Schema::create('jugadores', function (Blueprint $table) {
                $table->id();
                //
                $table->unsignedBigInteger('usuario_id');
                $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
                //
                $table->unsignedBigInteger('coleccion_id');
                $table->foreign('coleccion_id')->references('id')->on('colecciones')->onDelete('cascade');
                //
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('datos'))
        {
            Schema::create('datos', function (Blueprint $table) {
                $table->id();
                //
                $table->unsignedBigInteger('mujer_id');
                $table->foreign('mujer_id')->references('id')->on('mujeres')->onDelete('cascade');
                //
                $table->string("dato");
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('coleccion_mujer'))
        {
            Schema::create('coleccion_mujer', function (Blueprint $table) {
                $table->id();
                //
                $table->unsignedBigInteger('coleccion_id');
                $table->foreign('coleccion_id')->references('id')->on('colecciones')->onDelete('cascade');
                //
                $table->unsignedBigInteger('mujer_id');
                $table->foreign('mujer_id')->references('id')->on('mujeres')->onDelete('cascade');
                //
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('coleccion_mujer_datos'))
        {
            Schema::create('coleccion_mujer_datos', function (Blueprint $table) {
                $table->id();
                //
                $table->unsignedBigInteger('coleccion_mujer_id');
                $table->foreign('coleccion_mujer_id')->references('id')->on('coleccion_mujer')->onDelete('cascade');
                //
                $table->unsignedBigInteger('dato_id');
                $table->foreign('dato_id')->references('id')->on('datos')->onDelete('cascade');
                //
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coleccion_mujer_datos');
        Schema::dropIfExists('coleccion_mujer');
        Schema::dropIfExists('partida_mujer');
        Schema::dropIfExists('partida_dato');
        Schema::dropIfExists('partidas');
        Schema::dropIfExists('jugadores');
        Schema::dropIfExists('datos');
        Schema::dropIfExists('colecciones');
        Schema::dropIfExists('mujeres');
        Schema::dropIfExists('continentes');
        Schema::dropIfExists('ambitos');
    }
}
