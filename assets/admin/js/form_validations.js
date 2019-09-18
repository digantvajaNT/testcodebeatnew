var site_url = 'http://192.168.0.155/nutclamp/';
$('#file_sliderimage').bind('change', function() {

    var ext = $('#file_sliderimage').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
        $.alert({
            title: 'Budlong',
            content: 'Please upload an Image file.',
        });
        $('#file_sliderimage').val('');
    }else{

    }
});
//Configuration
$('#file_homeimage').bind('change', function() {

    var ext = $('#file_homeimage').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
        $.alert({
            title: 'Budlong',
            content: 'Please upload an Image file.',
        });
        $('#file_homeimage').val('');
    }else{

    }
});
$('#file_catalog').bind('change', function() {

    var ext = $('#file_catalog').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['pdf','PDF']) == -1){
        $.alert({
            title: 'rrBudlong',
            content: 'Please upload PDF File.',
        });
        $('#file_catalog').val('');
    }else{

    }
});
$('#file_eventsimage').bind('change', function() {

    var ext = $('#file_eventsimage').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
        $.alert({
            title: 'Budlong',
            content: 'Please upload an Image file.',
        });
        $('#file_eventsimage').val('');
    }else{

    }
});
$('#file_newsimage').bind('change', function() {

    var ext = $('#file_newsimage').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
        $.alert({
            title: 'Budlong',
            content: 'Please upload an Image file.',
        });
        $('#file_newsimage').val('');
    }else{

    }
});

$('#file_allimage').bind('change', function() {

    var ext = $('#file_allimage').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1){
        $.alert({
            title: 'Budlong',
            content: 'Please upload an Image file.',
        });
        $('#file_allimage').val('');
    }else{

    }
});

//Ends
$(document).ready(function () {		
    $("input[type='radio']").on('ifChanged', function (e) {
       if(e.target.value == "yes") {
           $("#prd_section").show();
           $("#sld_section").hide();
       }
        if(e.target.value == "no") {
            $("#sld_section").show();
            $("#prd_section").hide();
        }
    });
	//DATE VALIDATION
	jQuery.validator.addMethod("greaterThan", 
		function(value, element, params) {
		
		    if (!/Invalid|NaN/.test(new Date(value))) {
		        return new Date(value) > new Date($(params).val());
		    }
		
		    return isNaN(value) && isNaN($(params).val()) 
		        || (Number(value) > Number($(params).val())); 
		},'Must be greater than {0}.');
		
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");
    //CHANGE PASSWORD
    $("#frmChangepass").validate({
        rules: {
            tb_newpassword: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            tb_cPassword: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#tb_newpassword"
            }
        },
        messages: {
            tb_newpassword: {
                required: "Please enter New Password.",
                minlength: "Your password must be at least 6 characters long."
            },
            tb_cPassword: {
                required: "Please enter Confirm Password.",
                minlength: "Your password must be at least 6 characters long.",
                equalTo: "Please enter the same password as above"
            }
        },

        submitHandler: function() {
            document.getElementById("frmChangepass").submit();
        }
    });
    //EDIT PROFILE
    $("#frmProfile").validate({
        rules: {
            tb_firstname: {
                required: true,
                lettersonly: true
            },
            tb_lastname: {
                required: true,
                lettersonly: true
            },
            tb_emailaddress: {
                required: true,
                email: true
            }
        },
        messages: {
            tb_slidertitle: {
                required: "Please enter First name."
            },
            tb_lastname: {
                required: "Please enter Last name."
            },
            tb_emailaddress: {
                required: "Please enter an Email address.",
                url: "Please enter an valid Email address."
            }
        },
        submitHandler: function () {
            document.getElementById("frmProfile").submit();
        }
    });
    //SLIDERS MODULE
    $("#frmSlider").validate({
        rules: {
           /* tb_slidertitle: {
                required: true
            },*/
           dd_products:{
               required: function() {
                   if($("input[name='r1']:checked").val() == "yes") {
                       return true
                   } else { return false; }
               },},

            /* file_sliderimage: {
                required: function() {
                    if($("input[name='r1']:checked").val() == "no" && $("#hn_slider_image").val() == '') {
                        return true
                    } else { return false; }
                },
                imageonly: true
            }, */
            tb_link: {
                url: true
            }
        },
        messages: {
            dd_products: {
                required: "Please select Product from list."
            },
            file_sliderimage: {
                required: "Please upload an Image.",
                extension: "Please upload an Image."
            },
            tb_link: {
                //required: "Please enter Redirection link.",
                url: "Please enter valid URL."
            }
        },
        submitHandler: function () {
            var selected_option = $("input[name='r1']:checked").val();
            document.getElementById("frmSliders").submit();
        }
    });
    //CATEGORY MODULE
    $("#frmCategory").validate({
        rules: {
            tb_categoryname: {
                required: true
            }
        },
        messages: {
            tb_categoryname: {
                required: "Please enter Category Name."
            }
        },
        submitHandler: function () {
            document.getElementById("frmCategory").submit();
        }
    });
	//CONFIGURATION MODULE 
	$("#frmConfig").validate({
        rules: {
            tb_contactno: {
                required: true
            },
            tb_webtitle: {
                required: true
            },
            tb_meta_description: {
                required: true
            },
            tb_meta_keywords: {
                required: true
            }
        },
        messages: {
            tb_contactno: {
                required: "Please enter Contact No."
            },
            tb_webtitle: {
                required: "Please enter website Title."
            },
            tb_meta_description: {
                required: "Please enter Description."
            },
            tb_meta_keywords: {
                required: "Please enter Keywords."
            }
        },
        submitHandler: function () {
            document.getElementById("frmConfig").submit();
        }
    });
	$("#frmSocialConfig").validate({
        rules: {
            tb_facebookurl: {
                url: true
            },
            tb_googleplus: {
                url: true
            },
            tb_twitterurl: {
                url: true
            },
            tb_linkedinurl: {
                url: true
            }
        },
        messages: {
            tb_facebookurl: {
                url: "Please enter valid URL."
            },
            tb_googleplus: {
                url: "Please enter valid URL."
            },
            tb_twitterurl: {
                url: "Please enter valid URL."
            },
            tb_linkedinurl: {
                url: "Please enter valid URL."
            }
        },
        submitHandler: function () {
            document.getElementById("frmSocialConfig").submit();
        }
    });
    //EVENTS PAGE 
    $("#frmEvents").validate({
        rules: {
            tb_title: {
                required: true
            },
            tb_venue: {
                required: true
            },
            tb_startdate: {
                required: true
            },
            tb_enddate: {
                required: true,
                greaterThan: "#tb_startdate"
            }
        },
        messages: {
            tb_title: {
                required: "Please enter Event title."
            },
            tb_venue: {
                required: "Please enter Event venue details."
            },
            tb_startdate: {
                required: "Please enter Start date."
            },
            tb_enddate: {
                required: "Please enter End date.",
                greaterThan: "End date must be greater than Start date."
            }
        },
         errorPlacement: function(error, element) {
            if (element.attr("name") == "tb_enddate") {
                error.insertAfter("#div_enddate");
            }  else {
                error.insertAfter(element);
            }
        },
        submitHandler: function () {
            document.getElementById("frmEvents").submit();
        }
    });
    //NEWS 
    $("#frmNews").validate({
        rules: {
            tb_title: {
                required: true
            }           
        },
        messages: {
            tb_title: {
                required: "Please enter News title."
            }           
        },         
        submitHandler: function () {
            document.getElementById("frmNews").submit();
        }
    });
    //CONTENT PAGES 
    $("#frmPage").validate({
        rules: {
            tb_pagetitle: {
                required: true
            }        
        },
        messages: {
            tb_pagetitle: {
                required: "Please enter title."
            }        
        },   
        errorPlacement: function(error, element) {
            if (element.attr("name") == "tb_description") {
                error.insertAfter("#cke_tb_description");
            }  else {
                error.insertAfter(element);
            }
        },      
        submitHandler: function () {
            document.getElementById("frmPage").submit();
        }
    });
    //EDIT CUSTOMER PAGE
    $("#frmEditUser").validate({
        rules: {
            tb_firstname: {
                required: true,
                lettersonly: true                
            },
            tb_lastname: {
                required: true,
                lettersonly: true
            },
            
            tb_contactno: {
                required: true
            },
            
            tb_address: {
            	required: true
            },
            tb_city: {
            	required: true,
            	lettersonly: true
            },
            dd_country: {
            	required: true
            },
            dd_province: {
            	required: true
            },
            dd_zipcode: {
            	required: true
            },
            tb_department: {
            	required: true,
            	 minlength: 3
            }            
        },
        messages: {
            tb_firstname: {
                required: "Please enter your First Name.",
                lettersonly: "Please enter valid Name."
            },
            tb_lastname: {
                required: "Please enter your Last Name.",
                lettersonly: "Please enter valid Name."
            },
           
            tb_contactno: {
                required: "Please enter Phone number."
            },
           
            tb_address: {
                required: "Please enter an Address."
            },
            tb_city: {
                required: "Please enter City.",
                lettersonly: "Please enter valid City name."
            },
            dd_country: {
            	required: "Please select  Country."
            },
            dd_province: {
            	required: "Please select State."
            },
            dd_zipcode: {
            	required: "Please enter Zip code."
            },
            tb_department: {
            	required: "Please enter Department Name.",
            	 minlength: "Department Name atleast 3 characters."
            }
        },
        errorClass: "error",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.form-field').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-field').removeClass('error');
			//$(element).parents('.control-group').addClass('success');
		},
        submitHandler: function() {
        	document.getElementById("frmEditUser").submit();          
        }
    });
});

//AJAX SCRIPT FOR STATE BINDING
function showStates(ctr_id) {
    if (ctr_id != '') {
        var formData = {
            ctr_id: ctr_id
        };
        $.ajax({
            type: "post",
            url: site_url + "user/get_states",
            cache: false,
            data: formData,
            beforeSend: function() {},
            complete: function() {},
            success: function(json) {
                //alert(json);
                try {
                    var obj = jQuery.parseJSON(json);
                    $("#dd_province").html(obj['data']);

                } catch (e) {
                    alert('Exception while request..');
                }
            },
            error: function() {
                alert('Error while request..');
            }
        });
    } else {
        $("#dd_province").html('<option value="">Select State</option>');
    }
}
