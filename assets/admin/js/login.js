// validate the comment form when it is submitted
$(document).ready(function() {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");
    // validate signup form on keyup and submit
    $("#loginform").validate({
        rules: {
            tb_username: {
                required: true,
                lettersonly: true
            },
            tb_password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            tb_username: {
                required: "Please enter Username",
                lettersonly: "Only letters and underscore are allowed."
            },
            tb_password: {
                required: "Please enter Password",
                minlength: "Your password must consist of at least 6 characters"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "tb_username") {
                error.insertAfter("#div_un");
            } else if (element.attr("name") == "tb_password") {
                error.insertAfter("#div_pass");
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function() {
            document.getElementById("loginform").submit();
        }
    });
    $('#tb_password').bind("cut copy paste", function(e) {
        e.preventDefault();
    });
    //FORGOT PASSWORD
    $("#recoverform").validate({
        rules: {
            tb_emailaddress: {
                required: true,
                email: true
            }
        },
        messages: {
            tb_emailaddress: {
                required: "Please enter Email address",
                email: "Please enter a valid Email address"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "tb_emailaddress") {
                error.insertAfter("#div_un");
            }  else {
                error.insertAfter(element);
            }
        },
        submitHandler: function() {
            document.getElementById("recoverform").submit();
        }
    });
    //RESET PASSWORD
    $("#frmResetpass").validate({
        rules: {
            tb_npassword: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            tb_cpassword: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#tb_npassword"
            }
        },
        messages: {
            tb_npassword: {
                required: "Please enter New Password.",
                minlength: "Your password must be at least 6 characters long."
            },
            tb_cpassword: {
                required: "Please enter Confirm Password.",
                minlength: "Your password must be at least 6 characters long.",
                equalTo: "Please enter the same password as above"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "tb_npassword") {
                error.insertAfter("#div_pass");
            } else if (element.attr("name") == "tb_cpassword") {
                error.insertAfter("#div_cpass");
            }  else {
                error.insertAfter(element);
            }
        },
        submitHandler: function() {
            document.getElementById("frmResetpass").submit();
        }
    });
});