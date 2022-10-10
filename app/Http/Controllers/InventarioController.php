<?php

namespace App\Http\Controllers;

use App\Models\Modelos;
use App\Models\Zapatos;
use App\Models\Categorias;
use Exception as ExceptionAlias;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $zapatos = Zapatos::listaZapatos();
            $categorias = Categorias::all();
            $modelos = Modelos::all();
            $lista = $this->_arrayZapatos($zapatos);

            return view('inventario.catalogo.lista',compact('lista','categorias','modelos'));
        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $zapatos = Zapatos::listaZapatos();
            $categorias = Categorias::all();
            $modelos = Modelos::all();
            $lista = $this->_arrayZapatos($zapatos);


            return view('inventario.catalogo.catalogo',compact('lista','categorias','modelos'));
        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function showByCategoria($id)
    {
        try {
            $zapatos = Zapatos::listaZapatosByCategoria($id);
            $lista = $this->_arrayZapatos($zapatos);

            return view
            (
                'inventario.catalogo.catalogoCategoria',
                compact
                (
                    'lista',
                )
            );

        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function showListaByBusqueda($id_modelo, $id_categooria)
    {
        try {
            if ($id_modelo != 0 && $id_categooria != 0) {
                $zapatos = Zapatos::listaZapatosByModeloCategoria($id_modelo, $id_categooria);
            } else {
                if ($id_modelo != 0) {
                    $zapatos = Zapatos::listaZapatosByModelo($id_modelo);
                } else {
                    $zapatos = Zapatos::listaZapatosByCategoria($id_categooria);
                }
            }

            $lista = $this->_arrayZapatos($zapatos);

            return view
            (
                'inventario.catalogo.listaBusqueda',
                compact
                (
                    'lista',
                )
            );

        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    private function _arrayZapatos($zapatos)
    {
        $lista = array();

        foreach ($zapatos as $zap) {
            if (!array_key_exists($zap->id_zapato,$lista)) {
                $lista[$zap->id_zapato] =
                    [
                        'id_zapato' => $zap->id_zapato,
                        'descripcion' => $zap->descripcion,
                        'modelo' => $zap->modelo,
                        'codigo_modelo' => $zap->codigo_modelo,
                        'marca' => $zap->marca,
                        'cantidad' => $zap->cantidad,
                        'numero' => $zap->numero,
                        'precio' => $zap->precio,
                        'categoria' => $zap->categoria,
                        'foto' => $zap->foto,
                    ];
            } else {
                $lista[$zap->id_zapato]['categoria'] .= ",$zap->categoria";
            }
        }

        return $lista;
    }
}
