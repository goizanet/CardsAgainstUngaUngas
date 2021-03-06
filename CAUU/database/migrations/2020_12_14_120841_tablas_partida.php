<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablasPartida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hastable('partidas')) {
            Schema::create('partidas', function (Blueprint $table) {
                $table->id();
                //
                $table->tinyInteger('nivel');
                $table->integer('puntuacion');
                //
                $table->unsignedBigInteger('jugador_id');
                $table->foreign('jugador_id')->references('id')->on('jugadores')->onDelete('cascade');
                //
                $table->timestamps();
            });
        }

        if (!Schema::hastable('partida_dato')) {
            Schema::create('partida_dato', function(Blueprint $table){
                $table->unsignedBigInteger('partida_id');
                $table->foreign('partida_id')->references('id')->on('partidas')->onDelete('cascade');

                $table->unsignedBigInteger('dato_id');
                $table->foreign('dato_id')->references('id')->on('datos')->onDelete('cascade');
            });
        }

        if (!Schema::hastable('partida_mujer')) {
            Schema::create('partida_mujer', function(Blueprint $table){
                $table->boolean('en_partida');

                $table->unsignedBigInteger('partida_id');
                $table->foreign('partida_id')->references('id')->on('partidas')->onDelete('cascade');

                $table->unsignedBigInteger('mujer_id');
                $table->foreign('mujer_id')->references('id')->on('mujeres')->onDelete('cascade');
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
    }
}
