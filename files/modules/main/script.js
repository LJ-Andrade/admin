// LOG OK MSG
//---------------------------------------------

function welcomeMessage()
{
    notifyInfo('<img src="' + $("#usernametext").children("img").attr("src") + '" class="userloginimg">' +'¡Bienvenido '+ $("#usernametext").text() +'!');
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
});


