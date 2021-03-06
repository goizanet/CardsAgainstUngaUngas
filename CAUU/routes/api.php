<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CollectData\DataInfoController;
use App\Http\Controllers\Api\ProcessData\ProfileController;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'auth'], function () {
    //Rutas sin user
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    //Rutas logueado
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user', [AuthController::class, 'user']);
        Route::get('logout', [AuthController::class, 'logout']);

        Route::group(["prefix" => 'data'], function () {
            Route::get('Coleccion', [DataInfoController::class, 'getCollection']);
            Route::get('Coleccion/mujer', [DataInfoController::class, 'getMujerUnlockedDatos']);
            Route::get('imprimirJuego', [DataInfoController::class, 'imprimirMujeres']);


            //* Juego URLs
            Route::get('Ambitos', [DataInfoController::class, 'listFields']);
            Route::get('gameMujeres', [DataInfoController::class, 'getRandomWomansToPlay']);
            Route::get('gameScore', [DataInfoController::class, 'getGameScores']);
            Route::post('gameScore', [DataInfoController::class, 'updateGameScore']);
        });

        Route::group(["prefix" => 'processData'], function () {
            Route::post('EditProfile', [ProfileController::class, 'editData']);
            Route::post('SendEmail', [EmailController::class, 'sendEmail']);
        });
    });
});
