<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    protected $table = 'continentes';

    public function mujer() {
        return $this->hasOne(Mujer::class);
    }

    public function getContinents(){
        return self::get();
    }
}
