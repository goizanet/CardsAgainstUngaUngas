<?php

namespace App\Http\Controllers\Api\ProcessData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Log;

class ProfileController extends Controller
{
    public function editData(Request $request) {
        Log::debug($request);
        $request->validate([
            'id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => [ 'nullable', 'string'],
        ]);

        $user = User::findOrFail($request->id);
        
        if ($user->email != $request->email) {
            //Comprobar que el email no este en la base de datos
            $countEmail = DB::table('users')
                            ->where('email', $request->email)
                            ->count();

            if ($countEmail > 0) {
                return response()->json([
                    'message'=> 'Ese email no se encuentra disponible',
                ], 400);
            }
        }
                
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password=bcrypt($request->password);
        }

        $user->save();

        return response()->json([
            'message'=> 'Usuario actualizado!',
        ], 201);
    }
}
