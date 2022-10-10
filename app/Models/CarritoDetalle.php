<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
    use HasFactory;

    protected $table = 'carrito_detalle';
    public $timestamps = false;
    protected $fillable = [
        'id_carrito',
        'id_zapato',
        'cantidad',
        'total',
    ];

    public static function agregarDetalleCarrito($id_carrito,$request,$total)
    {
        CarritoDetalle::create(
            [
                'id_carrito' => $id_carrito,
                'id_zapato' => $request->id,
                'cantidad' => $request->cantidad,
                'total' => $total,
            ]
        );

        return true;
    }

    public static function getCarritoDetalleZapato($id_zapato)
    {
        return CarritoDetalle::where('id_zapato',$id_zapato)->first();
    }

    public static function getCarritoDetalle($id_carrito)
    {
        return CarritoDetalle::leftJoin('zapatos as zap',function ($zap){
            $zap->on('zap.id_zapato','=','carrito_detalle.id_zapato');
        })->leftJoin('modelos as mod',function ($mod){
            $mod->on('mod.id_modelo','=','zap.id_modelo');
        })->select(
            'zap.id_zapato',
            'zap.descripcion as zapato',
            'zap.precio',
            'zap.foto',
            'carrito_detalle.cantidad',
            'carrito_detalle.total',
            'mod.descripcion as modelo',
            'mod.codigo_modelo'
        )->where('carrito_detalle.id_carrito',$id_carrito)
        ->get();
    }

    public static function eliminarCarritoZapato($id)
    {
        CarritoDetalle::where('id_zapato',$id)->delete();
        return true;
    }
}
