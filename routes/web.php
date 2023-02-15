<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'], function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
   echo Artisan::call('permission:cache-reset');
})->name('home');

Route::get('mes/{id_mes}', [App\Http\Controllers\HomeController::class, 'ObtenerResultado']);

//Ruta del Controlador de Pagos

Route::post('single-charge', [App\Http\Controllers\HomeController::class, 'singleCharge'])->name('single.charge');

Route::get('datos', [App\Http\Controllers\HomeController::class, 'datos'])->name('datos');


Route::post('single-charge2', [App\Http\Controllers\PagosController::class, 'singleCharge'])->name('single.charge2');

Route::get('/vender', [App\Http\Controllers\PagosController::class, 'index'])->name('vender');

Route::post('single-charge-paypal', [App\Http\Controllers\PagosController::class, 'store'])->name('single.charge.store');


Route::post('charge',[App\Http\Controllers\PagosController::class, 'charge']);


Route::post('/process_payment',[App\Http\Controllers\PagosController::class, 'chargeMP']);




//Route::get('paymentsuccess', [App\Http\Controllers\PagosController::class, 'payment_success']);
//Route::get('paymenterror', [App\Http\Controllers\PagosController::class, 'payment_error']);


// Rutas para el controlador de registro de usuarios

Route::get('/usuarios',[App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('usuarios');

Route::get('/usuario/nuevo',[App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('usuario.store');

Route::get('/usuarionuevo',[App\Http\Controllers\Auth\RegisterController::class, 'register2'])->name('nuevo.usuario');

Route::get('/usuario/{user}/editar',[App\Http\Controllers\Auth\RegisterController::class, 'edit'])->name('editar.usuario');

Route::get('/usuario/{user}',[App\Http\Controllers\Auth\RegisterController::class, 'destroy'])->name('borrar.usuario');

Route::get('/usuarioup/{user}',[App\Http\Controllers\Auth\RegisterController::class, 'update'])->name('usuario.update');

Route::get('/usuarioin/{user}',[App\Http\Controllers\Auth\RegisterController::class, 'inactivar'])->name('usuario.inactivar');

Route::patch('cuentas/usuarios/{user}/image',[App\Http\Controllers\Auth\RegisterController::class, 'imagen'])->name('cuentas.imagen.index');

Route::get('/changepassword',[App\Http\Controllers\Auth\RegisterController::class, 'password']);



// Rutas para el controlador de tienda

Route::get('/tiendas',[App\Http\Controllers\TiendasController::class, 'index'])->name('tiendas');

Route::get('/tiendas/nuevo',[App\Http\Controllers\TiendasController::class, 'create'])
    ->name('tiendas.create');

Route::get('/registerstore',[App\Http\Controllers\TiendasController::class, 'register'])
    ->name('tiendas.register');

Route::get('/registersolicitud',[App\Http\Controllers\TiendasController::class, 'solicitud'])
    ->name('cuentas.solicitud');

Route::get('/tiendas/{tiendas}/editar',[App\Http\Controllers\TiendasController::class, 'edit'])
    ->name('tiendas.edit');

Route::get('/tiendasup/{tiendas}',[App\Http\Controllers\TiendasController::class, 'update'])
    ->name('tiendas.update');

Route::get('/cuentas/{cuentas}/editar',[App\Http\Controllers\TiendasController::class, 'cuentasedit'])
    ->name('cuentas.edit');

Route::get('/cuentasup/{cuentas}',[App\Http\Controllers\TiendasController::class, 'cuentasupdate'])
    ->name('cuentas.update');


 Route::get('/cuentas/nuevo',[App\Http\Controllers\TiendasController::class, 'cuentas_create'])
    ->name('cuentas.create');

Route::get('/registercuentas',[App\Http\Controllers\TiendasController::class, 'cuentas_register'])
    ->name('cuentas.register');

//Rutas del Controlador de Otros

Route::get('/contacto',[App\Http\Controllers\OtrosController::class, 'contacto'])->name('contacto');

Route::get('/fqa',[App\Http\Controllers\OtrosController::class, 'fqa'])->name('fqa');

Route::get('/contacto/nuevo',[App\Http\Controllers\OtrosController::class, 'contacto_nuevo'])->name('contacto.nuevo');

 //Rutas del Controlador de cajas

Route::get('/cajas',[App\Http\Controllers\CajasController::class, 'index'])->name('cajas');

Route::get('/cajas/nuevo',[App\Http\Controllers\CajasController::class, 'create'])
    ->name('cajas.create');

Route::get('/apertura',[App\Http\Controllers\CajasController::class, 'apertura'])
    ->name('apertura');

Route::get('/registeraperturas',[App\Http\Controllers\CajasController::class, 'register_apertura'])
    ->name('apertura.register');

Route::get('/cierre',[App\Http\Controllers\CajasController::class, 'cierre'])
    ->name('cierre');

Route::get('/historico_pagos',[App\Http\Controllers\CajasController::class, 'pagos'])
    ->name('historico');

Route::get('/registercierre',[App\Http\Controllers\CajasController::class, 'register_cierre'])
    ->name('cierre.register');

Route::get('/cajas/{cajas}',[App\Http\Controllers\CajasController::class, 'destroy'])
    ->name('cajas.destroy');

Route::get('/cajasin/{cajas}',[App\Http\Controllers\CajasController::class, 'inactivar'])
    ->name('cajas.inactivar');

Route::get('/cajas/{cajas}/editar',[App\Http\Controllers\CajasController::class, 'edit'])
    ->name('cajas.edit');

Route::get('/cajasup/{cajas}',[App\Http\Controllers\CajasController::class, 'update'])
    ->name('cajas.update');


Route::get('/listado_transacciones',[App\Http\Controllers\CajasController::class, 'listado_transacciones'])
    ->name('listado.transacciones');

Route::get('/listado_cierre',[App\Http\Controllers\CajasController::class, 'listado_cierre'])
    ->name('listado.cierre');

Route::get('/imprimir_listado_transacciones',[App\Http\Controllers\CajasController::class, 'imprimir_listado_transacciones'])
    ->name('imprimir.transacciones');

Route::get('/imprimir_listado_cierre',[App\Http\Controllers\CajasController::class, 'imprimir_listado_cierre'])
    ->name('imprimir.cierres');



//RUTAS PARA LOS MODALS DE CLAVE DEL DIA

Route::get('/clave',[App\Http\Controllers\PagosController::class, 'clave']);

Route::get('/clave2',[App\Http\Controllers\CajasController::class, 'clave2']);

Route::get('/prueba',[App\Http\Controllers\CajasController::class, 'prueba']);

Route::get('/prueba2',[App\Http\Controllers\PagosController::class, 'prueba2']);

 //Rutas del Controlador de fondos

Route::get('/fondos',[App\Http\Controllers\FondosController::class, 'index'])->name('fondos');

Route::get('/solicitudes',[App\Http\Controllers\FondosController::class, 'create'])->name('solicitudes');

Route::get('solicitudes_user/ver/{solicitudes}',[App\Http\Controllers\FondosController::class, 'solicitudes_retiro_ver_user'])->name('solicitudes.retiro.ver.user');

Route::get('/solicitudesstore',[App\Http\Controllers\FondosController::class, 'store'])->name('solicitudes.store');


Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'], function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
   echo Artisan::call('permission:cache-reset');
})->name('admin.home')->middleware('isAdmin');

Route::get('mes_a/{id_mes}', [App\Http\Controllers\Admin\HomeController::class, 'ObtenerResultado2']);

});

Route::get('admin/clientes',[App\Http\Controllers\Admin\HomeController::class, 'clientes'])->name('clientes');

Route::get('admin/transacciones',[App\Http\Controllers\Admin\HomeController::class, 'transacciones'])->name('transacciones');

Route::get('admin/solicitudes_r',[App\Http\Controllers\Admin\HomeController::class, 'solicitudes_retiro'])->name('solicitudes.retiro');

Route::get('admin/solicitudes_e',[App\Http\Controllers\Admin\HomeController::class, 'solicitudes_eliminacion'])->name('solicitudes.eliminacion');

Route::get('admin/tiendas',[App\Http\Controllers\Admin\HomeController::class, 'tiendas'])->name('admin.tiendas');

Route::get('admin/tiendas_ver/{tiendas}',[App\Http\Controllers\Admin\HomeController::class, 'ver_tiendas'])->name('admin.tiendas.ver');

Route::get('admin/tiendas_ver/pagos/{tiendas}',[App\Http\Controllers\Admin\HomeController::class, 'ver_tiendas_pagos'])->name('admin.tiendas.ver.pagos');

Route::get('admin/solicitudes_r/ver/{solicitudes}',[App\Http\Controllers\Admin\HomeController::class, 'solicitudes_retiro_ver'])->name('solicitudes.retiro.ver');

Route::get('admin/solicitudes_r/update/{solicitudes}',[App\Http\Controllers\Admin\HomeController::class, 'actualizar_solicitudes'])->name('solicitudes.actualizar');

Route::get('/clientes/{user}',[App\Http\Controllers\Admin\HomeController::class, 'inactivar_usuario'])
    ->name('clientes.inactivar');

Route::get('/clientes/solicitud/{solicitudes}',[App\Http\Controllers\Admin\HomeController::class, 'inactivar_usuario_solicitud'])
    ->name('clientes.inactivar.solicitud');

Route::get('accion',[App\Http\Controllers\Admin\HomeController::class, 'accion_lote'])
    ->name('usuarios.accion');



