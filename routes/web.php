<?php
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Citas\CitaController;
use App\Http\Controllers\PaymentController;
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
//los datos del controlador
Route::get('/dashboard/citas', [CitaController::class, 'index'])->name('dashboard.citas.index');
//Los datos de la cita
Route::get('/dashboard/citas/{id}', [CitaController::class, 'show'])->name('dashboard.citas.show');
//Elimina la cita
Route::delete('/dashboard/citas/{id}', [CitaController::class, 'destroy'])->name('dashboard.citas.destroy');
//Trae las citas
Route::get('/citas', [CitaController::class, 'getCitas']);
//Trea les horas ocupadas
Route::get('/citas/horas-ocupadas', [CitaController::class, 'getHorasOcupadas']);
//Guarda la cita
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');
Route::get('/citas/detalle', [CitaController::class, 'getDetalleCita']); // Nueva ruta para obtener detalles de la cita
Route::get('/citas/detalle-pago/{id}', [CitaController::class, 'getDetalleCitaPago'])->name('citas.detalle-pago');
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

Route::post('/stripe-payment', [PaymentController::class, 'stripePayment']);
Route::post('/paypal-payment', [PaymentController::class, 'payPalPayment'])->name('payment.paypal');
Route::post('/crypto-payment-callback', [PaymentController::class, 'cryptoPaymentCallback'])->name('payment.crypto.callback');
Route::get('/payment-return', [PaymentController::class, 'paymentReturn'])->name('payment.return');

