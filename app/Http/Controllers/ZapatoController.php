<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Modelos;
use App\Models\Zapatos;
use App\Models\Categorias;
use App\Models\ZapatosCategorias;
use Exception as ExceptionAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

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
        $this->_validarDatosZapato($request);

        try {

            $formatos = array('png','jpg','jpeg','PNG','JPG','JPEG');
            $file = false;
            $file_name = false;

            if ($request->file) {
                $file = $request->file('file');
                $ext = $file->getClientOriginalExtension();
            }

            if ($file) {
                if (in_array($ext,$formatos)) {
                    $id_zapato = Zapatos::crearZapatogetID($request);
                    $file_name = $id_zapato . '.' . $ext;
                    Zapatos::guardarFotoZapato($id_zapato,$file_name);
                    Storage::disk('img_zapatos')->put($file_name,  \File::get($file));
                }else{
                    return response()->json(['errors' => 'La imagen no tiene el formato correcto']);
                }
            } else {
                $id_zapato = Zapatos::crearZapatogetID($request);
            }

            $categoria = $request->categoria;

            foreach ($categoria as $car) {
                ZapatosCategorias::relacionZapatoCategoria($id_zapato,$car);
            }

            return response()->json(true);
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
            $arrayCategorias = array();

            foreach ($categoriasZapato as $cat) {
                array_push($arrayCategorias, $cat->id_categoria);
            }

            return view(
                'inventario.editar.eZapato',
                compact(
                    'categorias',
                    'modelos',
                    'marcas',
                    'zapato',
                    'arrayCategorias'
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->_validarDatosZapato($request);

        try {
            $id_zapato = $request->id_zapato;
            $formatos = array('png','jpg','jpeg','PNG','JPG','JPEG');
            $file = false;
            $file_name = false;
            $categoria = $request->categoria;

            if ($request->file) {
                $file = $request->file('file');
                $ext = $file->getClientOriginalExtension();
            }

            if ($file) {
                if (in_array($ext,$formatos)) {
                    Zapatos::actualizarZapato($request);
                    $file_name = $id_zapato . '.' . $ext;
                    Zapatos::guardarFotoZapato($id_zapato,$file_name);
                    Storage::disk('img_zapatos')->put($file_name,  \File::get($file));
                }else{
                    return response()->json(['errors' => 'La imagen no tiene el formato correcto']);
                }
            } else {
                Zapatos::actualizarZapato($request);
            }

            ZapatosCategorias::limpiarCategoriasByIdZapato($id_zapato);
            foreach ($categoria as $car) {
                ZapatosCategorias::relacionZapatoCategoria($id_zapato,$car);
            }

            return response()->json(true);
        } catch (ExceptionAlias $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Zapatos::eliminarZapato($id);
        return response()->json(true);
    }

    private function _validarDatosZapato($request)
    {
        $validar = Validator::make(
            $request->all(),
            [
                'descripcion' => 'required|min:5',
                'modelo' => 'required',
                'marca' => 'required',
                'cantidad' => 'required|integer',
                'numero' => 'required|numeric',
                'categoria' => 'required',
                'precio' => 'required|numeric',
            ],
            [
                'descripcion.required' => 'Descripcion requerida.',
                'descripcion.min' => 'El minimo de caracteres es 5.',
                'modelo.required' => 'Modelo requerido.',
                'marca.required' => 'Marca requerida.',
                'cantidad.required' => 'Cantidad requerida.',
                'cantidad.numeric' => 'Solo valores enteros.',
                'numero.required' => 'Numero requerido.',
                'numero.numeric' => 'Solo valores numericos.',
                'categoria.required' => 'Categoria requerida.',
                'precio.required' => 'Precio requerido.',
                'precio.numeric' => 'Solo valores numericos.',
            ]
        );
        if ($validar->fails()) {
            return response()->json(['errors' => $validar->errors()->all()]);
        }
    }
}
