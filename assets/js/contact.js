$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    //jQuery.validator.addMethod('answercheck', function (value, element) {
    //    return this.optional(element) || /^\bcat\b$/.test(value)
   // }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
					maxlength: 100

                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20,
					maxlength: 250
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "your name must consist of at least 2 characters"
                },
                subject: {
                    required: "come on, you have a subject, don't you?",
                    minlength: "your subject must consist of at least 4 characters"
                },
                number: {
                    required: "Please enter your number",
                    minlength: "your number must consist of at least 5 number"
                },
                email: {
                    required: "Please enter your email id"
                },
                message: {
                    required: "Please enter your message",
                    minlength: "your message must consist of at least 20 characters"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url: 'http://stagging.benchmarkagencies.com/contact_us/',
                    success: function() {
                       // $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                        //    $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
							$("#contactForm")[0].reset();
							//$('#contactForm :input').attr('enabled', 'enabled');


                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})