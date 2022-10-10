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
<script>
    $(document).ready(function() {
        tabla();
    } );
</script>
