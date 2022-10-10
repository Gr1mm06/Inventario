<div class="row">
    <div class="col-md-6">
        <h2> Total Carrito : $ {{ $carrito['total_carrito'] }}</h2>
    </div>
    <div class="col-md-6" style="text-align: -webkit-right;">
        <button onclick="finalizar('{{ $carrito['id_carrito'] }}')" type="button" class="btn btn-success">
            Finalizar Compra
        </button>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <ul class="list-group shadow">
                @foreach($carritoDetalle as $car)
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2">{{ $car->zapato }}</h5>
                                <p class="font-italic text-muted mb-0 small">
                                   Modelo : {{ $car->codigo_modelo }} - {{ $car->modelo }}
                                </p>
                                <p class="font-italic text-muted mb-0 small">
                                    Cantidad : {{ $car->cantidad }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">Precio : $ {{ $car->precio }}</h6>
                                    <h6 class="font-weight-bold my-2">Total : $ {{ $car->total }}</h6>
                                </div>
                                <ul class="list-inline small">
                                    <a
                                        aria-current="page"
                                        onclick="eliminar('Eliminar','Carrito','{{ $car->id_zapato }}');"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Eliminar"
                                        class="pointer"
                                    >
                                        Eliminar
                                    </a>
                                </ul>
                            </div>
                            <img
                                src="imagen_calzado/{{ $car->foto}}"
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
<script>
    function finalizar(id) {
        let token = '{{csrf_token()}}';
        let post_data = {'id' : id, '_token' : token};
        $.ajax({
            data: post_data,
            type: 'post',
            url: 'api/Finalizar/Compra',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if(response === true){
                    alert('Compra realizada correctamente');
                    detalle('Inventario','ListaZapatos');
                }else{
                    alert('Error')
                }
            }
        });
    }
</script>
