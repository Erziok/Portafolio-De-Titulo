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
    Route::put('/update-sessions', [App\Http\Controllers\Admin\CourseController::class, 'updateSessions'])
        ->name('course.update-sessions');
    Route::post('/get-sessions/{id}', [App\Http\Controllers\Admin\CourseController::class, 'getSessions'])
        ->name('course.get-sessions');


    Route::resource('medicine', App\Http\Controllers\Admin\FarmaciaController::class);

    Route::resource('publication', App\Http\Controllers\Admin\PublicacionController::class, ['except' => ['edit', 'update']]);
    Route::get('/publication/edit/{publication}/{animal}', [App\Http\Controllers\Admin\PublicacionController::class, 'edit'])
        ->name('publication.edit');
    Route::put('/publication/update/{publication}/{animal}', [App\Http\Controllers\Admin\PublicacionController::class, 'update'])
        ->name('publication.update');

    Route::resource('service', App\Http\Controllers\Admin\ServicioController::class);
    Route::get('/create-schedules/{service_id}', [App\Http\Controllers\Admin\ServicioController::class, 'createSchedules'])
        ->name('service.create-schedules');
    Route::post('/store-schedules', [App\Http\Controllers\Admin\ServicioController::class, 'storeSchedules'])
        ->name('service.store-schedules');
    Route::get('/edit-schedules/{service_id}', [App\Http\Controllers\Admin\ServicioController::class, 'editSchedules'])
        ->name('service.edit-schedules');
    Route::put('/update-schedule', [App\Http\Controllers\Admin\ServicioController::class, 'updateSchedules'])
        ->name('service.update-schedule');
    Route::post('/get-schedules/{id}', [App\Http\Controllers\Admin\ServicioController::class, 'getSchedules'])
        ->name('service.get-schedules');

    Route::resource('user', App\Http\Controllers\Admin\UserController::class);

    Route::resource('clinicalProcedure', App\Http\Controllers\Admin\VeterinariaController::class);

    Route::resource('canineArea', \App\Http\Controllers\Admin\CanineAreas::class);

    Route::resource('benefit', App\Http\Controllers\Admin\BenefitController::class);

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    //Configuración Web
    Route::get('/web', [App\Http\Controllers\Admin\WebController::class, 'index'])
        ->name('web.index'); 

    Route::post('/web', [App\Http\Controllers\Admin\WebController::class, 'store'])
        ->name('web.index.store'); 

    //asociaciones
    Route::get('/associations/requests', [\App\Http\Controllers\Admin\AssociationController::class, 'index'])
        ->name('association.index');
    Route::get('/associations/requests/approve/{service}/{user}', [\App\Http\Controllers\Admin\AssociationController::class, 'approveRequest'])
        ->name('association.approve');
    Route::get('/associations/requests/deny/{service}', [\App\Http\Controllers\Admin\AssociationController::class, 'denyRequest'])
        ->name('association.deny');
    Route::get('/associations/requests/{id}', [\App\Http\Controllers\Admin\AssociationController::class, 'getRequests'])
        ->name('association.getRequests');
});