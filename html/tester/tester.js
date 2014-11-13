$(document).ready(function(){

	$('#rds-form').submit(function(e){
		e.preventDefault();
		//var toSend = $('#cform').serializeArray();
		$.ajax({
			type: "POST",
			url: "tester.php",
			data: {endpoint: 'newsmailer.c2vdjjqd4rxl.us-west-2.rds.amazonaws.com',user: 'mailer', password:'Mailer2014'},
			dataType: "json",
			error: function(jqXHr, textStatus, errorThrown){
				console.log(errorThrown);
			}
		})
		.done(function(response){
			console.log(response.status)
		})
		.fail(function(jqXHr, textStatus, errorThrown){
			console.log(jqXHr.responseText)
		})
	})

});