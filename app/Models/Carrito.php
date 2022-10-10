<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carrito';
    public $timestamps = false;
    protected $fillable = [
        'total_carrito',
        'estatus'
    ];

    public static function getCarrito()
    {
        return Carrito::where('estatus',1)->first();
    }

    public static function getCarritoById($id)
    {
        return Carrito::where('id_carrito',$id)->first();
    }

    public static function agregarCarrito($request,$subtotal)
    {
       return Carrito::insertGetId(
            [
                'total_carrito' => $subtotal,
                'estatus' => 1
            ]
        );
    }

    public static function cambiarEstatus($id_carrito)
    {
        Carrito::where('id_carrito',$id_carrito)
            ->update(
                [
                    'estatus' => 2
                ]
            );

        return true;
    }

    public static function actualizarCarrito($id,$total)
    {
        Carrito::where('id_carrito',$id)
            ->update(
                [
                    'total_carrito' => $total
                ]
            );

        return true;
    }

    public static function carritoDetalle()
    {
        /*return Carrito::leftJoin('zapatos as zap',function ($zap){
            $zap->on('zap.id_zapato','=','carrito.id_zapato');
        })->leftJoin('modelos as mo',function ($mo){
            $mo->on('mo.id_modelo','=','zap.id_modelo');
        })->select(
            'zap.id_zapato',
            'zap.precio',
            'mo.descripcion as modelo',
            'mo.codigo_modelo',
            'carrito.id_carrito',
        )*/
    }
}
