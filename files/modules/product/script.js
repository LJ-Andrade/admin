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
    $("[name='my-checkbox']").bootstrapSwitch();
});
    
// Insert Img
var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
var fileInput = $(':file').wrap(wrapper);

fileInput.change(function(){
    $this = $(this);
    $('#file').text($this.val());
})

$('#file').click(function(){
    fileInput.click();
}).show();

// Characters limiter
$('input, textarea').keyup(function() {
  var max = $(this).attr('maxLength');
  var curr = this.value.length;
  var percent = (curr/max) * 100;
  var indicator = $(this).parent().children('.indicator-wrapper').children('.indicator').first();
   
  // Shows characters left
  indicator.children('.current-length').html(max - curr);
   
  // Change colors
  if (percent > 30 && percent <= 50) { indicator.attr('class', 'indicator low'); }
  else if (percent > 50 && percent <= 70) { indicator.attr('class', 'indicator med'); }
  else if (percent > 70 && percent < 100) { indicator.attr('class', 'indicator high'); }
  else if (percent == 100) { indicator.attr('class', 'indicator full'); }
  else { indicator.attr('class', 'indicator empty'); }
  indicator.width(percent + '%');
});
    

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

///////// Characters limiter ///////////////////////////////////////////////
$('input, textarea').keyup(function() {
  var max = $(this).attr('maxLength');
  var curr = this.value.length;
  var percent = (curr/max) * 100;
  var indicator = $(this).parent().children('.indicator-wrapper').children('.indicator').first();
   
  // Shows characters left
  indicator.children('.current-length').html(max - curr);
   
  // Change colors
  if (percent > 30 && percent <= 50) { indicator.attr('class', 'indicator low'); }
  else if (percent > 50 && percent <= 70) { indicator.attr('class', 'indicator med'); }
  else if (percent > 70 && percent < 100) { indicator.attr('class', 'indicator high'); }
  else if (percent == 100) { indicator.attr('class', 'indicator full'); }
  else { indicator.attr('class', 'indicator empty'); }
  indicator.width(percent + '%');
});

