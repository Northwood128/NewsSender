$(document).ready(function(){

	$('#test').click(function(e){
		var submitData = $('#rds-form').serializeArray();
		//var toSend = $('#cform').serializeArray();
		$.ajax({
			type: "POST",
			url: "tester.php",
			data: {endpoint: submitData.rds-endpoint,user: submitData.rds-username, password: submitData.rds-password},
			dataType: "json"
		})
		.done(function(response){
			console.log(response.status)
		})
		.fail(function(jqXHr, textStatus, errorThrown){
			console.log(jqXHr.responseText)
		})
	});

});