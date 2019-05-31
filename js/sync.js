$('#sync').on('click', function(){
    Sync();
});

function Sync(){
    var clientes = [];
    var contador = 0;
    $('#TabelaListaBackup tbody tr').each( function(){
        var cliente = $(this).find('.cliente').val();
        var ArrayCliente = cliente.split(' - ');
        var ObjetoCliente = {};
        ObjetoCliente.pasta =  $(this).find('.pastas').text();
        ObjetoCliente.codigocliente = ArrayCliente[0];
        ObjetoCliente.nomecliente = ArrayCliente[1];

        clientes[contador] = ObjetoCliente;
        contador++;
    });

    $.ajax({
        url: 'sync/sync.php',
        method: 'POST',
        data: {'clientes' : JSON.stringify(clientes)},
        context: document.body,
        success : function (el) {
            retorno =  el;
        }
    }).done(function () {
        if (retorno === 'Sincronizando'){
            new PNotify({
                text: retorno,
                type: 'success',
                styling: 'bootstrap3',
                buttons: {
                    closer: true,
                    sticker: false
                }
            });
        }else{

        }
    });

}