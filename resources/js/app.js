import './bootstrap';


$(document).ready(function(){
    //action-confirm
    $('body').on('click','.action-confirm',function(ev) {
        ev.preventDefault();
        var button = $(this);

        actionConfirm(button);
    });

    //action-execute
    $('body').on('click','.action-execute',function(ev) {
        ev.preventDefault();
        var element = $(this);

        actionExecute(element);
    });

    //onchange-load
    $('body').on('onchange','.onchange-load',function(ev) {
        ev.preventDefault();
        var element = $(this);

        onchangeLoad(element);
    });
});


function actionConfirm(button) {
    Swal.fire({
        title: 'Confirmar',
        text: button.data('text-confirm'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Confirmado!',
            'Esta acción se va a realizar.',
            'success'
            )

            var href = button.prop('href');
            if ( typeof href !== "undefined" ) {
                window.location.href = href;
            }
            else {
                var func = button.data('action-confirm');
                window[func](button);
            }
        }
    })

    /* alertify.confirm('Confirmar',button.data('text-confirm'), function(){
        var href = button.prop('href');
        if ( typeof href !== "undefined" ) {
            window.location.href = button.prop('href');
        }
        else {
            var func = button.data('action-confirm');
            window[func](button);
        }
    }, function() {}); */

    return false;
}


function actionExecute(element) {
    var href = element.prop('href');
    if ( typeof href !== "undefined" ) {
        window.location.href = href;
    }
    else {
        var func = element.data('action-confirm');
        window[func](element);
    }
}


function onchangeLoad(element) {
    var url = element.data('action-url');
    url.replace('{val}',element.val()).replace('[val]',element.val());
    window.location.href = url;
}