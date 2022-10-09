<div class="container py-4 my-4 mx-auto d-flex flex-column">
    <div class="header">
        <div class="row r1">
            <div class="col-md-9 abc">
                <h1> {{ $zapato['descripcion'] }} </h1>
            </div>
        </div>
    </div>
    <div class="container-body mt-4">
        <div class="row r3">
            <div class="col-md-5 p-0 klo">
                <ul>
                    <li>Modelo : {{ $zapato['codigo_modelo'] }} - {{ $zapato['modelo'] }}</li>
                    <li>Categoria : {{ $zapato['categoria'] }}</li>
                    <li>Marca : {{ $zapato['marca'] }}</li>
                    <li>Numero : {{ $zapato['numero'] }}</li>
                    <li>Precio : $ {{ $zapato['precio'] }}</li>
                    <li>Cantidad Disponible : {{ $zapato['cantidad'] }}</li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="imagen_calzado/{{ $zapato['foto'] }}" width="90%" height="95%">
            </div>
        </div>
    </div>
    <div class="footer d-flex flex-column">
        <div class="row r4">
            <button class="btn_det" onclick="editar('Detalle','Zapato','{{ $zapato['id_zapato'] }}')">
                <i class="fa-solid fa-cart-arrow-down"></i>
                Agregar al Carrito
            </button>
        </div>
    </div>
</div>
