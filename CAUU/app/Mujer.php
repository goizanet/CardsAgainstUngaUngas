<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mujer extends Model
{
    protected $table = 'mujeres';

    public function datos() {
        return $this->hasMany(Dato::class);
    }

    public function continente() {
        return $this->belongsTo(Continente::class);
    }

    public function ambito() {
        return $this->belongsTo(Ambito::class);
    }
}
