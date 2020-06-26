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
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                remote: {
                    url: "check-data.php",
                    type: "post",
                    data: {
                        mobile: function () {
                            return $("#mobile").val();
                        }
                    }
                },
            },
        },

        messages: {
            name: "You must enter the name",
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
            },
        },

    });

    $('.validate-form .input').each(function () {
        $(this).focus(function () {
            $(this).parent().removeClass('alert-validate');
        });
    });



})(jQuery);