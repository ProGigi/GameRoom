let configGame = {
    inputs: [
        'input[name=game]'
    ], // Pola wpisywania
    maxLimit:           0,                      // 0 = nolimit
    reactToFocus:       true,                   // Czy ma reagować na kliknięcie w pole
    reactToTyping:      true,                   // Czy ma reagować na wpisywanie
    hintsUrl:           "get-autor.php",          // Link do pliku z podpowiedziami
    autoFocus:          false,                   // Auto focus na pole
    searchDelay:        10,                    // Opóźnienie wyszukiwania po kliknięciu klawisza
};
// Pobieranie hintsGame i pracowników
$(document).ready(function(){
    hintsGame();
    configGame.inputs.forEach((e,i) => {
        $(e).on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
    })
    if (configGame.autoFocus) {
        $(configGame.inputs[0]).focus();
    }
});
function performFillGame(value) {
    getUserAutor(value);
}
function getUserAutor(id) {
    $.ajax({
        url: configGame.hintsUrl,
        type: 'POST',
        data: {
            action: 'getData',
            idAutor: id
        },
        success: function(response) {
            //console.log('success ');
            var array = $.parseJSON(response);
            //console.log(array);
            $('#Firma').val(array.ImieNazwisko);
            $('#bookAutorID').val(array.Id_Autor);
            //console.log('end success');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('error: '+textStatus);
        }
    });
}
function hintsGame() {
    var hintsGame = [];
    $.ajax({
        url: configGame.hintsUrl, // <- link z konfiguracji
        type: 'POST',
        data: {
            idAutor: 0,
            action: 'getHints'
        },
        success: function(response) {
            console.log(response);
            var array = $.parseJSON(response);
            $.each(array, function(i, e){
                var obj = {
                    label: e.Id_Autor + ' ' + e.Name_Autor+' '+e.SName_Autor,
                    value: e.Id
                };
                hintsGame.push(obj);
            });
        },
        error: function() {
            console.log('error: Cant get hints!');
        }
    });
    if (configGame.reactToFocus) {
        configGame.inputs.forEach((e,i) => {
            $(e).autocomplete({
                source: hintsGame,
                minLength: 0,
                delay: configGame.searchDelay,
                select: function (event, ui) {
                    setTimeout(function() {
                        $(e).val(ui.item.label);
                        performFillGame(ui.item.value);
                    }, 200);
                }
            }).on('focus', function() {            
                $(e).autocomplete("search", "");
            });
        })
    }
    if (configGame.reactToTyping) {
        configGame.inputs.forEach((e,i) => {
            $(e).autocomplete({
                source: hintsGame,
                minLength: (configGame.reactToFocus) ? 0 : 1,
                autoFocus: configGame.autoFocus,
                delay: configGame.searchDelay,
                select: function (event, ui) {
                    setTimeout(function() {
                        $(e).val(ui.item.label);
                        performFillGame(ui.item.value);
                    }, 200);
                }
            })
        })
    }
    // Nadpisanie funkcji filtrowania
    // dodany znak ^ oznaczający początek wyrazu
    $.ui.autocomplete.filter = function (array, term) {
        // console.log('term: '+term);
        var str = $.ui.autocomplete.escapeRegex(term).replace(/[\(].*[\)]/gi, "");
        var matcher = new RegExp("(^|\\s)" + str, "i");
        // console.log('matcher: ' + matcher);
        if (configGame.maxLimit == 0) {
            return $.grep(array, function (value) {
                return matcher.test(value.label || value.value || value);
            });
        } else {
            return $.grep(array, function (value) {
                return matcher.test(value.label || value.value || value);
            }).slice(0,configGame.maxLimit);
        }
    };
}