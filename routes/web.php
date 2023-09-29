<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdultoController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PatologiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//RUTAS ADULTOS MAYORES
/*
Route::get('/adulto', function () {
    return view('adulto.index');
});

Route::get('/adulto/create',[AdultoController::class,'create']);
*/

//RUTA GENERAL DE ADULTOS
Route::resource('adulto', AdultoController::class);
//RUTA GENERAL DE REFERENCIAS
Route::resource('referencia', ReferenciaController::class);
//RUTA GENERAL DE Historial
Route::resource('historial', HistorialController::class);
//RUTA GENERAL DE Historial
Route::resource('patologia', PatologiaController::class);
//Ruta eliminar patologia
Route::post('/eliminar_patologia', [PatologiaController::class, 'eliminar'])->name('eliminar_patologia');
//RUTA GENERAL DE ADULTOS
//Route::resource('general', GeneralController::class);

Route::get('/general/adulto_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verReferencias']);
Route::get('/general/adulto_detalle/',[App\Http\Controllers\GeneralController::class, 'verPatologias']);

//
// routes/web.php


