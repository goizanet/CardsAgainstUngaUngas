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

    public function datos() {
        return $this->belongsToMany(Dato::class, 'coleccion_datos', 'coleccion_id', 'dato_id');
    }

    public function findDatosMujer (int $id = NULL) {
        $unlockedData = [];

        if ($id == NULL) {
            $mujeres = $this->mujeres;

            foreach ($mujeres as $mujer) {
                foreach ($this->datos as $dato) {
                    if ($dato->mujer_id == $mujer->id) {
                        array_push($unlockedData, $dato);
                    }
                }
            }
        }
        else {
            $mujer = $this->mujeres()->where('mujer_id',$id)->firstOrFail();

            foreach ($this->datos as $dato) {
                if ($dato->mujer_id == $mujer->id) {
                    array_push($unlockedData, $dato);
                }
            }
        }

        return $unlockedData;
    }
}
