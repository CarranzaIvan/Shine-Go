<?php
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Citas\CitaController;
use App\Models\Servicio;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Rutas de servicio
Route::get('/servicios',[ServicioController::class, 'verServicios'])->name('servicios'); // Ver servicios
Route::get('/servicios/gestion',[ServicioController::class, 'gestionServicios'])->name('gestionervicios'); // Ver servicios a gestionar
Route::post('/servicios/gestion/guardar',[ServicioController::class, 'guardarServicio'])->name('guardarServicio');
Route::put('//servicios/gestion/{idServicio}/actualizar',[ServicioController::class, 'actualizarServicio'])->name('actualizarServicio');
Route::delete('/servicios/gestion/{idServicio}/eliminar',[ServicioController::class, 'eliminarServicio'])->name('eliminarServicio'); // Eliminar servicios

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
//Trae las citas
Route::get('/citas', [CitaController::class, 'getCitas']);
//Trea les horas ocupadas
Route::get('/citas/horas-ocupadas', [CitaController::class, 'getHorasOcupadas']);
//Guarda la cita
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');
Route::get('/citas/detalle', [CitaController::class, 'getDetalleCita']); // Nueva ruta para obtener detalles de la cita
Route::delete('/citas/eliminar', [CitaController::class, 'deleteCita'])->name('citas.eliminar'); // Nueva ruta para eliminar la cita
Route::get('/registrar-cita', [ServicioController::class, 'showRegistrarCita'])->name('registrar_cita');

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

