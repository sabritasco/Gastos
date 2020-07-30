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
            expense_date: {
                required: true,
            },
            amount: {
                required: true,
                number: true,
            },


        },

        messages: {

            debtor: {
                required: "You must select the debtor",
            },
            destination: {
                required: "You must select the destination of the expense",
            },
            tag: {
                required: "You must enter the expense tag",
            },
            expense_date: {
                required: "You must select the date of the expense",
            },
            amount: {
                required: "You must enter the amount of the expense",
                number: "You must enter a valid amount",
            },

        },

    });
    //Validar formulario

    //Mostrar calendarios
    $.datetimepicker.setLocale('es');
    $("#expense_date").datetimepicker({
        timepicker: false,
        format: 'Y/m/d',
        validateOnBlur: false,
    });

    $("#calendar_one").click(function () {
        $("#expense_date").datetimepicker('show');
    });



})(jQuery);