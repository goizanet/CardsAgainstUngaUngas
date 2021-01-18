<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    protected $table = 'colecciones';

    public function jugador() {
        return $this->belongsTo(Jugador::class, 'coleccion_id', 'id');
    }

    public function mujeres() {
        return $this->belongsToMany(Mujer::class, 'coleccion_mujer', 'coleccion_id', 'mujer_id');
    }
}
