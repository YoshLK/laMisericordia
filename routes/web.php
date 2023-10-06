<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdultoController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PatologiaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DonadorController;
use App\Http\Controllers\DonacionController;

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

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
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
Route::get('adulto/inactivo', [AdultoController::class, 'inactivo'])->name('adulto.inactivo');
Route::resource('adulto', AdultoController::class);
//referencias
Route::resource('referencia', ReferenciaController::class);
//historial
Route::resource('historial', HistorialController::class);
//patologia
Route::resource('patologia', PatologiaController::class);
Route::post('/eliminar_patologia', [PatologiaController::class, 'eliminar'])->name('eliminar_patologia');
//medicamento
Route::resource('medicamento', MedicamentoController::class);
Route::post('/eliminar_medicamento', [MedicamentoController::class, 'eliminar'])->name('eliminar_medicamento');

//Ruta visualizar detalles
Route::get('/general/adulto_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verAdulto']);
Route::get('/general/personal_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verPersonal']);

//Dashboard rutas
Route::get('/grafica-medicinas', [DashboardController::class,'graficaMedicinas'])->name('grafica-medicinas');
Route::get('/conteo-activos', [DashboardController::class,'conteoActivos'])->name('conteo-activos');
Route::get('dashboard', [DashboardController::class, 'adultosDashboard'])->name('dashboard');


//RUTAS PERSONAL GENERAL PERSONAL
Route::resource('personal', PersonalController::class);
//horarios
Route::resource('horario', HorarioController::class);


//RUTAS DONADOR GENERAL DONADOR
Route::resource('donador', DonadorController::class);
//donacion
Route::resource('donacion', DonacionController::class);


//
// routes/web.php


