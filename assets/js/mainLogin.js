/**
 * @author Andres Ariza <andresgudlu@gmail.com>
 */

$(function() {
    $("#login_btn").click(function(e){
    	e.stopPropagation();
    	e.preventDefault();
    	$("form#login").submit();
    });
});