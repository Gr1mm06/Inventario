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
}
