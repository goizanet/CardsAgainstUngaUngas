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

    public function coleccion() {
        return $this->belongsToMany(Mujer::class, 'coleccion_mujer', 'mujer_id', 'coleccion_id' );
    }

    public function findDatosMujer (int $id = NULL) {
        $unlockedData = [];

        if ($id == NULL) {
            $mujeres = $this->all();

            foreach ($mujeres as $mujer) {
                foreach ($this->datos as $dato) {
                    if ($dato->mujer_id == $mujer->id) {
                        array_push($unlockedData, $dato);
                    }
                }
            }
        }
        else {
            $mujer = $this->findOrFail($id);

            foreach ($this->datos as $dato) {
                if ($dato->mujer_id == $mujer->id) {
                    array_push($unlockedData, $dato);
                }
            }
        }

        return $unlockedData;
    }
}
