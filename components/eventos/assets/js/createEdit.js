$(document).ready(function(){
    $("#save").click(function(e){
        e.stopPropagation();
        e.preventDefault();
        save();
    });
    /*$("#adminForm").submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        save();
    });/**/
    // FORM VALIDATION FEEDBACK ICONS
    // =================================================================
    var faIcon = {
            valid: 'fa fa-check-circle fa-lg text-success',
            invalid: 'fa fa-times-circle fa-lg',
            validating: 'fa fa-refresh'
    }
    
    // FORM VALIDATION
    // =================================================================
    $('#adminForm').bootstrapValidator({
        excluded: [':disabled'],
        feedbackIcons: faIcon,
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del evento es requerido'
                    }
                }
            },
            fechaEvento: {
                validators: {
                    notEmpty: {
                        message: 'La fecha del evento es requerida'
                    }
                }
            },
            gionEvento: {
                validators: {
                    notEmpty: {
                        message: 'El gión del evento es requerido'
                    }
                }
            },
            fechaEvento: {
                validators: {
                    notEmpty: {
                        message: 'La fecha del evento es requerida'
                    },
                    file: {
                        extension: 'jpeg,jpg,png,JPEG,JPG,PNG',
                        type: 'image/jpeg,image/png',
                        message: 'Please choose a MP3 file'
                    }
                }
            },
        }
    }).on('status.field.bv', function(e, data) {
        var $form     = $(e.target),
        validator = data.bv; 
    });
    $('#fechaEvento').mask('9999-99-99');
});

function save(){
    var datos = $('#adminForm').serializeArray();
    $.ajax({
        url: HTTP_SITE+'/index.php',
        type: "GET",
        dataType: "json",
        data: datos,
        contentType: 'multipart/form-data',
        success: function( data ){
            bootbox.hideAll();
            if(data.s){
                contentHTML = alertContent.replace("fa-icon", dataAlert[2].icon);
                contentHTML = contentHTML.replace('<span class="text-2x"></span>', '<span class="text-2x">'+data.msj+'</span>');
                showAlert(dataAlert[2].type,contentHTML,true);
                
                window.setTimeout(function() {
                    $(".adm_menu").trigger("click"); 
                }, 1500);
            }else{
                contentHTML = alertContent.replace("fa-icon", dataAlert[4].icon);
                contentHTML = contentHTML.replace('<span class="text-2x"></span>', '<span class="text-2x">'+data.msj+'</span>');
                showAlert(dataAlert[4].type,contentHTML,true);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            contentHTML = alertContent.replace("fa-icon", dataAlert[4].icon);
            contentHTML = contentHTML.replace('<span class="text-2x"></span>', '<span class="text-2x">El servidor no responde</span>');
            showAlert(dataAlert[4].type,contentHTML,true);
        }
    });
}

