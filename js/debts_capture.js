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
        submitHandler: function (form) {
            $("#send").attr("disabled", true);
            form.submit();
        },

        rules: {

            debtor: {
                required: true,
            },
            destination: {
                required: true,
            },
            tag: {
                required: true,
            },
            debt_date: {
                required: true,
            },
            amount_partial: {
                required: true,
                number: true,
            },
            number_payments: {
                required: true,
            },


        },

        messages: {

            debtor: {
                required: "Debe seleccionar a quien se le cargara la deuda.",
            },
            destination: {
                required: "Debe seleccionar de donde se realizo el pago.",
            },
            tag: {
                required: "Debe ingresar que fue lo comprado.",
            },
            debt_date: {
                required: "Debe seleccionar la fecha de compra",
            },
            amount_partial: {
                required: "Debe ingresar el monto mensual de la deuda",
                number: "Debe ingresar el monto en numero.",
            },
            number_payments: {
                required: "Debe seleccionar el numero de pagos pendientes.",
            },

        },

    });
    //Validar formulario

    //Mostrar calendarios
    $.datetimepicker.setLocale('es');
    $("#debt_date").datetimepicker({
        timepicker: false,
        format: 'Y/m/d',
        validateOnBlur: false,
    });

    $("#calendar_one").click(function () {
        $("#debt_date").datetimepicker('show');
    });



})(jQuery);