<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    public function mujer() {
        return $this->belongsTo(Mujer::class);
    }

    public function coleccion() {
        return $this->belongsToMany(Coleccion::class, 'coleccion_datos', 'dato_id', 'coleccion_id');
    }
}
