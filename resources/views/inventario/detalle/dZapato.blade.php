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
                    <li>Agregar al carrito :
                        <div class="col-md-2">
                            <input
                                type="number"
                                name="cantidad"
                                id="cantidad"
                                max="{{ $zapato['cantidad'] }}"
                                min="1"
                            >
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="imagen_calzado/{{ $zapato['foto'] }}" width="90%" height="95%">
            </div>
        </div>
    </div>
    <div class="footer d-flex flex-column">
        <div class="row r4">
            <button class="btn_det" onclick='guardarCarrito("{{ $id }}")'>
                <i class="fa-solid fa-cart-arrow-down"></i>
                Agregar al Carrito
            </button>
        </div>
    </div>
</div>
<script>
    function guardarCarrito(id) {
        let cantidad = $('#cantidad').val();
        let token = '{{csrf_token()}}';
        let post_data = {'id' : id, 'cantidad' : cantidad , '_token' : token};

        if (cantidad <= 0) {
            alert('La cantiddad no puede ser menor o igual a cero');
        }
        $.ajax({
            data: post_data,
            type: 'post',
            url: 'api/Agregar/Carrito',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if(response === true){
                    alert('Zapaato agregado al carrito');
                }else{
                    alert('Error')
                }
            }
        });
    }
</script>
