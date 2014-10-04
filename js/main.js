/**
 * @author Agustin Recalde
 */

$(document).ready(function() {
	
	$('#new-user-form').submit(function(event) {
		event.preventDefault();
		
		var new_user_data = $(this).serializeArray();
		//This way, i can use the same funtion for many forms,just change the URL based on the ID of the modal div
		if ($(".modal").attr('id') == 'agregarUsuario'){
			new_user_data.push({action: 'agregarUsuario'});
			var url = '../script/new_user.php';
		}
		
		$.ajax({
			url: url,
			type: "POST",
			dataType: "json",
			data: new_user_data,
			beforeSend: function(){
				$(".fa").css('display', 'inline');
			}
		})
		.done(function(){
			
		})
		.fail(function(){
			
		})
		.always(function(){
			$(".fa").hide();
		});
	});
	
	$('.tile').hover(function(){
		var $element = $(this);
		
		var $elementId = $element.prop('id');
		//$element.children(':first').toggleClass('fa-spin');
		var toFind = "span#desc-"+$elementId;
		//console.log(toFind);
		$(".info-sidebar").find(toFind).toggle();
	});
});
