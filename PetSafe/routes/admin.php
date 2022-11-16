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
    Route::resource('web', App\Http\Controllers\Admin\WebController::class);//admin.web.metodo
    Route::resource('course', App\Http\Controllers\Admin\CourseController::class);//admin.course.metodo
    Route::resource('medicine', App\Http\Controllers\Admin\FarmaciaController::class);
    Route::resource('publication', App\Http\Controllers\Admin\PublicacionController::class);
    Route::resource('service', App\Http\Controllers\Admin\ServicioController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('veterinary', App\Http\Controllers\Admin\VeterinariaController::class);
    Route::resource('zone', App\Http\Controllers\Admin\ZonaController::class);
    Route::resource('benefit', App\Http\Controllers\Admin\BenefitController::class);

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
});