<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mujer;

class Ambito extends Model
{
    protected $table = 'ambitos';

    public function mujer() {
        return $this->hasOne(Mujer::class);
    }

    public static function getFields () {
        return self::get();
    }
}
