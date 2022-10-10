<div class="row">
    <div class="col-md-6">
        <h2>Crear Zapato</h2>
    </div>
    <div class="col-md-6" style="text-align: -webkit-right;">
        <button onclick="guardar()" type="button" class="btn btn-success">
            Agregar
        </button>
        <button onclick="detalle('Inventario','ListaZapatos')" type="button" class="btn btn-danger">
            Cancelar
        </button>
    </div>
</div>
<div class="table-responsive">
    <h4>Informacion del Zapato</h4>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <span class="text-danger">{{ $error }}</span>
        @endforeach
    @endif
    <form class="form-horizontal" id="frmZapato" name="frmZapato" autocomplete="off">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Descripcion </label>
            <div class="col-md-10">
                <input type="text" required class="form-control" name="descripcion" id="descripcion">
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Modelo</label>
            <div class="col-md-10">
                <select class="form-select"  aria-label="Default select example" name="modelo" id="modelo">
                    <option selected disabled value="">Modelo</option>
                    @foreach($modelos as $mo)
                        <option value="{{ $mo->id_modelo }}">{{ $mo->codigo_modelo }} - {{ $mo->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Marca</label>
            <div class="col-md-10">
                <select class="form-select"  aria-label="Default select example" id="marca" name="marca">
                    <option selected disabled value="">Marca</option>
                    @foreach($marcas as $ma)
                        <option value="{{ $ma->id_marca }}">{{ $ma->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Foto</label>
            <div class="card col-md-4">
                <img
                    src="imagen_calzado/unisex.jpg"
                    class="card-img-top"
                    alt=""
                    width="304"
                    height="236"
                    id="imgCalzado"
                >
            </div>
            <div class="col-md-6">
                <label class="btn btn-primary btn-sm file ">
                    Cargar Imagen <input class="form-control img col-md-10" id="file" name="file" type="file" style="display: none;">
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Cantidad</label>
            <div class="col-md-10">
                <input type="number" class="form-control" name="cantidad" id="cantidad">
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Numero</label>
            <div class="col-md-10">
                <input type="number" class="form-control" name="numero" id="numero">
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Categoria</label>
            <div class="col-md-10">
                <select class="form-select" multiple  aria-label="multiple select example" id="categoria" name="categoria[]">
                    <option selected disabled value="">Categoria</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id_categoria }}">{{ $cat->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Precio</label>
            <div class="col-md-10">
                <input type="number" class="form-control" name="precio" id="precio">
            </div>
        </div>
    </form>
    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<script>
    function guardar() {
        $.ajax({
            data: new FormData($("#frmZapato")[0]),
            type: 'post',
            url: 'api/Agregar/Zapato',
            dataType: 'json',
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function(){
                $("#mascara").css("display", "block");
            },
            success: function(response) {
                $("#mascara").css("display", "none");
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


    $seleccionArchivos.addEventListener("change", () => {

        const archivos = $seleccionArchivos.files;

        if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }

        const primerArchivo = archivos[0];
        const objectURL = URL.createObjectURL(primerArchivo);
        $imagenPrevisualizacion.src = objectURL;
    });
</script>
