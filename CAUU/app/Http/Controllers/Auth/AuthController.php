<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    //
    public function register (Request $request) {

        $request->validate([

            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',

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
}
