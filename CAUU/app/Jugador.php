<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';

    public function user() {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function coleccion() {
        return $this->belongsTo(Coleccion::class,'coleccion_id', 'id');
    }

    public function partidas() {
        return $this->hasOne(Partida::class, 'jugador_id');
    }
}
