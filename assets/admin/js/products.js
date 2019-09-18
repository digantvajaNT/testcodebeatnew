//PRODUCT MODULE
var site_url = 'http://benchmarkagencies.com/';
//MODEL NUMBER VALIDATION
/*$("#tb_modelno").blur(function(){
	var model_no = $(this).val();
	if(/^[a-z0-9\+\-\s]+$/i.test(model_no))
	{
		$("#err_modelno").text("");
		var formData = {
            id: $("#hdn_product_id").val(),
            model_no: model_no            
        };
		$.ajax({
	        type: "post",
	        url: site_url + "admin/products/chk_modelno",
	        cache: false,
	        data: formData,
	        beforeSend: function() {},
	        complete: function() {},
	        success: function(json) {
	            var obj = jQuery.parseJSON(json);
	            if(obj['data'] == 0) {
	            	$("#tb_modelno").css("border-color", "#0b8043");
	            	$("#err_modelno").text("");
	            	$("#btn_publish").attr('disabled',false);
	            } else {
	            	$("#tb_modelno").css("border-color", "#ff0000");
	            	$("#err_modelno").text("This model no already Exists!");
	            	$("#btn_publish").attr('disabled',true);
	            }	            
	        },
	        error: function() {
	            alert('Error while request..');
	        }
	    });
	}
	else {
		$("#err_modelno").text("Only alphanumeric and dash(-) allowed)");
		$(this).css("border", "1px solid #ff0000");
	}
        
});

*/
$('#file_coverimage').bind('change', function() {

    var ext = $('#file_coverimage').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
        $.alert({
            title: 'Benchmark',
            content: 'Please upload an Image file.',
        });
        $('#file_coverimage').val('');
    }else{

    }
});
function publishProduct() {
    var valid =0;
    //alert($('select[name="dd_maincategory"]').val());return false;
    if($.trim($('select[name="dd_maincategory"]').val()) == ''){
        $("#select2-dd_maincategory-container").css("border", "1px solid #ff0000");
        $("#select2-dd_maincategory-container").css("margin", "-5px -12px 0px -12px");
        valid++;
    }
    else {
        $("#select2-dd_maincategory-container").css("border", "none");
        $("#select2-dd_maincategory-container").css("margin","");
    }

    if($.trim($('select[name="dd_category[]"]').val()) == ''){
        $("#select2-dd_category-container").css("border", "1px solid #ff0000");
        $("#select2-dd_category-container").css("margin", "-5px -12px 0px -12px");
        valid++;
    }
    else {
        $("#select2-dd_category-container").css("border", "none");
        $("#select2-dd_category-container").css("margin","");
    }

    if($.trim($("#tb_productname").val()) == ''){
        $("#tb_productname").css("border", "1px solid #ff0000");
        valid++;
    }
    else {
        $("#tb_productname").css("border", "none");
    }



   /* var selected = $('select[name="dd_category[]"]').map(function(){
        if ($(this).val())
            return $(this).val();
    }).get();

   if(selected == ''){
        $(".select2-container").css("border", "1px solid #ff0000");
        valid++;
    }
   else {
       $(".select2-container").css("border", "none");
   }*/

    if ($('#file_coverimage').val() == ''  && $('#hdn_cover').val() == '') {
        $("#file_coverimage").css("border", "1px solid #ff0000");
        valid++;
    }
    else {
        $("#file_coverimage").css("border", "none");
    }
    if(CKEDITOR.instances["tb_description"].getData() == '')
    {
        $("#cke_tb_description").css("border", "1px solid #ff0000");
        valid++;
    } else {
        $("#cke_tb_description").css("border", "none");
    }
    //FOR MODEL NO
   /* if($.trim($("#tb_modelno").val()) == ''){
        $("#tb_modelno").css("border", "1px solid #ff0000");
        valid++;
    }
    else {
        $("#tb_modelno").css("border", "none");
        //CHECK DUPLICATE 
        var formData = {
            id: $("#hdn_product_id").val(),
            model_no: $("#tb_modelno").val()            
        };
		$.ajax({
	        type: "post",
	        url: site_url + "admin/products/chk_modelno",
	        cache: false,
	        data: formData,
	        beforeSend: function() {},
	        complete: function() {},
	        success: function(json) {
	            var obj = jQuery.parseJSON(json);
	            if(obj['data'] == 0) {
	            	$("#tb_modelno").css("border-color", "#0b8043");
	            	$("#err_modelno").text("");
	            	$("#btn_publish").attr('disabled',false);
	            } else {
	            	
	            	$("#tb_modelno").css("border-color", "#ff0000");
	            	$("#err_modelno").text("This model no already Exists!");
	            	$("#btn_publish").attr('disabled',true);
	            	 $.alert({
			            title: 'Benchmark',
			            content: 'Product model no is already Exists!',
			        });
	            	
	            }	            
	        },
	        error: function() {
	            alert('Error while request..');
	        }
	    });
    }    
	*/
    if(valid == 0) {
        $("#hdn_p_status").val('publish');
        $.confirm({
            title: 'Benchmark',
            content: 'Are you sure you want to Publish this Product?',
            buttons: {
                confirm: {
                    text: 'Publish',
                    btnClass: 'btn-success',
                    //keys: ['enter', 'shift'],
                    action: function(){
                        $("#loader").show();
                        window.setTimeout(function() { document.getElementById("frmNewProduct").submit(); }, 2000);
                        //document.getElementById("frmNewProduct").submit();
                    }
                },
                cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-default',
                    action: function(){
                    }
                }
            },
            icon: 'fa fa-times',
        });
    } else {
        $.alert({
            title: 'Benchmark',
            content: 'Please fill required fields highlighted in Red color.',
        });
    }
}
function saveDraft() {
    var valid =0;
    if($.trim($("#tb_productname").val()) == ''){
        $("#tb_productname").css("border", "1px solid #ff0000");
        valid++;
    }
    else {
        $("#tb_productname").css("border", "none");
    }
    var selected = $('select[name="dd_category[]"]').map(function(){
        if ($(this).val())
            return $(this).val();
    }).get();

    if(selected == ''){
        $(".select2-container").css("border", "1px solid #ff0000");
        valid++;
    }
    else {
        $(".select2-container").css("border", "none");
    }

    if ($('#file_coverimage').val() == ''  && $('#hdn_cover').val() == '') {
        $("#file_coverimage").css("border", "1px solid #ff0000");
        valid++;
    }
    else {
        $("#file_coverimage").css("border", "none");
    }
	//FOR MODEL NO
   /* if($.trim($("#tb_modelno").val()) == ''){
        $("#tb_modelno").css("border", "1px solid #ff0000");
        valid++;
    }
    else {
        $("#tb_modelno").css("border", "none");
        //CHECK DUPLICATE 
        var formData = {
            id: $("#hdn_product_id").val(),
            model_no: $("#tb_modelno").val()            
        };
		$.ajax({
	        type: "post",
	        url: site_url + "admin/products/chk_modelno",
	        cache: false,
	        data: formData,
	        beforeSend: function() {},
	        complete: function() {},
	        success: function(json) {
	            var obj = jQuery.parseJSON(json);
	            if(obj['data'] == 0) {
	            	$("#tb_modelno").css("border-color", "#0b8043");
	            	$("#err_modelno").text("");
	            } else {
	            	$("#tb_modelno").css("border-color", "#ff0000");
	            	$("#err_modelno").text("This model no already Exists!");
	            	valid++;
	            }	            
	        },
	        error: function() {
	            alert('Error while request..');
	        }
	    });
    }
*/
    if(valid == 0)
    {
        $("#hdn_p_status").val('draft');
        $("#loader").show();
        window.setTimeout(function() { document.getElementById("frmNewProduct").submit(); }, 2000);
        //document.getElementById("frmNewProduct").submit();
    }
    else {
        $.alert({
            title: 'Benchmark',
            content: 'Please fill required fields highlighted in Red color.',
        });
    }

}
function add_new_row() {
    var item_length = $('.specification').length;
    var formData = {
        id: item_length
    };
    var last_id = "tb_specification"+(item_length + 1);
    var last_id1 = "featureUploader"+(item_length + 1);
    $.ajax({
        type: "post",
        url: site_url + "admin/products/add_new",
        cache: false,
        data: formData,
        beforeSend: function() {},
        complete: function() {},
        success: function(json) {
            var obj = jQuery.parseJSON(json);
            $("#div_specifications").append(obj['data']);
            CKEDITOR.replace(last_id);
            var arSpData = new Array();
            $("#"+last_id1).uploadFile({
                url: site_url+"admin/products/uploadSpImages",
                fileName: "file_specification",
                dragdropWidth: '100%',
                statusBarWidth: '100%',
                allowedTypes: "jpeg,jpg,png,gif",
                onSuccess:function(files,data,xhr,pd)
                {
                    arSpData.push(data);
                    $("#specification_img_json"+(item_length + 1)).val(JSON.stringify(arSpData));
                },
            });
        },
        error: function() {
            alert('Error while request..');
        }
    });
}

function add_new_option_row() {
    var item_length = $('.option').length;
    var formData = {
        id: item_length
    };
    var last_id = "tb_optdesc"+(item_length + 1);
    var last_id1 = "opUploader"+(item_length + 1);
    $.ajax({
        type: "post",
        url: site_url + "admin/products/add_new_option_row",
        cache: false,
        data: formData,
        beforeSend: function() {},
        complete: function() {},
        success: function(json) {
            var obj = jQuery.parseJSON(json);
            $("#div_options").append(obj['data']);
            CKEDITOR.replace(last_id);
            var arOpData = new Array();
            $("#"+last_id1).uploadFile({
                url: site_url+"admin/products/uploadOpImages",
                fileName: "file_option",
                dragdropWidth: '100%',
                statusBarWidth: '100%',
                allowedTypes: "jpeg,jpg,png,gif",
                onSuccess:function(files,data,xhr,pd)
                {
                    arOpData.push(data);

                    $("#option_img_json"+(item_length + 1)).val(JSON.stringify(arOpData));
                },
            });
        },
        error: function() {
            alert('Error while request..');
        }
    });
}
function removeRow(id) {
    $("#" + id).remove();
}

//EDIT PAGE
function update_product_specification(type,id) {
    //alert(CKEDITOR.instances[#tb_specification-"].getData())
    if(type == 'spec') {
        var formData = {
            id: id,
            title: $("#tb_spectitle-"+id).val(),
            desc: CKEDITOR.instances["tb_specification-"+id].getData()
        };
    }
    else {
        var formData = {
            id: id,
            title: $("#tb_opttitle-"+id).val(),
            desc: CKEDITOR.instances["tb_optdesc-"+id].getData()
        };
    }

    $.ajax({
        type: "post",
        url: site_url + "admin/products/update_product_data",
        cache: false,
        data: formData,
        beforeSend: function() {  $("#loader").show(); },
        complete: function() {},
        success: function(json) {
            $("#loader").hide();
            var obj = jQuery.parseJSON(json);
            window.location.reload();
        },
        error: function() {
            alert('Error while request..');
        }
    });
}
function update_draft_specification(type,id) {
    if(type == 'spec') {
        var formData = {
            id: id,
            title: $("#tb_spectitle-"+id).val(),
            desc: CKEDITOR.instances["tb_specification-"+id].getData()
        };
    }
    else {
        var formData = {
            id: id,
            title: $("#tb_opttitle-"+id).val(),
            desc: CKEDITOR.instances["tb_optdesc-"+id].getData()
        };
    }

    $.ajax({
        type: "post",
        url: site_url + "admin/products/update_draft_data",
        cache: false,
        data: formData,
        beforeSend: function() {$("#loader").show(); },
        complete: function() {},
        success: function(json) {
            $("#loader").hide();
            var obj = jQuery.parseJSON(json);
            window.location.reload();
        },
        error: function() {
            alert('Error while request..');
        }
    });
}
function delete_product_spec(type,id) {
    var formData = {
        id: id,
        type: type
    };
    $.ajax({
        type: "post",
        url: site_url + "admin/products/remove_product_data",
        cache: false,
        data: formData,
        beforeSend: function() { $("#loader").show(); },
        complete: function() {},
        success: function(json) {
            $("#loader").hide();
            var obj = jQuery.parseJSON(json);
            //alert(obj['data']);
            if(type == 'spec')
            {
                $('#row_'+id).remove();
            }
            if(type == 'option')
            {
                $('#item_'+id).remove();
            }
        },
        error: function() {
            alert('Error while request..');
        }
    });
}
function delete_draft_spec(type,id) {
    var formData = {
        id: id,
        type: type
    };
    $.ajax({
        type: "post",
        url: site_url + "admin/products/remove_draft_data",
        cache: false,
        data: formData,
        beforeSend: function() { $("#loader").show(); },
        complete: function() {},
        success: function(json) {
            $("#loader").hide();
            var obj = jQuery.parseJSON(json);
            //alert(obj['data']);
            if(type == 'spec')
            {
                $('#row_'+id).remove();
            }
            if(type == 'option')
            {
                $('#item_'+id).remove();
            }
        },
        error: function() {
            alert('Error while request..');
        }
    });
}
function deleteProductPhoto(id) {
    var formData = {
        id: id
    };
    $.ajax({
        type: "post",
        url: site_url + "admin/products/remove_product_photo",
        cache: false,
        data: formData,
        beforeSend: function() {$("#loader").show();},
        complete: function() {},
        success: function(json) {
            $("#loader").hide();
            var obj = jQuery.parseJSON(json);
            window.location.reload();
        },
        error: function() {
            alert('Error while request..');
        }
    });
}
function deleteDraftPhoto(id) {
    var formData = {
        id: id
    };
    $.ajax({
        type: "post",
        url: site_url + "admin/products/remove_draft_photo",
        cache: false,
        data: formData,
        beforeSend: function() { $("#loader").show(); },
        complete: function() {},
        success: function(json) {
            $("#loader").hide();
            var obj = jQuery.parseJSON(json);
            window.location.reload();
        },
        error: function() {
            alert('Error while request..');
        }
    });
}
function deleteFeatureImage(id) {
    var formData = {
        id: id,
        type:  $("#hdn_product_type").val()
    };
    $.ajax({
        type: "post",
        url: site_url + "admin/products/uploadPrdRemovePhoto",
        cache: false,
        data: formData,
        beforeSend: function() { $("#loader").show(); },
        complete: function() {},
        success: function(json) {
            $("#loader").hide();
            var obj = jQuery.parseJSON(json);
            window.location.reload();
        },
        error: function() {
            alert('Error while request..');
        }
    });
}

function fnDiscardChages(id) {
    $.confirm({
        title: 'Benchmark',
        content: 'Are you sure you want to Discard this Product?',
        buttons: {
            confirm: {
                text: 'Discard',
                btnClass: 'btn-success',
                //keys: ['enter', 'shift'],
                action: function(){
                    $("#loader").show();
                    window.location.href= site_url +'admin/products/discard/'+id;
                }
            },
            cancel: {
                text: 'Cancel',
                btnClass: 'btn-default',
                action: function(){
                }
            }
        },
        icon: 'fa fa-times',
    });
}