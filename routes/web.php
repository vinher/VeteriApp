<?php

use Illuminate\Support\Facades\Route;

//Agregando Controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('usuarios.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('usuarios.index');
//Guardar datos del animal
Route::post('/', [App\Http\Controllers\AnimalsController::class, 'guardar'])->name('save');


//Cancelar Servicio Cliente
Route::delete('eliminar/{id}',[App\Http\Controllers\AnimalsController::class, 'delete'] )->name('eliminar');

Route::delete('cancelar/{id}',[App\Http\Controllers\AnimalsController::class, 'borrar'] )->name('cancelar');


//Dar por terminado el servicio
Route::delete('finalizado/{id}',[App\Http\Controllers\HomeController::class, 'delete'] )->name('finalizado');


//Editar Registro
Route::put('/edit/{id}', [App\Http\Controllers\AnimalsController::class, 'editar'])->name('edit');

//Confirma Servicio
Route::post('/acept/{id}', [App\Http\Controllers\AnimalsController::class, 'aceptar'])->name('acept');

//Enviar informacion de confirmacion
Route::post('/send/{id}', [App\Http\Controllers\AnimalsController::class, 'enviar'])->name('send');
