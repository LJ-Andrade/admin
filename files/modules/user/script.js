/* 
$(window).scroll(function(){
  $('#wrapper')[0].scrollTop=$(window).scrollTop();
});*/

$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess('Usuario creado correctamente');
	if(get['msg']=='update')
		notifySuccess('Usuario modificado correctamente');
	$('#newuser').fadeIn(500);
	$('#viewlistbt').show();
	$('#viewlist').hide();
	$('#delselected').hide();
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
				//alert(returningData);
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
});	

/////////////////////////// Switch View Mode /////////////////////////////////////
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


///////////////////// User Icos Del Modify Appears On Hover ///////////////////////

 // Del & Mod User Icons appearing onclick
$(function(){
	$('.userButtons').hide(); 	
	$('.usergral').click(function() {
				$(this).find('.userButtons').toggle();
				$(this).find('.userMainSection').toggleClass("usergralselect", 500);
});

	// Select User
	$(".usergral").click(function(){
			$(this).toggleClass("usergralselect");
			var totalSelected = 0;
			$(".usergralselect").each(function(){
				totalSelected++;
			});
			if(totalSelected>2){
				$('#delselected').show();
			}else{
				$('#delselected').hide();
			}
	});

	//Unselect All Users
	$('*').click(function(){
		if($(this).attr('selecteableElement')!="yes"){
	    	console.log('entra');
	    	$('.usergral').removeClass('usergralselect');
	    }
	});

	// Hover Effect
	$('.userMainSection').hover(function() {
			$(this).addClass('userHover');
	});

	$('.userMainSection').mouseleave(function() {
			$(this).removeClass('userHover');
	});

	// Select multiple rows
	var isMouseDown = false, isHighlighted;
		$(".listrow")
			.mousedown(function () {
				isMouseDown = true;
				$(this).toggleClass("listselect");
				isHighlighted = $(this).hasClass("usergralselect");
				return false; // prevent text selection
			})
			.mouseover(function () {
				if (isMouseDown) {
					$(this).toggleClass("listselect", isHighlighted);
				}
			})
			.bind("selectstart", function () {
				return false;
			});
	
	$(document).mouseup(function () {isMouseDown = false;});


////////////////// User Creation Window /////////////////////////

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

	// Active Paused Product Switch
	$("[name='status']").bootstrapSwitch();

});



