/////////// Show or Hide Icons On subtop //////////////////////
$(document).ready(function() {
    $('#showitemfilters').click(function() {
         $('#filteritem').toggle("slide");
    });
    $('#viewlistbt').removeClass('Hidden');
    $('#newprod').removeClass('Hidden');
    $('#showitemfilters').removeClass('Hidden');
});



/////////////////////////////////// Change Bootstrap Swtich Status on Grid and List Simultaneously //////////////////////////
$(function(){
  $(".SwitchCheckbox").on("switchChange.bootstrapSwitch",function(event,state){
    if(!$(this).hasClass('Changed'))
    {
      var checkBox  = $(this);
      var id        = $(this).attr('target');
      var ProdName  = $("#title"+id).text();
      var process   = 'process.php?action=changestatus&id='+id+'&status='+state;
      //var target    = 'list.php?msg='+ $("#action").val();
      var haveData  = function(returningData)
      {
        $("input,select").blur();
        if(returningData!="on")
          notifyError(returningData);
      }
      var noData    = function()
      {
        checkBox.addClass("Changed");
        if($("#gridstatus"+id).hasClass("Changed"))
        {
          $("#liststatus"+id).addClass("Changed");
          $("#liststatus"+id).bootstrapSwitch('toggleState');
        }else{
          $("#gridstatus"+id).addClass("Changed");
          $("#gridstatus"+id).bootstrapSwitch('toggleState');
        }
        $("#gridstatus"+id).removeClass("Changed");
        $("#liststatus"+id).removeClass("Changed");

        if(state==true)
        {
          notifySuccess("Publicaci&oacute;n '"+ProdName+"' Activada");
        }else{
          notifySuccess("Publicaci&oacute;n '"+ProdName+"' Pausada");
          $("#status"+id).each(function(){
            $(this).removeClass("checked");
          });
        }
        //document.location = target;
      }
      sumbitFields(process,haveData,noData);
    }
  });
});
    
///////// Switch Viewmode ////////////////////////

$(function(){
    $('div[id="viewlist"]').hide();
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
        //notifyError(returningData);
        alert(returningData);
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

