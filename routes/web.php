<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Citas\CitaController;
// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Rutas para los servicios
Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

// Ruta para el dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// Rutas para citas
Route::get('/registrar-cita', function () {
    return view('registrar_cita');
})->name('registrar_cita');

Route::get('dashboard/citas', function () {
    return view('dashboard.citas.index');
})->name('citas');

// Trae los datos de las citas
Route::get('/citas', [CitaController::class, 'getCitas']);
//Trea les horas ocupadas
Route::get('/citas/horas-ocupadas', [CitaController::class, 'getHorasOcupadas']);
//Guarda la cita
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');
Route::get('/citas/detalle', [CitaController::class, 'getDetalleCita']); // Nueva ruta para obtener detalles de la cita
Route::post('/citas/eliminar', [CitaController::class, 'deleteCita']); // Nueva ruta para eliminar la cita
