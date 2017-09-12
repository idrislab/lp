function table(element, buttons) {

    if (typeof buttons === 'undefined' || buttons === false) {
        dom = 'frtip';
        buttons = [];
    } else {
        dom = 'Bfrtip';
        buttons = [
            {
                extend: "excel",
                className: "btn btn-sm"
            },
            {
                extend: "csv",
                className: "btn btn-sm"
            },
            {
                extend: "pdfHtml5",
                className: "btn btn-sm"
            },
            {
                extend: "print",
                className: "btn btn-sm"
            }];
    }

    return $(element).DataTable({
        paging: true,
        ordering: true,
        info: true,
        responsive: true,
        dom: dom,
        buttons: buttons,
        "language": {
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Seguinte",
                "previous": "Anterior"
            },
            "info": "A mostrar de _START_ até _END_ de _TOTAL_ registos",
            zeroRecords: "Não há dados a mostrar",
            search: "",
            searchPlaceholder: "Pesquisar",
            "loadingRecords": "A carregar...",
            "processing": "A processar..."
        }
    });
}

function notify(json, type, title) {
    var errors = '';

    $.each(json, function (key, value) {
        errors += value + '</br>';
    });

    new PNotify({
        title: title,
        type: type,
        text: errors,
        nonblock: {
            nonblock: true
        },
        styling: 'bootstrap3',
        hide: true,
        addclass: 'translucent',
        delay: 5000
    });
}

/**
 * Thanks to https://remysharp.com/2010/07/21/throttling-function-calls/
 */
function throttle(fn, threshhold, scope) {
    threshhold || (threshhold = 250);
    var last,
        deferTimer;
    return function () {
        var context = scope || this;

        var now = +new Date,
            args = arguments;
        if (last && now < last + threshhold) {
            // hold on to it
            clearTimeout(deferTimer);
            deferTimer = setTimeout(function () {
                last = now;
                fn.apply(context, args);
            }, threshhold);
        } else {
            last = now;
            fn.apply(context, args);
        }
    };
}

$('a#notifications').click(function (e) {
    var badge = $(this).find('.badge');

    $.ajax({
        method: "POST",
        url: "/notifications/markAsRead",
        data: {
            "_token" : $('meta[name=csrf-token]').attr('content')
        }
    }).done(function (data) {
        badge.text('');
    });
});