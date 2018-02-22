$(document).ready(function(){
    initialize();
    initializeBreacCrumb();
});
function initialize(){
    $('.menuItem').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        loadMenuContent(this);
    });
    $("#txt_buscador").keyup(function() {
        ajax_showOptions(this,'leeMenus',$(this).val()); 
    });
}
function initializeBreacCrumb(){
    $('#page-breadCrumb .menuItem').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        loadMenuContent(this);
    });
    $("#page-breadCrumb #txt_buscador").keyup(function() {
        ajax_showOptions(this,'leeMenus',$(this).val()); 
    });
}
function loadMenuContent(obj){
    //console.log(alowNavigate);
    var qtipObj = $(".qtip");
    if(typeof qtipObj !== "undefined"){
        $(".qtip").attr("aria-hidden","true");
        $(".qtip").css("display","none");
    }
    
    updateSessionActivity();
    var hr = $(obj).attr('href').trim();
    var reliframe = $(obj).attr('rel').trim();
    var menuId = $(obj).attr('id').trim();
    var itemId = menuId.split("_");
    $("ul#mainnav-menu>li, ul.collapse>li").removeClass("active-link");
    $(obj).parent().addClass("active-link");
    //alert(itemId);
    //alert(hr);
    if(!alowNavigate){
        contentHTML = alertContent.replace("fa-icon", dataAlert[0].icon);
        contentHTML = contentHTML.replace('<span class="text-2x"></span>', '<span class="text-2x">Aun no puede navegar por las opciones</span>');
        showAlert(dataAlert[0].type,contentHTML);
    }else{
        if(reliframe=="iframe" && (hr!="" && hr!="#")){
            showLoader();
            if(hr.indexOf('?') != -1){
                hr = hr+"&itemId="+itemId[1];
            }else{
                hr = hr+"?itemId="+itemId[1];
            }
            var height = $(document).outerHeight() - 175;
            var frame = '<iframe width="100%" height="'+height+'" frameborder="0" scrolling="auto" marginheight="0" marginwidth="0" name="contenidocentral" id="contenidocentral" src="'+hr+'"></iframe>';
            $( "#page-content" ).html( frame );
            $('#page-content #contenidocentral').on("load", function() {
                hideLoader();
            });
            timeOutVar = window.setTimeout(function(){
                $("#mensajeLoader").html("La carga esta tardando demaciado...");
                timeOutVar = window.setTimeout(function(){hideLoader();}, 5000);
            }, 15000);
            hideAsideModule(itemId[1]);
            //alert(boxed); 
        }else if(reliframe=="" && hr!="" && hr!="#" ){
            showLoader();
            $.ajax({
                url: $(obj).attr('href'),
                type: "POST",
                data: {
                    tmpl : 'json',
                    itemId : itemId[1]
                },
                success: function( data ){
                    $( "#page-content" ).html( data );
                }
            }).always(function() {
                hideLoader();
            });
            hideAsideModule(itemId[1]);
        }
        updateTitle(hr,menuId);
    }
}

function hideAsideModule(itemId){
    
    if(itemId=="0"){
        $("#container").addClass("aside-in");
        $("#container").addClass("aside-left");
        $("#container").addClass("aside-bright");
        //aside-in aside-left aside-bright
    }else{
        $("#container").removeClass("aside-in");
        $("#container").removeClass("aside-left");
        $("#container").removeClass("aside-bright");
    }
}

function updateTitle(hr,menuId){
    //alert(hr,menuId);
    if(hr!="" && hr!="#" ){
        $.ajax({
            url: HTTP_SITE+"/index.php",
            type: "POST",
            dataType: "json",
            data: {
                tmpl : 'json',
                menuId : menuId,
                action : "getTituloSeccion",
                option : "mainMenu"
            },
            success: function( data ){
                if(data.s){
                    $("#page-title h1").html(data.title);
                    $("#page-breadCrumb").html(data.breadCrumbs);
                    initializeBreacCrumb();
                }
            }
        });
    }
}
function updateSessionActivity(){
    $.ajax({
        url: HTTP_SITE+"/index.php",
        type: "POST",
        dataType: "json",
        data: {
            tmpl : 'json'
        },
        success: function( data ){
        }
    });
}
function triggerMenu(obj){
    $('#menuId_'+obj ).trigger('click');
    var hr = $('#menuId_'+obj ).attr('href').trim();
    var menuId = 'menuId_'+obj;
    updateTitle(hr,menuId);
}
