(function ($) {
    "use strict";

    var validator = $("#form-validate").validate({

        focusCleanup: true,
        errorPlacement: function (error, element) {
            $(element).parent().attr("data-validate", error.text());
        },

        highlight: function (element, errorClass, validClass) {
            var thisAlert = $(element).parent();
            thisAlert.addClass('alert-validate');
        },
        unhighlight: function (element, errorClass, validClass) {
            var thisAlert = $(element).parent();
            thisAlert.removeClass("alert-validate");
        },

        rules: {
            name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "check-data.php",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#email").val();
                        }
                    }
                }
            },
            mobile_debtors: {
                required: true,
                digits: true,
                minlength: 10,
                remote: {
                    url: "check-data.php",
                    type: "post",
                    data: {
                        mobile_debtors: function () {
                            return $("#mobile_debtors").val();
                        }
                    }
                },
            },
        },

        messages: {
            name: "Debe ingresar el nomre.",
            last_name: "Debe ingresar los apellidos.",
            email: {
                required: "Debe ingresar el correo electronico.",
                remote: "Ya existe un deudor con ese correo electronico, verifique que no lo este duplicando.",
            },
            mobile_debtors: {
                required: "Debe ingresar el numero celular.",
                remote: "Ya existe un deudor con ese numero celular, verifique que no lo este duplicando.",
            },
        },

    });



})(jQuery);