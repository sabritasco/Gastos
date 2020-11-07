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
                number: true,
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
                number: true,
            },
            month: {
                required: true,
            },
            year: {
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
                required: "Debe ingresar los ultimos 4 digitos de la tarjeta.",
                remote: "Ya existe una tarjeta con esa terminación, verifique que no esta duplicandola.",
            },
            identifier_cards: {
                required: "Debe ingresar un identificador para esta tarjeta.",
                remote: "Ya existe una tarjeta con ese identificador, verifique que no esta duplicandola.",
            },
            type: {
                required: "Debe seleccionar el tipo de tarjeta.",
            },
            limit: {
                required: "Debe ingresar el limite de credito.",
            },
            cutoff: {
                required: "Debe ingresar la fecha de corte de la tarjeta.",
                digits: "Debe ingresar el día de corte de la tarjeta en numero entero.",
                range: "Los meses no tienen mas de 31 días, no se haga menso.",
            },
            balance: {
                required: "Debe ingrtesar el balande de la tarjeta al día de hoy.",

            },
            month: {
                required: "Debe seleccionar el mes.",
            },
            year: {
                required: "Debe seleccionar el año.",
            },
            institution: {
                required: "Debe ingresar el nombre de la institución bancaria.",
            },
            phone: {
                required: "Debe ingresar el numero de contacto de la institución bancaria.",
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


})(jQuery);