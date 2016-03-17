/////////// Show or Hide Icons On subtop //////////////////////
$(document).ready(function() {
    $('#showitemfilters').click(function() {
         $('#filteritem').toggle("slide");
    });
    $('#viewlistbt').show( 0 );
    $('#newprod').show( 100 );
    $('#showitemfilters').show( 0 );
});
    
///////// Switch Viewmode ////////////////////////

$(function(){
    $('div[id="viewlist"]').hide();
    		
        $("#viewlistbt").on( "click", function() {
    		$('div[id="viewgrid"]').hide( 500 );
            $('div[id="viewlist"]').show( 500 ); 
            $("#viewlistbt").hide();
            $("#viewgridbt").show( 0 );
    	 });
        
        $("#viewgridbt").on( "click", function() {
    		$('div[id="viewgrid"]').show( 500 ); 
            $('div[id="viewlist"]').hide( 500 );
            $("#viewgridbt").hide();
            $("#viewlistbt").show( 0 );
    	 });
        
    // Active Inactive Swich
    $("[name='status']").bootstrapSwitch();
});
    
//////////////////////// Submit Data ////////////////////////////////////
$(function(){
  $("#create").click(function(){
    if(validate.validateFields('')){
      var process   = 'process.php';
      var target    = 'list.php?msg='+ $("#action").val();
      var haveData  = function(returningData)
      {
        $("input,select").blur();
        notifyError(returningData);
        //alert(returningData);
      }
      var noData    = function()
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

/////////////////// Insert Img////////////////////////////////////
var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
var fileInput = $(':file').wrap(wrapper);

fileInput.change(function(){
    $this = $(this);
    $('#file').text($this.val());
})

$('#file').click(function(){
    fileInput.click();
}).show();
    

///////////////////////   Del Selected  //////////////////////////////////////////

$(document).ready(function() { 
      $('#delselected').hide();
      $(".listrow").click(function() {
            $('#delselected').show ( 0 );
       });
});

// Select multiple rows

$(function () {
 var isMouseDown = false,
   isHighlighted;
 $(".listrow")
   .mousedown(function () {
     isMouseDown = true;
     $(this).toggleClass("listselect");
     isHighlighted = $(this).hasClass("listselect");
     return false; // prevent text selection
   })
   .mouseover(function () {
     if (isMouseDown) {
       $(this).toggleClass("listselect", isHighlighted);
     }
   })
   .bind("selectstart", function () {
     return false;
   })

$(document)
      .mouseup(function () {
     isMouseDown = false;
   });
});

