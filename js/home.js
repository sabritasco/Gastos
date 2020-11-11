(function ($) {
    "use strict";


    var ids = [];
    $("#page-top").find(".table").each(function () {
        ids.push(this.id);
        $("#" + this.id).DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: 'none',
                    target: ''
                }
            },
            columnDefs: [{
                    responsivePriority: 10001,
                    targets: 1,
                },

            ],
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false
        });

    });



    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    });


    $("#tabs").on('click', '.nav-link', function (event) {
        event.preventDefault();
        var tabindex = $(this).data('index');
        sessionStorage.setItem('tabActiva', tabindex);
    });





    
    if (location.hash) {
        $('a[href=\'' + location.hash + '\']').tab('show');
    }
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('a[href="' + activeTab + '"]').tab('show');
    }

    $('body').on('click', 'a[data-toggle=\'tab\']', function (e) {
        e.preventDefault()
        var tab_name = this.getAttribute('href')
        if (history.pushState) {
            history.pushState(null, null, tab_name)
        } else {
            location.hash = tab_name
        }
        localStorage.setItem('activeTab', tab_name)

        $(this).tab('show');
        return false;
    });
    $(window).on('popstate', function () {
        var anchor = location.hash ||
            $('a[data-toggle=\'tab\']').first().attr('href');
        $('a[href=\'' + anchor + '\']').tab('show');
    });




})(jQuery);