<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PortalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProveedorController;

// Route::get('/', function () {
//     return view('welcome');
// });
// portal
Route::get('/',[PortalController::class, 'actionPortal']);
// login
Route::get('login/login',[LoginController::class, 'actionLogin']);
// home
Route::get('home/home',[HomeController::class, 'actionHome']);
// proveedor
Route::get('proveedor', function () {return view('proveedor.proveedor');});
Route::get('proveedor/registrar',[ProveedorController::class, 'actRegistrar']);
// cotizacion
Route::get('cotizacion/registrar', function () {return view('cotizacion.registrar');});
