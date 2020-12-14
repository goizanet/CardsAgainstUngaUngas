<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/test', function (Request $request) {
    return "patata";
});

//Rutas user logueado
Route::group(['prefix'=>'auth'], function () {
    //Rutas logueado
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    //Rutas sin user
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user', [AuthController::class, 'user']);
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
