$(document).ready(function(){
    //alert("carga??");
    $("#crearEvento").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        crearEditar();
    });/**/
    $(".accion").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        ejecutarAccion(this);
    });
    
}); 
$('#datos').bootstrapTable({
    onPageChange: function (name, args) {
        $(".accion").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            ejecutarAccion(this);
        });
    },
    onSort: function (name, args) {
        $(".accion").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            ejecutarAccion(this);
        });
    }
});
function crearEditar(id = null){
    var titulo = "";
    if(id==null){
        titulo = "Nuevo ";
    }else{
        titulo = "Editar ";
    }
    showLoader();
    $.ajax({
        url: HTTP_SITE+"/index.php",
        type: "POST",
        dataType: "html",
        data: {
            tmpl : 'json',
            layout : "createEdit",
            option : "eventos",
            id : id
        },
        success: function( data ){
            abrirModal(titulo,data);
            hideLoader();
        },
        error: function (xhr, ajaxOptions, thrownError) {}
    }).always(function() {
        hideLoader();
    });;
}

function ejecutarAccion(obj){
    var accion = $(obj).attr("data-action").trim();
    var id = $(obj).attr("data-id").trim();
    switch(accion){
        case "publicar":
        case "despublicar":
            publicar(obj);
            break;
        case "editar":
            crearEditar(id);
            break;
    }
}
function publicar(obj){
    var id = $(obj).attr("data-id");
    showLoader();
    $.ajax({
        url: HTTP_SITE+"/index.php",
        type: "POST",
        dataType: "json",
        data: {
            tmpl : 'json',
            option : "eventos",
            action : "publicarDespublicar",
            id : id
        },
        success: function( data ){
            if(data.s){
                var padre = $(obj).parent();
                $(obj).remove();
                padre.html(data.boton);
                padre.children(".accion").click(function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    ejecutarAccion(this);
                });
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {},
        complete: function( ){
            hideLoader();
        }
    }).always(function() {
        hideLoader();
    });
}
