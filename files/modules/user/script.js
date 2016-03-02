$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess('Usuario creado correctamente');
	if(get['msg']=='update')
		notifySuccess('Usuario modificado correctamente');
});


$(function(){
	$("#create").click(function(){
		if(validate.validateFields('')){
			var process		= 'process.php';
	 		var target		= 'list.php?msg='+ $("#action").val();
	 		var haveData	= function(returningData)
	 		{
	 			$("input,select").blur();
				notifyError(returningData);
	 			//alert(returningData);
	 		}
	 		var noData		= function()
	 		{
	 			document.location = target;
	 		}
			sumbitFields(process,haveData,noData);
		}
	});
	
	$("input").keypress(function(e){
		if(e.which==13){
			$("#create").click();
		}
	});
});	


////////////////////////////// Make "Edit" and "Delete" Icons Appear ///////////////////////////////////////////////////////////////////////////////////
// Subtop Bar Icons
$(document).ready(function() {  
    $('#volverprod').hide();
    $('#newuser').hide();
    $('#newprod').hide();
    $('#volverusers').fadeIn( 500 );
});

$(function(){
	// Show Img selection div
	$('#chooseimg').click(function() {
	         $('#itemimg').toggle("slide");
	         $('#chooseimg').hide( 100 );
	    });

	    
	// Insert Img
	var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
	var fileInput = $(':file').wrap(wrapper);

	fileInput.change(function(){
	    $this = $(this);
	    $('#file').text($this.val());
	})

	$('#file').click(function(){
	    fileInput.click();
	}).show();

	// Caracters limiter
	$('input, textarea').keyup(function() {
	  var max = $(this).attr('maxLength');
	  var curr = this.value.length;
	  var percent = (curr/max) * 100;
	  var indicator = $(this).parent().children('.indicator-wrapper').children('.indicator').first();
	   
	  // Shows characters left
	  indicator.children('.current-length').html(max - curr);
	   
	  // Change colors periodically
	  if (percent > 30 && percent <= 50) { indicator.attr('class', 'indicator low'); }
	  else if (percent > 50 && percent <= 70) { indicator.attr('class', 'indicator med'); }
	  else if (percent > 70 && percent < 100) { indicator.attr('class', 'indicator high'); }
	  else if (percent == 100) { indicator.attr('class', 'indicator full'); }
	  else { indicator.attr('class', 'indicator empty'); }
	  indicator.width(percent + '%');
	});

	// Active Inactive Switch
	$("[name='status']").bootstrapSwitch();

});
