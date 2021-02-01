<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    public function jugador() {
        return $this->belongsTo(Jugador::class, 'partida_id', 'id');
    }
}
