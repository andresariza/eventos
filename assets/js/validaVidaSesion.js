$(document).ready(function(){
    validarVidaSesion();
    $(document).click(function(){
        validarVidaSesion();
    });
    /*/$(document).mousemove(function(){
        validarVidaSesion();
    });/**/
});

function validarVidaSesion(){
    var now = new Date();
    $.ajax({
        url: HTTP_SITE+"/index.php",
        type: "POST",
        dataType: "json",
        data: {
            tmpl : 'json',
            task : "validarVidaSesion",
            option : "login"
        },
        success: function( data ){
            if(data.s){ 
                window.setTimeout(function() {
                    validarVidaSesion();
                }, 600000);
                //}, 2000);
            }else{
                window.location.reload();
            }
        }
    });
}
