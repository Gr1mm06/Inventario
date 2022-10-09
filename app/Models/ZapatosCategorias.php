<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZapatosCategorias extends Model
{
    use HasFactory;
    protected $table = 'zapatos_categorias';
    public $timestamps = false;
    protected $fillable = [
        'id_zapato',
        'id_categoria',
    ];
}
