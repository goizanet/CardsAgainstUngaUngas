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

        return response()->json([
            'ambitos' => Ambito::all(),
            'mujeres' => $mujeres,
            'total' => Mujer::all()->count()
        ]);
    }

    public function getMujerUnlockedDatos(Request $request) {
        $request->validate([
            'id' => ['required', 'numeric']
        ]);

        $userCollection = $request->user()->jugador->coleccion;

        $mujer = $userCollection->mujeres()->where('mujer_id',$request->id)->firstOrFail();

        $datos = $userCollection->findDatosMujer($mujer->id);

        return response()->json([
            'datos' => $datos,
            'totalDatos' => $mujer->datos()->count()
        ]);
    }
}
