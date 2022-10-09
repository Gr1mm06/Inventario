<div class="row">
    <div class="col-md-6">
        <h2>Crear Zapato</h2>
    </div>
    <div class="col-md-6" style="text-align: -webkit-right;">
        <button onclick="guardar()" type="button" class="btn btn-success">
            Agregar
        </button>
        <button onclick="detalle('salaJuntas','catalogo')" type="button" class="btn btn-danger">
            Cancelar
        </button>
    </div>
</div>
<div class="table-responsive">
    <h4>Informacion del Zapato</h4>
    <form class="form-horizontal" id="frmZapato" name="frmZapato" autocomplete="off">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Modelo</label>
            <div class="col-md-10">
                <select class="form-select"  aria-label="Default select example">
                    <option selected disabled>Modelo</option>
                    @foreach($modelos as $mo)
                        <option value="{{ $mo->id_modelo }}">{{ $mo->codigo_modelo }} - {{ $mo->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Marca</label>
            <div class="col-md-10">
                <select class="form-select"  aria-label="Default select example">
                    <option selected disabled>Marca</option>
                    @foreach($modelos as $mo)
                        <option value="{{ $mo->id_modelo }}">{{ $mo->codigo_modelo }} - {{ $mo->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="icono" class="col-md-2 control-label">Foto</label>
            <div class="col-md-10">
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
                <select class="form-select"  aria-label="Default select example">
                    <option selected disabled>Marca</option>
                    @foreach($modelos as $mo)
                        <option value="{{ $mo->id_modelo }}">{{ $mo->codigo_modelo }} - {{ $mo->descripcion }}</option>
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
            url: 'api/zapatos/agregar',
            dataType: 'json',
            cache       : false,
            contentType : false,
            processData : false,
            success: function(response) {
                if(response === true){
                    alert('Zapato creado correctamente');
                    detalle('salaJuntas','catalogo');
                }else{
                    alert('Error')
                }
            }
        });
    }
</script>
