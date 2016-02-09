<!-- Pop Up Modals #adduser #modal1 -->
<script>
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
</script>  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

// Borrar Elementos
$("#confirmdelelem").click(function(){
    modalClose1();
    delprod($("#delval").val());
});
        
$(".deleteelem").click(function(){
    $("#delval").val($(this).attr("id"));
});

function delprod(id){
    $("#delelem"+id).hide();
}
</script>



