<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'], function () {
    //Login


    Route::group(['middleware' => ['auth','admin']], function ()
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
