<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';
    public $timestamps = false;
    protected $fillable = [
        'total_venta',
        'fecha_venta',
    ];

    public static function agregarVentas($info,$fecha)
    {
        return Ventas::insertGetId(
            [
                'total_venta' => $info['total_carrito'],
                'fecha_venta' => $fecha,
            ]
        );
    }
}
