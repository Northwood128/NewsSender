$(document).ready(function(){

	$('#test').click(function(e){
		var submitData = $('#rdsform').serializeArray();
		//console.log(submitData);
		//var toSend = $('#cform').serializeArray();
		var testbtn = $("#test");
		$.ajax({
			type: "POST",
			url: "tester/tester.php",
			data: submitData,
			dataType: "json"
		})
		.done(function(response){
			if (response.status == 'green') {
				testbtn.toggleClass("btn-success");
				testbtn.html("Exito!");
				
			}else{
				testbtn.toggleClass("btn-danger");
				testbtn.html("Algo no esta bien");
			};
		})
		.fail(function(jqXHr, textStatus, errorThrown){
			console.log(jqXHr.responseText)
		})
	});

});