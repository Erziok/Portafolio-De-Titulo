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
    Route::resource('course', App\Http\Controllers\Admin\CourseController::class);//admin.course.metodo
    Route::get('/create-sessions/{course_id}', [App\Http\Controllers\Admin\CourseController::class, 'createSessions'])
        ->name('course.create-sessions');
    Route::post('/store-sessions', [App\Http\Controllers\Admin\CourseController::class, 'storeSessions'])
        ->name('course.store-sessions');
    Route::get('/edit-sessions/{course_id}', [App\Http\Controllers\Admin\CourseController::class, 'editSessions'])
        ->name('course.edit-sessions');
    Route::post('/update-sessions', [App\Http\Controllers\Admin\CourseController::class, 'updateSessions'])
        ->name('course.update-sessions');
    Route::post('/get-sessions/{id}', [App\Http\Controllers\Admin\CourseController::class, 'getSessions'])
        ->name('course.get-sessions');


    Route::resource('medicine', App\Http\Controllers\Admin\FarmaciaController::class);
    Route::resource('publication', App\Http\Controllers\Admin\PublicacionController::class);
    Route::resource('service', App\Http\Controllers\Admin\ServicioController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('clinicalProcedure', App\Http\Controllers\Admin\VeterinariaController::class);
    Route::resource('zone', App\Http\Controllers\Admin\ZonaController::class);
    Route::resource('benefit', App\Http\Controllers\Admin\BenefitController::class);

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    //Configuración Web
    Route::get('/web', [App\Http\Controllers\Admin\WebController::class, 'index'])
        ->name('web.index'); 
    Route::post('/web', [App\Http\Controllers\Admin\WebController::class, 'store'])
        ->name('web.index.store'); 
});