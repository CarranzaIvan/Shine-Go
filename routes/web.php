<?php

use Illuminate\Support\Facades\Route;

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

