<?php

namespace App\Http\Controllers\Api\ProcessData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function editData(Request $request) {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['string'],
        ]);

        $user = User::where("email", $request->email)->firstOrFail();
        $user->name=$request->name;
        $user->email=$request->email;

        if (!empty($request->password)) {
            $user->password=bcrypt($request->password);
        }

        $user->save();

        return response()->json([
            'message'=> 'Usuario actualizado!',
        ], 201);
    }
}
