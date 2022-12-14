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
        <select class="form-select"  aria-label="Default select example" id="modelo">
            <option value="0" selected disabled>Modelo</option>
            @foreach($modelos as $mo)
                <option value="{{ $mo->id_modelo }}">{{ $mo->codigo_modelo }} - {{ $mo->descripcion }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="categoria">
            <option value="0" disabled selected>Categorias</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id_categoria }}">{{ $cat->descripcion }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4" >
        <button onclick="buscarLista()" style="text-align: -webkit-right;" type="button" class="btn btn-info">
            Buscar
        </button>
    </div>
</div>

<div class="table-responsive col-md-12" id="listaZapato">
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
                    <a
                        aria-current="page"
                        onclick="editar('Editar','Zapato','{{ $l['id_zapato'] }}');"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Editar"
                    >
                        <i  class="fa-solid fa-pen-to-square pointer"></i>
                    </a>
                    <a
                        aria-current="page"
                        onclick="eliminar('Eliminar','Zapato','{{ $l['id_zapato'] }}');"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Eliminar"
                    >
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
        tabla();
    } );

    const buscarLista = () => {
        let modelo = $('#modelo').val();
        let categoria = $('#categoria').val();
        if (categoria || modelo) {
            if(!modelo) {
                modelo = 0;
            }

            if(!categoria) {
                categoria = 0;
            }

            $('#listaZapato').load(`api/Inventario/ListaBusqueda/${ modelo }/${ categoria }`);
        } else {
            alert('Seleccione un parametro de busqueda');
        }
    }
</script>
