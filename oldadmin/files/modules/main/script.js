// LOG OK MSG
//---------------------------------------------

function welcomeMessage()
{
  notifyInfo('<img src="' + $("#usernametext").children("img").attr("src") + '" class="userloginimg">' + "<br>" + "<br>" + '¡Bienvenido '+ $("#usernametext").text() +'!');
}

$(function(){
  $("#oklogmsg").click(function(){
    welcomeMessage();
  });
});

$(document).ready(function() {
  /// Boton Juira Test borrar despues de probar ///
  $("#testloader").click(function(){
      toggleLoader();
  });
  $(".juirabtn").click(function(){
      toggleLoader();
  });

  $('#newuser').fadeIn( 500 );
  $('#newprod').fadeIn( 500 );
  //$("#oklogmsg").click();
  //alert(get['msg']);
  if(get['msg']=='logok')
  {
      welcomeMessage();
  }
  /// Bootstrap Switch ///
  $("[name='status']").bootstrapSwitch();
});

///////////// Show User Img Selector /////////////////////
$(function (){
	$('#imgsToSelect').hide();
	$('#cancelSelectImgBtn').hide();

	$('#selectImgBtn').click(function() {
		$('#newInputs').hide( 500 );
		$('#imgsToSelect').show( 500 );
		$('#selectImgBtn').hide();
		$('#cancelSelectImgBtn').fadeIn( 400 );
	});
	$('#cancelSelectImgBtn').click(function() {
		$('#newInputs').show( 500 );
		$('#imgsToSelect').hide( 500 );
		$('#selectImgBtn').show();
		$('#cancelSelectImgBtn').hide();
	});
});

///////// TEST ALERTS ////////////////
// Alerts Info
  $('.testInfo').click(function() {
    notifyInfo('<i class="fa fa-exclamation"></i><br>Informaci&oacute;n');
  });

// Ok
  $('.testOk').click(function() {
    notifySuccess('<i class="fa fa-thumbs-o-up"></i><br>Ok - Correcto');
  });
