<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Modelos;
use App\Models\Zapatos;
use App\Models\Categorias;
use App\Models\ZapatosCategorias;
use Exception as ExceptionAlias;
use Illuminate\Http\Request;

class ZapatoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categorias = Categorias::all();
            $modelos = Modelos::all();
            $marcas = Marcas::all();

            return view('inventario.nuevo.nZapato',compact('categorias','modelos','marcas'));
        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
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
    public function show($id)
    {
        try {
            $categorias = Categorias::all();
            $modelos = Modelos::all();
            $marcas = Marcas::all();
            $zapato = Zapatos::getZapatoById($id);
            $categoriasZapato = ZapatosCategorias::getIdCategoriasByIdZapato($id);

            return view(
                'inventario.detalle.dZapato',
                compact(
                    'categorias',
                    'modelos',
                    'marcas',
                    'zapato',
                    'categoriasZapato'
                )
            );
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
        try {
            $categorias = Categorias::all();
            $modelos = Modelos::all();
            $marcas = Marcas::all();
            $zapato = Zapatos::getZapatoById($id);
            $categoriasZapato = ZapatosCategorias::getIdCategoriasByIdZapato($id);

            return view(
                'inventario.editar.eZapato',
                compact(
                    'categorias',
                    'modelos',
                    'marcas',
                    'zapato',
                    'categoriasZapato'
                )
            );
        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
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
}
