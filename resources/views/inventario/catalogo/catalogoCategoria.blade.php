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
