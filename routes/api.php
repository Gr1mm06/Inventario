<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ZapatoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;

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
Route::group(['middleware' => 'web'], function() {
    Route::get('Inventario/ListaZapatos', [InventarioController::class, 'index']);
    Route::get('Inventario/CatalogoZapatos', [InventarioController::class, 'show']);
    Route::get('Inventario/Buscar/{id_categoria}', [InventarioController::class, 'showByCategoria']);
    Route::get(
        'Inventario/ListaBusqueda/{id_modelo}/{id_categoria}',
        [
            InventarioController::class, 'showListaByBusqueda'
        ]
    );

    Route::get('Detalle/Zapato/{id_zapato}', [ZapatoController::class, 'show']);
    Route::get('Nuevo/Zapato', [ZapatoController::class, 'create']);
    Route::get('Editar/Zapato/{id_zapato}', [ZapatoController::class, 'edit']);

    Route::get('Ventas/Lista', [CompraController::class, 'index']);
    Route::get('Detalle/Venta/{id_venta}', [CompraController::class, 'show']);
});
Route::post('Agregar/Zapato', [ZapatoController::class, 'store']);
Route::put('Actualizar/Zapato', [ZapatoController::class, 'update']);
Route::delete('Eliminar/Zapato/{id_zapato}', [ZapatoController::class, 'destroy']);

Route::post('Agregar/Carrito', [CarritoController::class, 'store']);
Route::get('Detalle/Carrito', [CarritoController::class, 'show']);
Route::delete('Eliminar/Carrito/{id_zapato}', [CarritoController::class, 'destroy']);

Route::post('Finalizar/Compra', [CompraController::class, 'store']);

