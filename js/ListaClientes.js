$('.cliente').autocomplete({
    showNoSuggestionNotice: true,
    autoSelectFirst: true,
    noSuggestionNotice: 'Nenhum resultado encontrado',
    minChars : 1,
    serviceUrl: 'http://192.168.1.155/pedidos/inc/ajax-clientes-charlie.php?query=',
    onSelect: function (suggestion) {
            $('#cliente').val(suggestion.CODIGO + " " + suggestion.NOME);
    }
});
