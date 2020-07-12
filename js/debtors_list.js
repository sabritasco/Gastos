(function ($) {
    "use strict";

    $('#dataTable').DataTable({
        "paging": false,
        "info": false,
        "searching": false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: 'none',
                target: ''
            }
        },
        "sAjaxSource": "tables/list_debtors.php",
        "aoColumns": [{
                mData: 'Acciones'
            },
            {
                mData: 'Nombre'
            },
            {
                mData: 'Correo'
            },
            {
                mData: 'Celular'
            }
        ],
        columnDefs: [{
                responsivePriority: -1,
                targets: 1,
            },

        ]
    });



})(jQuery);