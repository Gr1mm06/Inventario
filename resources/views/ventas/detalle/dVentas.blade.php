<div class="row">
    <div class="col-md-6">
        <h2> # Venta : {{ $venta['id_venta'] }}</h2>
        <h2> Total Venta : $ {{ $venta['total_venta'] }}</h2>
    </div>
    <div class="col-md-6" style="text-align: -webkit-right;">
        <button onclick="detalle('Ventas','Lista')" type="button" class="btn btn-success">
            Regresar
        </button>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <ul class="list-group shadow">
                @foreach($ventaDetalle as $ven)
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2">{{ $ven->zapato }}</h5>
                                <p class="font-italic text-muted mb-0 small">
                                    Modelo : {{ $ven->codigo_modelo }} - {{ $ven->modelo }}
                                </p>
                                <p class="font-italic text-muted mb-0 small">
                                    Cantidad : {{ $ven->cantidad }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">Total : $ {{ $ven->total }}</h6>
                                </div>
                            </div>
                            <img
                                src="imagen_calzado/{{ $ven->foto}}"
                                alt=""
                                width="200"
                                class="ml-lg-5 order-1 order-lg-2"
                            >
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
