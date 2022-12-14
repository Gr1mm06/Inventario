
const detalle = (folder, view) => {
    $('html,body').animate({
        scrollTop: 0
    }, 0);
    $('#detalle').load( 'api/' + folder + '/' + view );
    mascara();
    $("body").removeClass("sidebar-open");
}

const mascara = () => {
    $("#mascara").css("display", "block");
    setTimeout(function() {
        $("#mascara").css("display", "none");
    }, 2000);
}

const editar = (folder, view, id) => {
    $('html,body').animate({
        scrollTop: 0
    }, 0);
    $('#detalle').load( 'api/' + folder + '/' + view + '/' + id);
    mascara();
    $("body").removeClass("sidebar-open");
}

const eliminar = (folder, view, id) => {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax(
        {
            url: 'api/' + folder + '/' + view + '/' + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (response){
                if(response == true){
                    alert('Zapato eliminado');
                    detalle('Inventario','ListaZapatos');
                }else{
                    alert('Error');
                }
            }
        }
    );
}

const tabla = () => {
    $('#tabla tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control" type="text" placeholder="'+title+'" />' );
    } );

    // DataTable
    var table = $('#tabla').DataTable(
        {
            initComplete: function () {
                var x = 1;
                this.api().columns().every( function () {
                    var column = this;
                    if(x == 1){
                        var select = $('<select class="form-control"><option value="">SELECCIONA</option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    }  x++;  } );
            }
        }
    );

    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
}
