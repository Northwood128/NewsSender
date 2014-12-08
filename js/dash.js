/**
 * @author Agustin Recalde
 */

$(document).ready(function() {
	
	$("button").click(function(){
		var id = $(this).prop("id");
		window.location = id+".php";
	});
	
	//Dashboard functions
	$('.tile').hover(function(){
		var $element = $(this);
		
		var $elementId = $element.prop('id');
		//$element.children(':first').toggleClass('fa-spin');
		var toFind = "span#desc-"+$elementId;
		//console.log(toFind);
		$(".info-sidebar").find(toFind).toggle();
	});
});

