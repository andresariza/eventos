$(document).ready(function(){
    $("#save").click(function(e){
        e.stopPropagation();
        e.preventDefault();
        save();
    });
    
    $('#fechaEvento').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        language: "es-ES" ,
        startDate: startDate
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
                        message: 'El guión del evento es requerido'
                    }
                }
            }
        }
    }).on('err.field.fv', function(e, data) {
        data.fv.disableSubmitButtons(false);
    }).on('success.field.fv', function(e, data) {
        if (data.fv.getInvalidFields().length > 0) {    // There is invalid field
            data.fv.disableSubmitButtons(true);
        }
    }) ;
});

function save(){
    var allowSubmit = false;
    var name = $('#name').val().trim();
    var fechaEvento = $('#fechaEvento').val().trim();
    var gionEvento = $('#gionEvento').val().trim();
    if(name!=="" && fechaEvento!=="" && gionEvento!==""){
        allowSubmit = true;
    }
    if(allowSubmit){
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
                        $("#menuId_2").trigger("click"); 
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
    }else{
        $("#save").attr("disable","disable");
    }
}

