<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required',  'string'],
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

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
            'rol' => $user->rol->nombre,
             'access_token' => $tokenManager->accessToken
            ,'token_type' => 'Bearer'
            ,'expires_at' => Carbon::parse($tokenManager->token->expires_at)->toDateTimeString()
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
