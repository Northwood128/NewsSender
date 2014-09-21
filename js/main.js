/**
 * @author Agustin Recalde
 */

$(document).ready(function() {
	
	$("#new-user-form").submit(function(e) {
		
		e.preventDefault();
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
			setTimeout(function() {
				$(".fa").hide();
			},1000);
		});
	});
	
});
