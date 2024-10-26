<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\PoliticaController;
use App\Http\Controllers\PQRSController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController; // Cambié de 'UsuarioController' a 'UserController'
use App\Http\Controllers\ProfileController;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Ruta de dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Rutas de perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Dispositivos
    Route::resource('dispositivos', DispositivoController::class);

    // Rutas para Envíos
    Route::resource('envios', EnvioController::class);

    // Rutas para Facturas
    Route::resource('facturas', FacturaController::class);

    // Rutas para Licencias
    Route::resource('licencias', LicenciaController::class);

    // Rutas para Mantenimientos
    Route::resource('mantenimientos', MantenimientoController::class);

    // Rutas para Políticas
    Route::resource('politicas', PoliticaController::class);

    // Rutas para PQRS
    Route::resource('pqrs', PQRSController::class);

    // Rutas para Reportes
    Route::resource('reportes', ReporteController::class);

    // Rutas para Usuarios
    Route::resource('usuarios', UserController::class); // Aquí se utilizó UserController
});

// Rutas de autenticación
require __DIR__.'/auth.php';
