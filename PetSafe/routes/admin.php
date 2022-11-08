<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'validateAdmin', 'prefix' => '/admin', 'as' => 'admin.'], function() {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])
        ->name('home'); 
    Route::resource('web', App\Http\Controllers\Admin\WebController::class);
    Route::resource('curso', App\Http\Controllers\Admin\CursoController::class);
    Route::resource('farmacia', App\Http\Controllers\Admin\FarmaciaController::class);
    Route::resource('publicacion', App\Http\Controllers\Admin\PublicacionController::class);
    Route::resource('servicio', App\Http\Controllers\Admin\ServicioController::class);
    Route::resource('usuario', App\Http\Controllers\Admin\UserController::class);
    Route::resource('veterinaria', App\Http\Controllers\Admin\VeterinariaController::class);
    Route::resource('zona', App\Http\Controllers\Admin\ZonaController::class);

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
});