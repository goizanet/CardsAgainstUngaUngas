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
use App\Partida;
use Illuminate\Support\Facades\Log;
use DB;

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
        $mujeres = Mujer::inRandomOrder()->limit(45)->get();
        
        $userCollection = $request->user()->jugador->coleccion;

        $datosColection = $userCollection->findDatosMujer();

        $datos = array();
        
        foreach ($mujeres as $mujer) {
            foreach ($mujer->datos as $dato) {
                array_push($datos, ['id' => $mujer->id, 'idDato' => $dato->id , 'dato' => $dato->dato]);
            }
        }

        return response()->json([
            "mujeres" => $mujeres,
            "datos" => $datos,
            "coleccion" => $userCollection->mujeres,
            'datos_coleccion' => $datosColection,
        ]);
    }

    public function updateGameScore(Request $request) {
        $request->validate([
            'gameInfo' => 'required',
        ]);

        $userCollection = $request->user()->jugador->coleccion;

        $partida = new Partida();
            $partida->nivel = $request->gameInfo['level'];
            $partida->puntuacion = $request->gameInfo['score'];
            $partida->jugador_id = $request->user()->jugador->id;
        $partida->save();

        foreach ($request->mujeresDesbloqueadas as $newMujer) {
            DB::table('coleccion_mujer')->insert([
                'coleccion_id' => $userCollection->id,
                'mujer_id' => $newMujer,
            ]);
        }
        
        foreach ($request->datosDesbloqueados as $newDato) {
            DB::table('coleccion_datos')->insert([
                'coleccion_id' => $userCollection->id,
                'dato_id' => $newDato,
            ]);
        }
    }

    public function getGameScores(Request $request) {

        $ranking = Partida::orderBy('puntuacion', 'DESC')->limit(10)->get();

        foreach ($ranking as $partida) {
            $jugador = Jugador::find($partida->jugador_id);
            $partida->jugador =$jugador->user->name;
        }

        return response()->json([
            'partidas' => Partida::where('jugador_id', $request->user()->jugador->id)->orderBy('puntuacion')->limit(10)->get(),
            'ranking' => $ranking,
        ]);
    }

    //* IMPRIMIR
    public function imprimirMujeres() {
        $mujeres = Mujer::all();

        $datos = array();
        
        foreach ($mujeres as $mujer) {
            array_push($datos, ["mujer" => $mujer, "datos" => $mujer->findDatosMujer($mujer->id)] );
        }

        return response()->json([
            'datos' => $datos,
            'ambitos' => Ambito::all(),
        ]);
    }
}
