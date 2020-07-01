(function ($) {
    "use strict";


    //Validar formulario
    var validator = $("#form-validate").validate({

        focusCleanup: true,
        errorPlacement: function (error, element) {
            $(element).closest("div.caja").find("div.validate-input").attr("data-validate", error.text());
        },
        highlight: function (element, errorClass, validClass) {
            var thisAlert = $(element).closest(".caja").find(".validate-input");
            thisAlert.addClass('alert-validate');
        },
        unhighlight: function (element, errorClass, validClass) {
            var thisAlert = $(element).closest(".caja").find(".validate-input");
            thisAlert.removeClass("alert-validate");
        },



        rules: {
            digits: {
                required: true,
                digits: true,
                minlength: 4,
                maxlength: 4
            },
            identifier: {
                required: true
            },
            type: {
                required: true,
            },
            limit: {
                required: function (element) {
                    return $("#type").val() == 'Credito';
                },
                digits: true,
            },
            cutoff: {
                required: function (element) {
                    return $("#type").val() == 'Credito';
                },
            },
            balance: {
                required: function (element) {
                    return $("#type").val() == 'Debito';
                },
                digits: true,
            },
            expiration: {
                required: true,
            },
            institution: {
                required: true,
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
            },

        },

        messages: {
            /*name: "You must enter the name",
            last_name: "You must enter the last name",
            email: {
                required: "You must enter the email",
                email: "Enter a valid email address ",
                remote: "There is already a debtor registered with that email",
            },
            mobile: {
                required: "You must enter the phone number",
                digits: "Enter a valid phone number",
                minlength: "Enter a valid phone number",
                remote: "There is already a debtor registered with that mobile",
            },*/
        },

    });
    //Validar formulario


    //Mostrar y ocultar campos de Tarjetas de Debito y Credito
    $('#type').on('change', function () {
        if ($(this).find(":selected").val() == "Credito") {
            if (!$('#debito').is(':hidden')) {
                $('#balance').val("");
                $('#balance').valid();
                $('#limit, #cutoff').valid();
                $('#debito').slideUp("slow");
            }
            if ($('#credito').is(':hidden')) {
                $('#credito').slideDown("slow");
                $('#limit, #cutoff').valid();
            }
        }
        if ($(this).find(":selected").val() == "Debito") {
            if (!$('#credito').is(':hidden')) {
                $('#limit, #cutoff').val("");
                $('#limit, #cutoff').valid();
                $('#balance').valid();
                $('#credito').slideUp("slow");
            }
            if ($('#debito').is(':hidden')) {
                $('#debito').slideDown("slow");
                $('#balance').valid();
            }
        }
    });
    //Mostrar y ocultar campos de Tarjetas de Debito y Credito

    //Mostrar calendarios
    $.datetimepicker.setLocale('es');
    $("#cutoff").datetimepicker({
        timepicker:false,
        format:'Y/m/d',
        maxDate: 0,
        theme:'dark',
    });

    


    /*
          submitHandler: function(form) {
            $("#enviar").attr("disabled", true);
            form.submit();
        }	
    });

    $.datetimepicker.setLocale('es');
    $('#fecha_archiva').datetimepicker({
        disabledWeekDays:[0, 6,],
        timepicker:false,
        format:'Y/m/d',
        maxDate: 0
    });

    $("#activa_1").click(function() {
        $('#fecha_archiva').focus();
    });*/

})(jQuery);