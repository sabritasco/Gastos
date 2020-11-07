(function ($) {
    "use strict";

    $('.table').DataTable({

        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: 'none',
                target: ''
            }
        },
        columnDefs: [{
            responsivePriority: 10001,
            targets: 1
        }, ],
        "paging": false,
        "ordering": false,
        "info": false,
        "searching": false
    });



    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });




})(jQuery);