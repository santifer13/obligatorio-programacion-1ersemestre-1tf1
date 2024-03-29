<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\PostController;



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

Route::get('/registro', function () {
    return view('registro');
});
Route::get('/login', function () {
    return view('logeo');
});
Route::get('/crear', function () {
    return view('crearpost');
});

Route::get('/', [PostController::class, 'Paginar']);
Route::get('/inicio', [PostController::class, 'Paginar']);
Route::get('/mostrar', [PostController::class, 'MisPosts']);
Route::get('/modificar/{id}', [PostController::class, 'VerDatosModificar']);
Route::get('/eliminar/{id}', [PostController::class, 'Eliminar']);
Route::get('/logout',[AutoresController::class, 'CerrarSesion']);
Route::get('/mes/{mes}',[PostController::class, 'MostrarDatosMes']);

Route::post('/registro', [AutoresController::class, 'Registrarse']);
Route::post('/login', [AutoresController::class, 'Logearse']);
Route::post('/crear', [PostController::class, 'Postear']);
Route::post('/modificar/{id}', [PostController::class, 'Modificar']);