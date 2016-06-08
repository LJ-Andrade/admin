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
  $(".ChangeStatus").on("switchChange.bootstrapSwitch",function(event,state){
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

///////// Select Product/Item ////////////////////////

$(function(){
    $('.overlayDetails').click(function(){
      $('.selectedItem').removeClass('Hidden');
    });

    $('.selectedItem').click(function(){
      $('.selectedItem').addClass('Hidden');
    });
});

// //////////////////////// Submit Data ////////////////////////////////////
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

////////////////// Select Products / Items/////////////////////////////////////////

  $(function () {
    // $('#selectItemProd').click(function(){
    //   $('#itemProdDiv').toggleClass('selectItemProd');
    // });

    $('#selectItemProd').click(function() {
      if($('#itemProdDiv').hasClass('selectItemProd1')) {
          $('#itemProdDiv').removeClass('selectItemProd1').addClass('selectItemProd2');
      }
      else{
          $('#itemProdDiv').removeClass('selectItemProd2').addClass('selectItemProd1');
      };
      // Select Button Styles
      if($('#itemProdDiv').hasClass('selectItemProd2')) {
          $('#selectItemProd').removeClass('notSelectedBtn').addClass('itemProdSelectedBtn');
      }
      else{
          $('#selectItemProd').removeClass('itemProdSelectedBtn').addClass('notSelectedBtn');
      };
    });
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

///////////// Show User Img Selector /////////////////////
$(function (){
	$('#imgsToSelect').hide();
	$('#cancelSelectImgBtn').hide();

	$('#selectImgBtn').click(function() {
		$('#newInputs').hide( 500 );
		$('#imgsToSelect').show( 500 );
		$('#selectImgBtn').hide();
		$('#cancelSelectImgBtn').fadeIn( 400 );
	});
	$('#cancelSelectImgBtn').click(function() {
		$('#newInputs').show( 500 );
		$('#imgsToSelect').hide( 500 );
		$('#selectImgBtn').show();
		$('#cancelSelectImgBtn').hide();
  });
});

//////////// Select Img /////////////////////////////////////
$( ".Selecteable" ).click(function() {
  $( this ).toggleClass( "imgSelected" );
});

/// Bootstrap Switch ///
$("[name='status']").bootstrapSwitch();

/////////////// Select Colors ////////////////////////////////

function ColorSelection()
{  // Select Color
  $('.ColorSelect').click(function(){
    $(this).toggleClass('circleAddItemSelected');

    //Show Delete Color Btn
    if($('.ColorSelect').hasClass('circleAddItemSelected')) {
        $('.DelSelColors').removeClass('Hidden');
      }
      else {
        $('.DelSelColors').addClass('Hidden');
      }
  });
}
ColorSelection();

// Create a Li with the selected color
function PutDaCalar()
{
  $('.ColorSelector').click(function () {
    alert ("tocado");
  });
}
PutDaCalar();
