// LOG OK MSG
//---------------------------------------------

function welcomeMessage()
{
  notifyInfo('<img src="' + $(".img-circle").attr("src") + '" width="90" height="90" class="img-circle">' + "<br>" + "<br>" + utf8_decode('¡Bienvenido '+ $("#userfullname").html()) +'!');
}

$(document).ready(function() {

  if(get['msg']=='logok')
  {
      welcomeMessage();
  }

  $('#meli_status').iCheck('disable');

});

$(function(){
  $("#melisync").click(function(){
    window.location = "process.meli.php";
  });

  $("#melinosync").click(function(){
    window.location = "process.meli.php?sync=no";
  });
});


/// Alert Demo ///
$('#alertDemoError').click(function(){
  notifyError();
});

$('#alertDemoSuccess').click(function(){
  notifySuccess();
});

$('#alertDemoInfo').click(function(){
  notifyInfo();
});

$('#alertDemoWarning').click(function(){
  notifyWarning();
});

$('.activateLoader').click(function(){
  toggleLoader();
});
