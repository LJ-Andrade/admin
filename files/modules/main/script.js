// LOG OK MSG
//---------------------------------------------

function welcomeMessage()
{
  notifyInfo('<img src="' + $(".img-circle").attr("src") + '" width="90" height="90" class="img-circle">' + "<br>" + "<br>" + '¡Bienvenido '+ $("#userfullname").html() +'!');
}

$(document).ready(function() {

  if(get['msg']=='logok')
  {
      welcomeMessage();
  }

});
