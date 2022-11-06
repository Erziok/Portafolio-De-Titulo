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
});