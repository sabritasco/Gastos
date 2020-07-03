(function ($) {
    "use strict";

    $('#dataTable').DataTable({
        responsive: true,
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
                responsivePriority: 1,
                targets: 0,
            },
            {
                responsivePriority: 2,
                targets: 1,
            }
        ]
    });



})(jQuery);