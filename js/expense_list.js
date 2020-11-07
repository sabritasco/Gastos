(function ($) {
    "use strict";

    $('#dataTable').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: 'none',
                target: ''
            }
        },
        
    });

})(jQuery);