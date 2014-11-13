$(document).ready(function(){

	$('#test').click(function(e){
		var submitData = $('#rds-form').serializeArray();
		//var toSend = $('#cform').serializeArray();
		$.ajax({
			type: "POST",
			url: "tester.php",
			data: {endpoint: submitData.rdsendpoint, user: submitData.rdsusername, password: submitData.rdspassword},
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