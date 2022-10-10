<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapatos extends Model
{
    use HasFactory;

    protected $table = 'zapatos';
    public $timestamps = false;
    protected $fillable = [
        'descripcion',
        'id_modelo',
        'id_marca',
        'foto',
        'cantidad',
        'numero',
        'precio',
    ];

    public static function crearZapatogetID($request)
    {
       return Zapatos::insertGetId(
           [
               'descripcion' => trim($request->descripcion),
               'id_modelo' => $request->modelo,
               'id_marca' => $request->marca,
               'cantidad' => $request->cantidad,
               'numero' => $request->numero,
               'precio' => $request->precio,
               'foto' => 'unisex.jpg'
           ]
       );
    }

    public static function actualizarZapato($request)
    {
        Zapatos::where('id_zapato',$request->id_zapato)
            ->update(
                [
                    'descripcion' => trim($request->descripcion),
                    'id_modelo' => $request->modelo,
                    'id_marca' => $request->marca,
                    'cantidad' => $request->cantidad,
                    'numero' => $request->numero,
                    'precio' => $request->precio,
                ]
            );

        return true;
    }

    public static function actualizarCantidadZapato($id_zapato,$cantidad)
    {
        Zapatos::where('id_zapato',$id_zapato)
            ->update(
                [
                    'cantidad' => $request->cantidad,
                ]
            );

        return true;
    }

    public static function eliminarZapato($id)
    {
        Zapatos::where('id_zapato',$id)->delete();
        return true;
    }

    public static function getPrecioByIdZapato($id)
    {
        return Zapatos::where('id_zapato',$id)->select('precio')->first();
    }

    public static function guardarFotoZapato($id,$file_name)
    {
        Zapatos::where('id_zapato',$id)
            ->update(
                [
                    'foto' => $file_name
                ]
            );
        return true;
    }

    public static function listaZapatos(){
       return Zapatos::leftJoin('modelos as mo',function($mo){
            $mo->on('zapatos.id_modelo','=','mo.id_modelo');
        })->leftJoin('marcas as ma',function($ma){
            $ma->on('zapatos.id_marca','=','ma.id_marca');
        })->leftJoin('zapatos_categorias as zc',function ($zc){
            $zc->on('zapatos.id_zapato','=','zc.id_zapato');
        })->leftJoin('categorias as cat',function ($cat){
            $cat->on('zc.id_categoria','=','cat.id_categoria');
        })->select(
           'zapatos.id_zapato',
           'zapatos.descripcion',
            'zapatos.foto',
            'zapatos.cantidad',
            'zapatos.numero',
            'zapatos.precio',
            'mo.descripcion as modelo',
            'mo.codigo_modelo',
            'ma.descripcion as marca',
            'cat.descripcion as categoria'
        )->get();
    }

    public static function listaZapatosByCategoria($id_categoria)
    {
        return Zapatos::leftJoin('modelos as mo',function($mo){
            $mo->on('zapatos.id_modelo','=','mo.id_modelo');
        })->leftJoin('marcas as ma',function($ma){
            $ma->on('zapatos.id_marca','=','ma.id_marca');
        })->leftJoin('zapatos_categorias as zc',function ($zc){
            $zc->on('zapatos.id_zapato','=','zc.id_zapato');
        })->leftJoin('categorias as cat',function ($cat){
            $cat->on('zc.id_categoria','=','cat.id_categoria');
        })->select(
            'zapatos.id_zapato',
            'zapatos.descripcion',
            'zapatos.foto',
            'zapatos.cantidad',
            'zapatos.numero',
            'zapatos.precio',
            'mo.descripcion as modelo',
            'mo.codigo_modelo',
            'ma.descripcion as marca',
            'cat.descripcion as categoria'
        )->where('zc.id_categoria',$id_categoria)
        ->get();
    }

    public static function getZapatoById($id)
    {
        return Zapatos::leftJoin('modelos as mo',function($mo){
            $mo->on('zapatos.id_modelo','=','mo.id_modelo');
        })->leftJoin('marcas as ma',function($ma){
            $ma->on('zapatos.id_marca','=','ma.id_marca');
        })->select(
            'zapatos.id_zapato',
            'zapatos.descripcion',
            'zapatos.foto',
            'zapatos.cantidad',
            'zapatos.numero',
            'zapatos.precio',
            'mo.id_modelo',
            'mo.descripcion as modelo',
            'mo.codigo_modelo',
            'ma.id_marca',
            'ma.descripcion as marca',
        )->where('zapatos.id_zapato',$id)
        ->first();
    }

    public static function listaZapatosByModeloCategoria($id_modelo, $id_categoria)
    {
        return Zapatos::leftJoin('modelos as mo',function($mo){
            $mo->on('zapatos.id_modelo','=','mo.id_modelo');
        })->leftJoin('marcas as ma',function($ma){
            $ma->on('zapatos.id_marca','=','ma.id_marca');
        })->leftJoin('zapatos_categorias as zc',function ($zc){
            $zc->on('zapatos.id_zapato','=','zc.id_zapato');
        })->leftJoin('categorias as cat',function ($cat){
            $cat->on('zc.id_categoria','=','cat.id_categoria');
        })->select(
            'zapatos.id_zapato',
            'zapatos.descripcion',
            'zapatos.foto',
            'zapatos.cantidad',
            'zapatos.numero',
            'zapatos.precio',
            'mo.descripcion as modelo',
            'mo.codigo_modelo',
            'ma.descripcion as marca',
            'cat.descripcion as categoria'
        )->where('zc.id_categoria',$id_categoria)
        ->where('mo.id_modelo',$id_modelo)
        ->get();
    }

    public static function listaZapatosByModelo($id_modelo)
    {
        return Zapatos::leftJoin('modelos as mo',function($mo){
            $mo->on('zapatos.id_modelo','=','mo.id_modelo');
        })->leftJoin('marcas as ma',function($ma){
            $ma->on('zapatos.id_marca','=','ma.id_marca');
        })->leftJoin('zapatos_categorias as zc',function ($zc){
            $zc->on('zapatos.id_zapato','=','zc.id_zapato');
        })->leftJoin('categorias as cat',function ($cat){
            $cat->on('zc.id_categoria','=','cat.id_categoria');
        })->select(
            'zapatos.id_zapato',
            'zapatos.descripcion',
            'zapatos.foto',
            'zapatos.cantidad',
            'zapatos.numero',
            'zapatos.precio',
            'mo.descripcion as modelo',
            'mo.codigo_modelo',
            'ma.descripcion as marca',
            'cat.descripcion as categoria'
        )->where('mo.id_modelo',$id_modelo)
        ->get();
    }
}
