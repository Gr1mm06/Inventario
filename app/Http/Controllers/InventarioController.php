<?php

namespace App\Http\Controllers;

use App\Models\Modelos;
use App\Models\Zapatos;
use App\Models\Categorias;
use Exception as ExceptionAlias;
use Illuminate\Http\Request;


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function _arrayZapatos($zapatos)
    {
        $lista = array();

        foreach ($zapatos as $zap) {
            if (!array_key_exists($zap->id_zapato,$lista)) {
                $lista[$zap->id_zapato] =[
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
