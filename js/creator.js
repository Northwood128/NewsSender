/**
 * @author Agustin Recalde
 */

    $('document').ready(function(){
    	$('textarea').html("");
    	//These two are to enable or disable the textarea#these in the #additionalInputs
    	$('#optionalRadio1').change(function(){
    		$('.only-these').toggleClass('disabled');
    		if ($('#these').attr('disabled')){
    			$('#these').removeAttr('disabled');
    		}else{
    			$('#these').attr('disabled',"");
    		}
    	});
    	
    	$('#optionalRadio2').change(function(){
    		$('.only-these').toggleClass('disabled');
    		if ($('#these').attr('disabled')){
    			$('#these').removeAttr('disabled');
    		}else{
    			$('#these').attr('disabled',"");
    		}
    	});
    	
    });
