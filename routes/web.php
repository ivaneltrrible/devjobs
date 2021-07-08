<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\NotificationsController;

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

//Route::get('/', function () {
//    return view('vacantes.index');
//})

Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Agrupar Rutas para que esten protegidas
Route::middleware(['auth', 'verified'])->group(function() {
    //###### Rutas de Vacantes
    Route::get('/vacantes' , [VacanteController::class, 'index'])->name('vacante.index');
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacante.create');
    Route::post('/vacantes/store', [VacanteController::class, 'store'])->name('vacante.store');

    //###### Subir Imagenes
    Route::post('/vacantes/imagen', [VacanteController::class, 'imagen'])->name('vacante.imagen');
    Route::post('/vacantes/borrarimagen', [VacanteController::class, 'borrarimagen'])->name('vacante.borrarimagen');

    //###### Notificaciones para Reclutadores
    Route::get('/notificaciones', NotificationsController::class)->name('notificaciones');
});

//Enviar Datos para una vacante sin necesidad de loguearse
Route::post('/candidatos/store', [CandidatoController::class, 'store'])->name('candidatos.store');

//Rutas para ver vacantes sin necesidad de loguearse
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacante.show');


