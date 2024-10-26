<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\PoliticaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('dispositivos', DispositivoController::class);
    Route::resource('licencias', LicenciaController::class);
    Route::resource('pqrs', PqrsController::class);
    Route::resource('reportes', ReporteController::class);
    Route::resource('mantenimiento', MantenimientoController::class);
    Route::resource('politicas', PoliticaController::class);
    Route::resource('facturas', FacturaController::class);
    Route::resource('envios', EnvioController::class);
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
