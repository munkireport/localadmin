$(document).on('appReady', function(e, lang) {
    $.getJSON( appUrl + '/module/localadmin/report/' + serialNumber, function( data ) {
        $('.localadmin-users').text(data.users)
    });
});