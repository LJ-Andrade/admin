// Styles scrollbar
//=======================================================
    $(document).ready(function() {  
        $("html").niceScroll({cursorwidth: '8px', cursorborder: 0, cursorborderradius: 0, autohidemode: false, zindex: 999, cursorcolor: '#2C3E50', cursoropacitymax: .5 });
    });

// Pop Up Modals #adduser #modal1
//=======================================================
function modalClose1() {
        if (location.hash == '#modal1') {
            location.hash = '';
        }
    }

// Handle ESC key (key code 27)
document.addEventListener('keyup', function(e) {
    if (e.keyCode == 27) {
        modalClose1();
    }
});
var modal1 = document.querySelector('#modal1');

// Handle click on the modal container
modal1.addEventListener('click', modalClose1, false);

// Prevent event bubbling if click occurred within modal content body
modal1.children[0].addEventListener('click', function(e) {
    e.stopPropagation();
}, false);

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

// Delete Elements
//=======================================================
$("#confirmdelelem").click(function(){
    modalClose1();
    delprod($("#delval").val());
});

$(".deleteelem").click(function(){
    $("#delval").val($(this).attr("id"));
});

function delprod(id){
    $("#delelem"+id).hide( 500 );
    $("#delelemf"+id).hide( 500 );
    
}


