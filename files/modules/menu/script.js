$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess('Menú creado correctamente');
	if(get['msg']=='update')
		notifySuccess('Menú modificado correctamente');
});

$(function(){
	$("#create").click(function(){
		if(validate.validateFields('')){
			var process		= 'process.php';
	 		var target		= 'list.php?msg='+ $("#action").val();
	 		var haveData	= function(returningData)
	 		{
	 			$("input,select").blur();
				notifyError(returningData);
	 		}
	 		var noData		= function()
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


	// Active Inactive Switch
	$("[name='public']").bootstrapSwitch();
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

$(function() {
		$('#delselecteduser').hide();
		$('#optionsmenu').hide();
		$('.listrow').click(function() {
			$('#optionsmenu').fadeIn();
			$('#delselecteduser').fadeIn();
			
		})
});

// $(document).ready(function() { 
// 			$('#showitemfiltersuser').click(function() {
// 						$('#filtersuser').toggle("slide");
// 			});
// 			$('#viewlistbt').show( 0 );
// 			$('#newuser').hide();
// 			$('#volverusers').fadeIn( 500 );
// 			$('#showitemfiltersuser').show( 0 );
// });