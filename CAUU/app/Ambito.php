<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mujer;

class Ambito extends Model
{
    public function mujer() {
        return $this->hasOne(Mujer::class);
    }
}
