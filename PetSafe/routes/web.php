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

Route::get('/publicaciones', [\App\Http\Controllers\User\PublicacionController::class, 'index'])
    ->name('publicaciones');
    
Route::get('/detalle-publicacion/{id}', [\App\Http\Controllers\User\DetallePublicacionController::class, 'index'])
    ->name('detalle');

Route::get('/zonas-caninas', [\App\Http\Controllers\User\ZonasController::class, 'index'])
    ->name('zonas-caninas');

Route::get('/crematorio', [\App\Http\Controllers\User\CrematorioController::class, 'index'])
    ->name('crematorio');

Route::get('/curso-adiestramiento', [\App\Http\Controllers\User\CursoController::class, 'index'])
    ->name('curso-adiestramiento');

Route::get('/operativos-veterinarios', [\App\Http\Controllers\User\OperativosController::class, 'index'])
    ->name('operativos-veterinarios');

// Routes that need authentication
Route::group(['middleware'=>'auth'] , function(){
    Route::get('/formulario-mascota', [\App\Http\Controllers\User\FormularioMascotaController::class, 'index'])
    ->name('formulario-mascota');

    Route::get('/formulario-mascota/{id}', [\App\Http\Controllers\User\FormularioMascotaController::class, 'getBreeds']);

    Route::get('/formulario-servicio', [\App\Http\Controllers\User\FormularioServicioController::class, 'index'])
    ->name('formulario-servicio');


    Route::get('/editar-usuario', [\App\Http\Controllers\User\EditarUsuarioController::class, 'index'])
    ->name('editar-usuario');

    Route::get('/cambiar-contraseña', [\App\Http\Controllers\User\CambiarContraseñaController::class, 'index'])
    ->name('cambiar-contraseña');

    Route::post('/formulario-mascota', [\App\Http\Controllers\User\FormularioMascotaController::class, 'registerPet'])
    ->name('formulario-mascota.create');

    Route::post('/formulario-servicio', [\App\Http\Controllers\User\FormularioServicioController::class, 'registerService'])
        ->name('formulario-servicio.create');

    Route::get('/logout', [\App\Http\Controllers\User\LogoutController::class, 'logoutUser'])
    ->name('logout');

    Route::post('/formulario-comentario/{object}', [\App\Http\Controllers\User\DetallePublicacionController::class, 'storeComment'])
    ->name('detalle.comentar');

    Route::post('/formulario-responder/{object}/{comment}', [\App\Http\Controllers\User\DetallePublicacionController::class, 'storeReply'])
        ->name('detalle.responder');

    Route::post('/agregar-favorito/{id}', [\App\Http\Controllers\User\PublicacionController::class, 'favourite'])
        ->name('favourite');
    
    Route::post('/quitar-favorito/{id}', [\App\Http\Controllers\User\PublicacionController::class, 'noFavourite'])
        ->name('noFavourite');
    /*Validacion de que no se pongan a jugar con las ruta comment y para evitar el error "This route not suppor method GET"*/
    Route::get('/formulario-responder/{object}/{comment}', function () {
        return redirect()->route('home');
    });
    Route::get('/formulario-comentario/{object}', function () {
        return redirect()->route('home');
    });
    /*Fin Validación*/
});

Route::get('/search', [\App\Http\Controllers\User\PublicacionController::class, 'search'])
    ->name('search');

Route::get('/category', [\App\Http\Controllers\User\PublicacionController::class, 'filter'])
    ->name('filter');
// PUT
Route::put('/editar-usuario', [\App\Http\Controllers\User\EditarUsuarioController::class, 'updateUser'])
    ->name('editar-usuario.update');

Route::put('/cambiar-contraseña', [\App\Http\Controllers\User\CambiarContraseñaController::class, 'changePassword'])
    ->name('cambiar-contraseña.update');

// POST 
Route::post('/register', [\App\Http\Controllers\User\RegisterController::class, 'registerUser'])
    ->name('register.create');

Route::post('/login', [\App\Http\Controllers\User\LoginController::class, 'loginUser'])
    ->name('login.create');

