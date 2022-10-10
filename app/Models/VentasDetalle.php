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
}
