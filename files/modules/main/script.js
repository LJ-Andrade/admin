// LOG OK MSG
//---------------------------------------------

function welcomeMessage()
{
  //notifyInfo('<img src="' + $("#usernametext").children("img").attr("src") + '" class="userloginimg">' + "<br>" + "<br>" + '¡Bienvenido '+ $("#usernametext").text() +'!');
}

$(function(){
  $("#oklogmsg").click(function(){
    welcomeMessage();
  });
});

$(document).ready(function() {

  if(get['msg']=='logok')
  {
      welcomeMessage();
  }

});
