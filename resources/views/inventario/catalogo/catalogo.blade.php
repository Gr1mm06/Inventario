<div class="row p-3">
    <div class="col-md-12">
        <h2>Catalogo de Zapatos</h2>
    </div>
    <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="categoria">
            <option disabled selected>Categorias</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id_categoria }}">{{ $cat->descripcion }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4" >
        <button onclick="Buscar()" style="text-align: -webkit-right;" type="button" class="btn btn-info">
            Buscar
        </button>
    </div>
</div>
<div class="table-responsive col-md-12">
    <div class="row" id="catalogo">
        @foreach($lista as $lis => $l)
            <div class="card col-md-4">
                <img
                    src="imagen_calzado/{{ $l['foto'] }}"
                    class="card-img-top"
                    alt="{{ $l['foto'] }}"
                    width="304"
                    height="236"
                >
                <div class="card-body">
                    <h5 class="card-title">Descripcion : {{ $l['descripcion'] }} </h5>
                    <p class="card-text">Modelo : {{ $l['codigo_modelo'] }} - {{ $l['modelo'] }}</p>
                    <p class="card-text">Marca : {{ $l['marca'] }}</p>
                    <p class="card-text">Categoria : {{ $l['categoria'] }}</p>
                </div>
                <div class="card-body">
                    <button class="btn_det" onclick="editar('Detalle','Zapato','{{ $l['id_zapato'] }}')">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Detalle
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    const Buscar = () => {
        let categoria = $('#categoria').val();
         if (categoria) {
             $('#catalogo').load(`api/Inventario/Buscar/${ categoria }`);
         }
    }
</script>
