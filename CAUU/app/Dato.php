<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    public function mujer() {
        return $this->belongsTo(Mujer::class);
    }
}
