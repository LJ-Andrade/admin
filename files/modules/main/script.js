// LOG OK MSG
//---------------------------------------------
function welcomeMessage()
{
    $.notify({
        // options
        icon: '',
        message: '<img src="' + $("#usernametext").children("img").attr("src") + '" class="userloginimg"><br>' +'¡Bienvenido '+ $("#usernametext").text() +'!',
    },{
        // settings
        element: 'body',
        position: null,
        type: "info",
        allow_dismiss: false,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
            from: "bottom",
            align: "right"
        },
        offset: 50,
        spacing: 10,
        z_index: 90,
        delay: 2000,
        timer: 1000,
        url_target: '_blank',
        mouse_over: null,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} alertok" role="alert">' +
            '<button type="button" aria-hidden="true" class="closealert" data-notify="dismiss">'+
            '</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'

        });
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


