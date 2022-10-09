<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ZapatoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('Inventario/ListaZapatos', [InventarioController::class, 'index']);
Route::get('Inventario/CatalogoZapatos', [InventarioController::class, 'show']);

Route::get('Detalle/Zapato/{id_zapato}', [ZapatoController::class, 'show']);
Route::get('Nuevo/Zapato', [ZapatoController::class, 'create']);
Route::get('Editar/Zapato/{id_zapato}', [ZapatoController::class, 'edit']);
