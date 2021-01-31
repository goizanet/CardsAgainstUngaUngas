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

        $mujeresDatos = [];

        $userCollection = $request->user()->jugador->coleccion;

        $mujeres = $userCollection->mujeres;

        foreach ($mujeres as $mujer) {
            array_push($mujeresDatos, ["mujer" => $mujer, "datos" => $userCollection->findDatosMujer($mujer->id)] );
        }

        return response()->json([
            'ambitos' => Ambito::all(),
            'cartas' => $mujeresDatos,
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

    //** JUEGO */

    public function getRandomWomansToPlay(Request $request) {
        $mujeres = Mujer::inRandomOrder()->limit(18)->get();
        
        $userCollection = $request->user()->jugador->coleccion->mujeres;

        $datos = array();
        
        foreach ($mujeres as $mujer) {
            foreach ($mujer->datos as $dato) {
                array_push($datos, ['id' => $mujer->id, 'dato' => $dato->dato]);
            }
        }

        return response()->json([
            "mujeres" => $mujeres,
            "datos" => $datos,
            "coleccion" => $userCollection
        ]);
    }
}
