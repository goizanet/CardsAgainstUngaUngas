<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    public function mujer() {
        return $this->hasOne(Mujer::class);
    }
}
