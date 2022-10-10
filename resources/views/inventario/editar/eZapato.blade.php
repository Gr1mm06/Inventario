<div class="row">
    <div class="col-md-6">
        <h2>Editar Zapato</h2>
    </div>
    <div class="col-md-6" style="text-align: -webkit-right;">
        <button onclick="guardar()" type="button" class="btn btn-success">
            Actualizar
        </button>
        <button onclick="detalle('Inventario','ListaZapatos')" type="button" class="btn btn-danger">
            Cancelar
        </button>
    </div>
</div>
<div class="content table-responsive">
    <div>
        <h4>Informacion del Zapato</h4>
        <form class="form-horizontal" id="frmZapato" name="frmZapato" autocomplete="off">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" name="id_zapato" id="id_zapato" value="{{ $zapato['id_zapato'] }}">
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Descripcion </label>
                <div class="col-md-10">
                    <input
                        type="text"
                        required
                        class="form-control"
                        name="descripcion"
                        id="descripcion"
                        value="{{ $zapato['descripcion'] }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Modelo</label>
                <div class="col-md-10">
                    <select class="form-select"  aria-label="Default select example" name="modelo" id="modelo">
                        <option selected disabled>Modelo</option>
                        @foreach($modelos as $mo)
                            @if($zapato['id_modelo'] == $mo->id_modelo)
                                <option selected value="{{ $mo->id_modelo }}">
                                    {{ $mo->codigo_modelo }} - {{ $mo->descripcion }}
                                </option>
                            @else
                                <option value="{{ $mo->id_modelo }}">
                                    {{ $mo->codigo_modelo }} - {{ $mo->descripcion }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Marca</label>
                <div class="col-md-10">
                    <select class="form-select"  aria-label="Default select example" name="marca" id="marca">
                        <option selected disabled>Marca</option>
                        @foreach($marcas as $mar)
                            @if($zapato['id_marca'] == $mar->id_marca)
                                <option selected value="{{ $mar->id_marca }}">{{ $mar->descripcion }}</option>
                            @else
                                <option value="{{ $mar->id_marca }}">{{ $mar->descripcion }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Foto</label>
                <div class="card col-md-4">
                    <img
                        src="imagen_calzado/{{ $zapato['foto'] }}"
                        class="card-img-top"
                        alt="{{ $zapato['foto'] }}"
                        width="304"
                        height="236"
                        id="imgCalzado"
                        onchange="cambioFoto()"
                    >
                </div>
                <div class="col-md-6">
                    <label class="btn btn-primary btn-sm file ">
                        Cargar Imagen
                        <input
                            class="form-control img col-md-10"
                            id="file"
                            name="file"
                            type="file"
                            style="display: none;"
                        >
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Cantidad</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $zapato['cantidad'] }}">
                </div>
            </div>
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Numero</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="numero" id="numero" value="{{ $zapato['numero'] }}">
                </div>
            </div>
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Categoria</label>
                <div class="col-md-10">
                    <select
                        class="form-select"
                        multiple
                        aria-label="multiple select example"
                        name="categoria[]"
                        id="categoria">
                        <option disabled selected>Categorias</option>
                        @foreach($categorias as $cat)
                            <option
                                @if(in_array($cat->id_categoria,$arrayCategorias))
                                    selected
                                @endif
                                value="{{ $cat->id_categoria }}"
                            >
                                {{ $cat->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="icono" class="col-md-2 control-label">Precio</label>
                <div class="col-md-10">
                    <input
                        type="number" class="form-control" name="precio" id="precio" value="{{ $zapato['precio'] }}">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function guardar() {
        $.ajax({
            data: new FormData($("#frmZapato")[0]),
            type: 'post',
            url: 'api/Actualizar/Zapato',
            dataType: 'json',
            cache       : false,
            contentType : false,
            processData : false,
            success: function(response) {
                if(response === true){
                    alert('Zapato creado correctamente');
                    detalle('Inventario','ListaZapatos');
                }else{
                    alert('Error')
                }
            }
        });
    }

    const $seleccionArchivos = document.querySelector("#file"),
        $imagenPrevisualizacion = document.querySelector("#imgCalzado");

    // Escuchar cuando cambie
    $seleccionArchivos.addEventListener("change", () => {
        // Los archivos seleccionados, pueden ser muchos o uno
        const archivos = $seleccionArchivos.files;
        // Si no hay archivos salimos de la función y quitamos la imagen
        if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }
        // Ahora tomamos el primer archivo, el cual vamos a previsualizar
        const primerArchivo = archivos[0];
        // Lo convertimos a un objeto de tipo objectURL
        const objectURL = URL.createObjectURL(primerArchivo);
        // Y a la fuente de la imagen le ponemos el objectURL
        $imagenPrevisualizacion.src = objectURL;
    });
</script>
