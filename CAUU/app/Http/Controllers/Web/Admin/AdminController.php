<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ambito;
use App\Continente;
use App\Dato;
use App\Mujer;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getLogin(Request $request)
    {
        if ($request->user()){
           return redirect()->route('home');
        }

        return view('Admin.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withInput();
        }

        return redirect()->route('home');
    }

    public function doLogout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getHome () {
        return view('Admin.Home');
    }

    public function test(Request $request) {
        return 'Eres admin';
    }

    public function listMujeres (Request $request)
    {
        return response()->json([
            'mujeres' => Mujer::all()
        ]);
    }

    public function addMujer (Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', ] ,
            'apellido' => ['nullable', 'string', ] ,
            'fecha_nacimiento' => ['required', 'date'] ,
            'fecha_muerte' => ['nullable', 'date'] ,
            'lore_es' => ['required', 'string', ] ,
            'lore_en' => ['nullable', 'string', ] ,
            'lore_eus' => ['nullable', 'string', ] ,
            'zona_geografica' => ['required', 'string',] ,
            'ambito_id' => ['required', 'numeric'] ,
            'continente_id' => ['required', 'numeric'] ,
            'foto' => ['nullable', 'string',] ,
        ]);

        $mujer = new Mujer();

        $mujer->nombre = $request->nombre;
        $mujer->apellido = $request->apellido;
        $mujer->fecha_nacimiento = $request->fecha_nacimiento;
        $mujer->fecha_muerte = $request->fecha_muerte;
        $mujer->lore_es = $request->lore_es;
        $mujer->lore_en = $request->lore_en;
        $mujer->lore_eus = $request->lore_eus;
        $mujer->zona_geografica = $request->zona_geografica;
        $mujer->ambito_id = $request->ambito_id;
        $mujer->continente_id = $request->continente_id;
        $mujer->foto = $request->continente_id;

        $mujer->save();

        return response()->json([
            'id' => $mujer->id,
            'message'=> 'Los datos se añadieron con exito!',
        ], 201);
    }

    public function deleteMujer (Request $request)
    {
        $request->validate([
            'mujer_id' => ['required', 'numeric']
        ]);

        $mujer = Mujer::findOrFail($request->mujer_id);

        $mujer->delete();

        return response()->json([
            'deleted'=> 1,
        ]);
    }

    public function listDatosMujer (Request $request)
    {
        $request->validate([
            'mujer_id' => ['required', 'numeric'],
        ]);

        $mujer = Mujer::findOrFail($request->mujer_id);

        return response()->json([
            'datos' => $mujer->datos
        ]);
    }

    public function addDatoMujer (Request $request)
    {
        $request->validate([
            'mujer_id' => ['required', 'numeric'],
            'dato' => ['required', 'string']
        ]);

        $mujer = Mujer::findOrFail($request->mujer_id);

        $dato = new Dato();

        $dato->mujer_id = $mujer->id;
        $dato->dato = $request->dato;

        $dato->save();

        return response()->json([
            'id' => $dato->id,
            'message'=> 'Los datos se añadieron con exito!',
        ], 201);
    }

    public function deleteDatoMujer (Request $request)
    {
        $request->validate([
            'dato_id' => ['required', 'numeric']
        ]);

        $dato = Dato::findOrFail($request->dato_id);
        $dato->delete();

        return response()->json([
            'deleted'=> 1,
        ]);
    }

    public function listUsersAdmin (Request $request)
    {
        $data = [
            'users' => User::getAdmins(),
        ];

        return view('Admin.Usuarios', $data);
    }

    public function addUserAdmin (Request $request)
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
        $user->rol_id = 1;
        $user->save();

        return response()->json([
            'message'=> 'Usuario administrador creado!',
        ], 201);
    }

    public function editUserAdmin (Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required',  'string'],
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'message'=> 'Usuario administrador actualizado!',
        ], 201);
    }

    public function deleteUserAdmin (Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        $user->delete();

        return response()->json([
            'deleted'=> 1,
        ]);
    }
}