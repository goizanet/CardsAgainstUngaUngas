<?php

namespace App\Http\Controllers\Api\CollectData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ambito;
use App\Continente;
use App\Dato;
use App\Mujer;
use App\User;
use App\Coleccion;
use App\Jugador;
use Illuminate\Support\Facades\Log;

class DataInfoController extends Controller
{
    public function listFields (Request $request) {
        return response()->json(
            ['ambitos' => Ambito::all()]
        );
    }

    //** Coleccion */

    public function getCollection(Request $request) {
        $mujeres = $request->user()->jugador->coleccion->mujeres;

        return response()->json(
            ['mujeres' => $mujeres,]
        );
    }
}
