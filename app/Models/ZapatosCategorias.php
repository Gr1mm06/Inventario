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

    public static function getIdCategoriasByIdZapato($id){
        return ZapatosCategorias::where('id_zapato',$id)->get();
    }

    public static function relacionZapatoCategoria($id,$id_categoria)
    {
        ZapatosCategorias::create(
          [
              'id_zapato' => $id,
              'id_categoria' => $id_categoria,
          ]
        );

        return true;
    }

    public static function limpiarCategoriasByIdZapato($id)
    {
        ZapatosCategorias::where('id_zapato', $id)->delete();
        return true;
    }
}
