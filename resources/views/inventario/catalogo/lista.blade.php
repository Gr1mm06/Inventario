<div class="row p-3">
    <div class="col-md-6">
        <h2>Lista de Zapatos</h2>
    </div>
    <div class="col-md-6" style="text-align: -webkit-right;">
        <button onclick="detalle('Nuevo','Zapato')" type="button" class="btn btn-success">
            Agregar
        </button>
    </div>
    <div class="col-md-4">
        <select class="form-select"  aria-label="Default select example">
            <option selected disabled>Modelo</option>
            @foreach($modelos as $mo)
                <option value="{{ $mo->id_modelo }}">{{ $mo->codigo_modelo }} - {{ $mo->descripcion }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select class="form-select" aria-label="Default select example">
            <option disabled selected>Categorias</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id_categoria }}">{{ $cat->descripcion }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4" >
        <button onclick="detalle('Inventario','nuevo')" style="text-align: -webkit-right;" type="button" class="btn btn-info">
            Buscar
        </button>
    </div>
</div>

<div class="table-responsive col-md-12">
    <table class="table table-striped table-sm" id="tabla">
        <thead>
        <tr>
            <th scope="col">Descripcion</th>
            <th scope="col">Modelo</th>
            <th scope="col">Codigo del Modelo</th>
            <th scope="col">Marca</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Numero</th>
            <th scope="col">Categorias</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lista as $list => $l)
            <tr>
                <td>{{ $l['descripcion'] }}</td>
                <td>{{ $l['modelo'] }}</td>
                <td>{{ $l['codigo_modelo'] }}</td>
                <td>{{ $l['marca'] }}</td>
                <td>{{ $l['cantidad'] }}</td>
                <td>{{ $l['numero'] }}</td>
                <td>{{ $l['categoria'] }}</td>
                <td>$ {{ $l['precio'] }}</td>
                <td>
                    <a aria-current="page" onclick="editar('Editar','Zapato','{{ $l['id_zapato'] }}');">
                        <i  class="fa-solid fa-pen-to-square pointer"></i>
                    </a>
                    <a aria-current="page" onclick="eliminar('salaJuntas','borrar','{{ $l['id_zapato'] }}');">
                        <i class="fa-solid fa-trash pointer"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        document.title = 'Inventario | Lista de zapatos';
        // Setup - add a text input to each footer cell
        tabla();
    } );
</script>
