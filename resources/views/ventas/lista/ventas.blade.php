<div class="row p-3">
    <div class="col-md-6">
        <h2>Lista de Ventas</h2>
    </div>
</div>

<div class="table-responsive col-md-12" id="listaZapato">
    <table class="table table-striped table-sm" id="tabla">
        <thead>
        <tr>
            <th scope="col">Num. Venta</th>
            <th scope="col">Total</th>
            <th scope="col">Fecha</th>
            <th scope="col">Detalle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $v)
            <tr>
                <td>{{ $v->id_venta }}</td>
                <td>$ {{ $v->total_venta  }}</td>
                <td>{{ $v->fecha_venta }}</td>
                <td>
                    <a
                        aria-current="page"
                        onclick="editar('Detalle','Venta','{{ $v->id_venta }}');"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Detalle"
                    >
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        document.title = 'Inventario | Reporte Ventas';
        tabla();
    } );

</script>
