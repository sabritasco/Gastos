(function ($) {
    "use strict";

    var validator = $("#form-validate").validate({

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
                email: true
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
            },
        },

        messages: {
            name: "You must enter the name",
            last_name: "You must enter the last name",
            email: {
                required: "You must enter the email",
                email: "Enter a valid email address ",
            },
            mobile: {
                required: "You must enter the phone number",
                digits: "Enter a valid phone number",
                minlength: "Enter a valid phone number",
            },
        },

    });

    $('.validate-form .input').each(function () {
        $(this).focus(function () {
            $(this).parent().removeClass('alert-validate');
        });
    });



})(jQuery);