<?php

use Illuminate\Support\Facades\Route;

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
//provisional

Route::view('/detalle-publicacion', 'user.detalle-publicacion');

// GET

Route::get('/', [\App\Http\Controllers\User\HomeController::class, 'index'])
    ->name('home');

Route::get('/register', [\App\Http\Controllers\User\RegisterController::class, 'index'])
    ->name('register');

Route::get('/login', [\App\Http\Controllers\User\LoginController::class, 'index'])
    ->name('login');

Route::get('/denuncia', [\App\Http\Controllers\User\DenunciaController::class, 'index'])
    ->name('denuncia');

Route::get('/ordenanza', [\App\Http\Controllers\User\OrdenanzaController::class, 'index'])
    ->name('ordenanza');

Route::get('/veterinaria', [\App\Http\Controllers\User\VeterinariaController::class, 'index'])
    ->name('veterinaria');

Route::get('/farmacia', [\App\Http\Controllers\User\FarmaciaController::class, 'index'])
    ->name('farmacia');

Route::get('/tiendas', [\App\Http\Controllers\User\TiendasController::class, 'index'])
    ->name('tiendas');

Route::get('/mascotas-perdidas', [\App\Http\Controllers\User\PerdidasController::class, 'index'])
    ->name('perdidas');

Route::get('/mascotas-encontradas', [\App\Http\Controllers\User\EncontradasController::class, 'index'])
    ->name('encontradas');

Route::get('/adopcion', [\App\Http\Controllers\User\AdopcionController::class, 'index'])
    ->name('adopcion');

Route::get('/zonas-caninas', [\App\Http\Controllers\User\ZonasController::class, 'index'])
    ->name('zonas-caninas');

Route::get('/crematorio', [\App\Http\Controllers\User\CrematorioController::class, 'index'])
    ->name('crematorio');

Route::get('/curso-adiestramiento', [\App\Http\Controllers\User\CursoController::class, 'index'])
    ->name('curso-adiestramiento');

Route::get('/operativos-veterinarios', [\App\Http\Controllers\User\OperativosController::class, 'index'])
    ->name('operativos-veterinarios');


// POST 

Route::post('/register', [\App\Http\Controllers\User\RegisterController::class, 'registerUser'])
    ->name('register.create');

Route::post('/login', [\App\Http\Controllers\User\LoginController::class, 'loginUser'])
    ->name('login.create');