<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Ventas;
use App\Models\VentasDetalle;
use App\Models\Zapatos;
use Illuminate\Http\Request;
use Exception as ExceptionAlias;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $fecha = date("Y-m-d");
            $carrito = Carrito::getCarritoById($request->id);
            $carritoDetalle = CarritoDetalle::getCarritoDetalle($request->id);

            $id_venta = Ventas::agregarVentas($carrito,$fecha);

            foreach ($carritoDetalle as $car) {
                $zapato = Zapatos::getZapatoById($car->id_zapato);

                $cantidadRestante = $zapato['cantidad'] - $car->cantidad;
                Zapatos::actualizarCantidadZapato($car->id_zapato,$cantidadRestante);
                VentasDetalle::agregarVentasDetalle($id_venta,$car->id_zapato,$car->cantidad,$car->total);
            }

            Carrito::cambiarEstatus($request->id);

            return json_encode(true);
        } catch (ExceptionAlias $e) {
            return json_encode($e->getMessage());
           // echo 'Message: ' . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
