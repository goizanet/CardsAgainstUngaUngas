<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\AdminController;
use \App\Http\Controllers\Web\User\UserController;

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
    return redirect()->route('login');
});

Route::group(['prefix'=>'admin'], function () {
    Route::get('login', [AdminController::class, 'getLogin'])->name('login');
    Route::post('login', [AdminController::class, 'doLogin'])->name('doLogin');

    Route::group(['middleware' => ['auth','admin']], function ()
    {
        Route::get('home', [AdminController::class, 'getHome'])->name('home');

        Route::get('listMujeres', [AdminController::class, 'listMujeres'])->name('listMujeres');
        Route::post('addMujer', [AdminController::class, 'addMujer']);
        Route::put('editMujer', [AdminController::class, 'editMujer']);
        Route::delete('deleteMujer', [AdminController::class, 'deleteMujer']);

        Route::get('listDatosMujer', [AdminController::class, 'listDatosMujer']);
        Route::post('addDatoMujer', [AdminController::class, 'addDatoMujer']);
        Route::delete('deleteDatoMujer', [AdminController::class, 'deleteDatoMujer']);

        Route::get('UsersAdmin', [AdminController::class, 'listUsersAdmin'])->name('listUsersAdmin');
        Route::post('addUserAdmin', [AdminController::class, 'addUserAdmin']);
        Route::put('editUserAdmin', [AdminController::class, 'editUserAdmin']);
        Route::delete('deleteUserAdmin', [AdminController::class, 'deleteUserAdmin']);

        Route::get('listAmbitos', [AdminController::class, 'listFields'])->name('listAmbitos');
        Route::post('addAmbito', [AdminController::class, 'addFields']);
        Route::put('editAmbito', [AdminController::class, 'editFields']);
        Route::delete('deleteAmbito', [AdminController::class, 'deleteFields']);


        Route::get('logout', [AdminController::class, 'doLogout'])->name('logout');
    });
});

//Rutas para recuperar la contraseña
Route::get('/forgot-password', [UserController::class, 'getForgotPassword'])->name('password.email');
Route::post('/forgot-password', [UserController::class, 'validateResetPassword'])->middleware('guest')->name('password.reset');

Route::get('reset-password/{token}', [UserController::class, 'getResetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [UserController::class, 'resetPasswordEmail'])->middleware('guest')->name('password.update');

Route::get('/juego', [UserController::class, 'redirectToGame'])->name('juego');

