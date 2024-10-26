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
use App\Http\Controllers\UsuarioController;

// Aquí van las rutas existentes que ya tienes
// Por ejemplo, si tienes una ruta de inicio o autenticación
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación si usas Laravel Breeze
require __DIR__.'/auth.php';

// Rutas para las entidades adicionales
Route::middleware(['auth'])->group(function () {
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
    Route::resource('usuarios', UsuarioController::class);
});
