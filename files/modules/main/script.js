$(document).ready(function() {
    $('#newuser').show( 500 );
    $('#newprod').show( 500 );
    $("#oklogmsg").click();
    alert(get['msg']);
    if(get['msg']=='logok')
    {
        $("#oklogmsg").click();
    }
});



// LOG OK MSG
//---------------------------------------------
$(function(){
    $("#oklogmsg").click(function(){
        $.notify({
        // options
        icon: 'fa fa-check',
        message: 'Se ha logueado correctamente',
    },{
        // settings
        element: 'body',
        position: null,
        type: "info",
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: true,
        placement: {
            from: "bottom",
            align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 3000,
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
            '<i class="fa fa-times"></i>'+
            '</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>' 
    });
    });
});
