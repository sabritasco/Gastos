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
            name: "You must enter the name",
            last_name: "You must enter the last name",
            email: {
                required: "You must enter the email",
                remote: "There is already a debtor registered with that email",
            },
            mobile_debtors: {
                required: "You must enter the phone number",
                remote: "There is already a debtor registered with that mobile",
            },
        },

    });



})(jQuery);