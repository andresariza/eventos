$(document).ready(function(){
    $('a.menuItemTrigger').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        var id = $(this).attr("data-id");
        triggerMenu(id);
    });
});