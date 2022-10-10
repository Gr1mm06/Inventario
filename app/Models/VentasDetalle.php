<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasDetalle extends Model
{
    protected $table = 'ventas_detalle';
    public $timestamps = false;
    protected $fillable = [
        'id_venta',
        'id_zapato',
        'cantidad',
        'total',
    ];

    public static function agregarVentasDetalle($id_venta,$id_zapato,$cantidad,$total)
    {
        VentasDetalle::create(
            [
                'id_venta' => $id_venta,
                'id_zapato' => $id_zapato,
                'cantidad' => $cantidad,
                'total' => $total,
            ]
        );

        return true;
    }

    public static function getVentaDetalle($id_venta)
    {
        return VentasDetalle::leftJoin('zapatos as zap',function ($zap){
            $zap->on('zap.id_zapato','=','ventas_detalle.id_zapato');
        })->leftJoin('modelos as mod',function ($mod){
            $mod->on('mod.id_modelo','=','zap.id_modelo');
        })->select(
            'zap.id_zapato',
            'zap.descripcion as zapato',
            'zap.precio',
            'zap.foto',
            'ventas_detalle.cantidad',
            'ventas_detalle.total',
            'mod.descripcion as modelo',
            'mod.codigo_modelo'
        )->where('ventas_detalle.id_venta',$id_venta)
            ->get();
    }
}
