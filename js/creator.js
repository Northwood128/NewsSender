/**
 * @author Agustin Recalde
 */

    $('document').ready(function(){
    	$('#these').html("");
    	//These two are to enable or disable the textarea#these in the #additionalInputs
		$("#optionalRadio1").change(function(){
			if($(this).is(":selected")){
				$("#these").prop("disabled", true);
			}else{
				$("#these").removeProp("disabled");
			};
    	});
    });
// && $('#these').attr('disabled')

