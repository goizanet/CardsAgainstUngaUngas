<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
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

Route::get('/test', function () {
    return "patata";
});

Route::group(['prefix'=>'auth'], function () {
    //Rutas sin user
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    //Rutas logueado
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user', [AuthController::class, 'user']);
        Route::get('logout', [AuthController::class, 'logout']);
    });


});

Route::group(['prefix'=>'admin'], function () {
    Route::group(['middleware' => ['auth:api','admin']], function ()
    {
        Route::get('test', [AdminController::class, 'test']);

        Route::get('listMujeres', [AdminController::class, 'listMujeres']);
        Route::post('addMujer', [AdminController::class, 'addMujer']);
        Route::delete('deleteMujer', [AdminController::class, 'deleteMujer']);

        Route::get('listDatosMujer', [AdminController::class, 'listDatosMujer']);
        Route::post('addDatoMujer', [AdminController::class, 'addDatoMujer']);
        Route::delete('deleteDatoMujer', [AdminController::class, 'deleteDatoMujer']);

        Route::get('listUsersAdmin', [AdminController::class, 'listUsersAdmin']);
        Route::post('addUserAdmin', [AdminController::class, 'addUserAdmin']);
        Route::delete('deleteUserAdmin', [AdminController::class, 'deleteUserAdmin']);
    });
});
