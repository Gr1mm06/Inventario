<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Zapatos;
use Illuminate\Http\Request;
use Exception as ExceptionAlias;

class CarritoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $precio = Zapatos::getPrecioByIdZapato($request->id);
            $subtotal = $precio['precio'] * $request->cantidad;
            $carrito = Carrito::getCarrito();

            if ($carrito) {
                $id_carrito = $carrito['id_carrito'];
                $total = $carrito['total_carrito'] + $subtotal;
                Carrito::actualizarCarrito($carrito['id_carrito'],$total);
            } else {
                $id_carrito = Carrito::agregarCarrito($request,$subtotal);
            }

            CarritoDetalle::agregarDetalleCarrito($id_carrito,$request,$subtotal);

            return json_encode(true);
        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $carrito = Carrito::getCarrito();
            $carritoDetalle = CarritoDetalle::getCarritoDetalle($carrito['id_carrito']);

            return view(
                'carrito.detalle.dCarrito',
                compact(
                    'carritoDetalle',
                    'carrito'
                )
            );
        } catch (ExceptionAlias $e) {
            echo 'Mensaje: El carrito no cuenta con ningun producto';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrito = Carrito::getCarrito();
        $detalle = CarritoDetalle::getCarritoDetalleZapato($id);

        $total_restante = $carrito['total_carrito'] - $detalle['total'];

        Carrito::actualizarCarrito($carrito['id_carrito'],$total_restante);

        CarritoDetalle::eliminarCarritoZapato($id);

        return response()->json(true);
    }
}
