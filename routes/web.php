<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PortalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CotxitmController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SuspensionController;
use App\Http\Controllers\RecotizacionController;

use App\Http\Middleware\MDAdministrador;

Route::middleware([MDAdministrador::class])->group(function () {
	// home
	Route::get('home/home',[HomeController::class, 'actionHome']);
});

// Route::get('/', function () {
//     return view('welcome');
// });
// portal
Route::get('/',[PortalController::class, 'actionPortal']);
// login
Route::get('login/login',[LoginController::class, 'actionLogin']);
Route::post('login/sigin',[LoginController::class, 'sigin']);
Route::get('login/logout',[LoginController::class, 'logout']);

// proveedor
Route::get('proveedor', function () {return view('proveedor.proveedor');});
// Route::get('proveedor/registrar',[ProveedorController::class, 'actRegistrar']);
Route::post('proveedor/guardar',[ProveedorController::class, 'actGuardar']);
Route::get('proveedor/listar',[ProveedorController::class, 'actListar']);
Route::post('proveedor/eliminar',[ProveedorController::class, 'actEliminar']);
Route::post('proveedor/editar',[ProveedorController::class, 'actEditar']);
Route::post('proveedor/guardarCambios',[ProveedorController::class, 'actGuardarCambios']);
// cotizacion
Route::get('cotizacion/registrar', function () {return view('cotizacion.registrar');});
Route::get('cotizacion/ver', function () {return view('cotizacion.ver');});
Route::get('cotizacion/editar', function () {return view('cotizacion.editar');});
Route::get('cotizacion/addItems', function () {return view('cotizacion.addItems');});

Route::post('cotizacion/guardar',[CotizacionController::class, 'actGurdar']);
Route::get('cotizacion/listar',[CotizacionController::class, 'actListar']);
Route::post('cotizacion/eliminar',[CotizacionController::class, 'actEliminar']);
Route::post('cotizacion/show',[CotizacionController::class, 'actShow']);
Route::post('cotizacion/guardarCambios',[CotizacionController::class, 'actGuardarCambios']);
Route::post('cotizacion/changeEstadoCotizacion',[CotizacionController::class, 'actChangeEstadoCotizacion']);
Route::post('cotizacion/showCotizacion',[CotizacionController::class, 'actShowCotizacion']);
// - interesante manejo de file
// Route::get('cotizacion/archivo/{nombreArchivo}', 'CotizacionController@verArchivo')->name('ver-archivo');
Route::get('cotizacion/archivo/{nombreArchivo?}',[CotizacionController::class, 'verArchivo'])->name('ver-archivo');
// -

// items
Route::post('item/guardar',[ItemController::class, 'actGurdar']);
Route::get('item/listar',[ItemController::class, 'actListar']);
// items x cotizacion
Route::post('cotxitm/guardar',[CotxitmController::class, 'actGuardar']);
Route::post('cotxitm/eliminar',[CotxitmController::class, 'actEliminar']);
Route::post('cotxitm/changeCant',[CotxitmController::class, 'actChangeCant']);
Route::post('cotxitm/changeUm',[CotxitmController::class, 'actChangeUm']);
Route::post('cotxitm/loadSegunCotizacion',[CotxitmController::class, 'actLoadSegunCotizacion']);

// unidad de medida
Route::get('unidadMedida/listar',[UnidadMedidaController::class, 'actListar']);
// usuario
Route::get('usuario', function () {return view('usuario.usuario');});

Route::post('usuario/guardar',[UsuarioController::class, 'actGuardar']);
Route::get('usuario/listar',[UsuarioController::class, 'actListar']);
Route::post('usuario/eliminar',[UsuarioController::class, 'actEliminar']);
Route::post('usuario/editar',[UsuarioController::class, 'actEditar']);
Route::post('usuario/guardarCambios',[UsuarioController::class, 'actGuardarCambios']);
// suspension
Route::post('suspension/guardar',[SuspensionController::class, 'actGuardar']);
// recotizacion
Route::post('recotizacion/guardar',[RecotizacionController::class, 'actGuardar']);


