<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\User;
use App\Coleccion;
use App\Jugador;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required',  'string'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        //Jugador y Coleccion
        $coleccion = new Coleccion();
        $coleccion->save();

        $jugador = new Jugador();
        $jugador->usuario_id = $user->id;
        $jugador->coleccion_id = $coleccion->id;
        $jugador->save();

        return response()->json([
            'message'=> 'Usuario creado!',
        ], 201);
    }

    public function login (Request $request)
    {
        Log::debug($request);
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Credenciales incorrectas!'
            ], 401);
        }

        $user = $request->user();

        $tokenManager = $user->createToken('Personal Access Token');

        if ($request->remember_me) {
            $tokenManager->token->expires_at = Carbon::now()->addWeeks(1);
        } else {
            $tokenManager->token->expires_at = Carbon::now()->addHours(3);
        }

        $tokenManager->token->save();

        return response()->json([
            'id' => $user->id,
            'nombre' => $user->name,
            'email' => $user->email,
            'rol' => $user->rol->nombre,
            'access_token' => $tokenManager->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenManager->token->expires_at)->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        Log::debug($request->user());
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Sesion cerrada!'
        ]) ;
    }

    public function user(Request $request) {
        return response()->json($request->user());
    }
}
