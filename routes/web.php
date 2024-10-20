<?php
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ServicioController;
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

// Rutas para promociones
Route::get('dashboard/promociones', [PromocionController::class, 'index'])->name('promociones');
Route::get('dashboard/promociones/crear', function () {
    return view('dashboard.promociones.create');
})->name('crear_promocion');
Route::post('dashboard/promociones', [PromocionController::class, 'store'])->name('promociones.store');
Route::get('/servicios/search', [ServicioController::class, 'search'])->name('servicios.search');
Route::get('dashboard/promociones/{id}/editar', [PromocionController::class, 'edit'])->name('promociones.edit');
Route::put('dashboard/promociones/{id}', [PromocionController::class, 'update'])->name('promociones.update');
Route::delete('dashboard/promociones/{id}', [PromocionController::class, 'destroy'])->name('promociones.destroy');
Route::get('dashboard/promociones/{id}', [PromocionController::class, 'show'])->name('promociones.show');



