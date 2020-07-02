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
            digits_cards: {
                required: true,
                digits: true,
                minlength: 4,
                maxlength: 4,
                remote: {
                    url: "check-data.php",
                    type: "post",
                    data: {
                        digits_cards: function () {
                            return $("#digits_cards").val();
                        }
                    }
                },
            },
            identifier_cards: {
                required: true,
                remote: {
                    url: "check-data.php",
                    type: "post",
                    data: {
                        identifier_cards: function () {
                            return $("#identifier_cards").val();
                        }
                    }
                },
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
                digits: true,
                range: [1, 31]
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
            digits_cards: {
                required: "You must enter the last 4 digits",
                remote: "You already have a card with that termination",
            },
            identifier_cards: {
                required: "You must enter an identifier for the card",
                remote: "you already have a card with that identifier",
            },
            type: {
                required: "You must select the type of card",
            },
            limit: {
                required: "You must enter the credit limit",
            },
            cutoff: {
                required: "You must enter the card cut day",
            },
            balance: {
                required: "You must enter the balance",

            },
            expiration: {
                required: "You must select the expiration date",
            },
            institution: {
                required: "You must enter the name of the bank",
            },
            phone: {
                required: "You must enter the bank contact number",
            },

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
    $("#expiration").datetimepicker({
        timepicker: false,
        format:'m/Y',
        validateOnBlur: false,
    });
      
    $("#calendar_one").click(function () {
        $("#expiration").datetimepicker('show');
    });


})(jQuery);