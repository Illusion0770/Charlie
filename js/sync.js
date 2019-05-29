$('#sync').on('click', function(){
    Sync();
});

function Sync(){
    var clientes = [];
    $('.cliente').each( function(){
         clientes[clientes.length] = $(this).val();
    });
    console.log(clientes);
    $.ajax({
        url: 'sync/sync.php',
        method: 'POST',
        data: {'clientes': clientes},
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
        }
    });

}