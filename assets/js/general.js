
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
var timerClose = 6000;
function showAlert(type, contentHtml, focus){ 
    $.bthemeNoty({
        type: type,
        container : '#page-alert',
        html : contentHtml,
        focus: focus,
        timer : autoClose ? timerClose : 0
    });
}