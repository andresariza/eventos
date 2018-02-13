var images = [
    HTTP_SITE+"/assets/img/bg-img/bg-img-7.jpg",
    HTTP_SITE+"/assets/img/bg-img/bg-img-6.jpg",
    HTTP_SITE+"/assets/img/bg-img/bg-img-5.jpg",
    HTTP_SITE+"/assets/img/bg-img/bg-img-4.jpg",
    HTTP_SITE+"/assets/img/bg-img/bg-img-3.jpg",
    HTTP_SITE+"/assets/img/bg-img/bg-img-2.jpg",
    HTTP_SITE+"/assets/img/bg-img/bg-img-1.jpg"
];

$.preloadImages = function() {
  for (var i = 0; i < images.length; i++) {
    $("<img />").attr("src", images[i]);
  }
};

// FORM VALIDATION FEEDBACK ICONS
// =================================================================
var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
};
$(document).ready(function(){
    $.preloadImages(images);
    var i = 0;
    setInterval(function() {
        var image = $('.img-acceso');
        image.fadeOut(200, function () {
            image.css("background-image", "url("+images[i]+")");
            image.fadeIn(1000);
        });
        i = i + 1;
        if (i == images.length) {
            i =  0;
        }
    }, 8000);
    
    $("#login_btn").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        login();
    });
    $("#login-form").submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#login_btn").removeAttr("disabled");
        return false;
    });/**/
        
    
    // FORM VALIDATION
    // =================================================================
    $('#login-form').bootstrapValidator({
        excluded: [':disabled'],
        feedbackIcons: faIcon,
        fields: {
            login: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido'
                    }
                }
            },
            clave: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida'
                    },
                    regexp: {
                            regexp: /^[a-zA-Z0-9_\.@#$%&*{}[\]!"-]+$/,
                            message: 'La contraseña solo puede ser alfanumerica, sin espacios'
                    }
                }
            }
        }
    }).on('status.field.bv', function(e, data) {
        var $form     = $(e.target),
        validator = data.bv; 
    });
    
});

var dataAlert = [{
            type : "info",
            icon : "fa-info-circle"
        },{
            type : "primary",
            icon : ""
        },{
            type : "success",
            icon : "fa-check-circle"
        },{
            type : "warning",
            icon : "fa-exclamation-triangle"
        },{
            type : "danger",
            icon : "fa-exclamation-triangle"
        },{
            type : "mint",
            icon : ""
        },{
            type : "purple",
            icon : ""
        },{
            type : "pink",
            icon : ""
        },{
            type : "dark",
            icon : ""
        }
    ];
var alertContent = '<center><strong><i class="fa fa-icon fa-2x" aria-hidden="true"></i></strong> <span class="text-2x"></span><center>';
var autoClose = true;

function login(){
    var clave = $("#clave").val();
    clave = clave.trim();
    
    var login = $("#login").val();
    login = login.trim();
    
    $.ajax({
        url: HTTP_SITE+'/index.php',
        type: "GET",
        dataType: "json",
        data: {
            tmpl : 'json',
            password : clave,
            login : login,
            task : "ingresar",
            option : "login"
        },
        success: function( data ){
            if(data.s){
                contentHTML = alertContent.replace("fa-icon", dataAlert[2].icon);
                contentHTML = contentHTML.replace('<span class="text-2x"></span>', '<span class="text-2x">'+data.mensaje+'</span>');
                
                showAlert(dataAlert[2].type,contentHTML);
                window.setTimeout(function() {
                    window.location.href = HTTP_SITE;
                }, 500);
            }else{
                contentHTML = alertContent.replace("fa-icon", dataAlert[4].icon);
                contentHTML = contentHTML.replace('<span class="text-2x"></span>', '<span class="text-2x">'+data.mensaje+'</span>');
                showAlert(dataAlert[4].type,contentHTML);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            contentHTML = alertContent.replace("fa-icon", dataAlert[4].icon);
            contentHTML = contentHTML.replace('<span class="text-2x"></span>', '<span class="text-2x">El servidor no responde, por favor comuniquese con la mesa de servicio</span>');
            showAlert(dataAlert[4].type,contentHTML);
        }
    });
}

function showAlert(type, contentHtml){
    $.niftyNoty({
        type: type,
        container : '#page-alert',
        html : contentHtml,
        focus: true,
        timer : autoClose ? 6000 : 0
    });
}