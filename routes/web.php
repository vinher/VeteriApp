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



/*
Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('usuarios.index');





//ver Datos
//Route::get('/view', [App\Http\Controllers\AnimalsController::class, 'viewData']);
//Route::get('/views', [App\Http\Controllers\HomeController::class, 'viewData']);

//Guardar datos
Route::post('/', [App\Http\Controllers\AnimalsController::class, 'guardar'])->name('save');



Route::delete('eliminar/{id}',[App\Http\Controllers\AnimalsController::class, 'delete'] )->name('eliminar');



Route::delete('finalizado/{id}',[App\Http\Controllers\HomeController::class, 'delete'] )->name('finalizado');

Route::put('/edit/{id}', [App\Http\Controllers\AnimalsController::class, 'editar'])->name('edit');



Route::post('/acept/{id}', [App\Http\Controllers\AnimalsController::class, 'aceptar'])->name('acept');




Route::post('/send/{id}', [App\Http\Controllers\AnimalsController::class, 'enviar'])->name('send');



/*

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);

});


*/