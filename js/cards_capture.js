(function ($) {
    "use strict";

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


})(jQuery);