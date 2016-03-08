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

///////////////////////// Show or Hide Icons On subtop /////////////////////////////
/*
$(document).ready(function() { 
			$('#showitemfiltersuser').click(function() {
						$('#filtersuser').toggle("slide");
			});
			$('#viewlistbt').show( 0 );
			$('#newuser').hide();
			$('#volverusers').fadeIn( 500 );
			$('#showitemfiltersuser').show( 0 );
});
*/

/////////////////////// FIX //////////////////////////////////////////////////////
$(function(){
	//// Icons appearing
	$('.btnuser').hide();
	
	$('.usergral').click(function() {
		$(this).find('.btnuser').fadeToggle();
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

	// Active Inactive Switch
	$("[name='my-checkbox']").bootstrapSwitch();

	// Show Img selection div
	$('#chooseimg').click(function() {
		$('#itemimg').toggle("slide");
		$('#chooseimg').hide( 100 );
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

	// Caracters limiter
	$('input, textarea').keyup(function() {
		var max = $(this).attr('maxLength');
		var curr = this.value.length;
		var percent = (curr/max) * 100;
		var indicator = $(this).parent().children('.indicator-wrapper').children('.indicator').first();

		// Shows characters left
		indicator.children('.current-length').html(max - curr);

		// Change colors periodically
		if (percent > 30 && percent <= 50) { indicator.attr('class', 'indicator low'); }
		else if (percent > 50 && percent <= 70) { indicator.attr('class', 'indicator med'); }
		else if (percent > 70 && percent < 100) { indicator.attr('class', 'indicator high'); }
		else if (percent == 100) { indicator.attr('class', 'indicator full'); }
		else { indicator.attr('class', 'indicator empty'); }
		indicator.width(percent + '%');
	});

	// Active Inactive Switch
	$("[name='status']").bootstrapSwitch();



///////////////////// User Icos Del Modify Appears On Hover ///////////////////////
	/*
	var hoverstyle = {
			backgroundColor : "rgba(255,255,255, .3)",
	};
	var unhoverlol = {
			backgroundColor : "transparent",
	};
	*/
	// Select User
	$(".usergral").click(function(){
			$(this).toggleClass("usergralselect");
			var totalSelected = 0;
			$(".usergralselect").each(function(){
				totalSelected++;
			});
			if(totalSelected>1){
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
	$('.usergral').hover(function() {
			$(this).addClass('userHover');
	});

	$('.usergral').mouseleave(function() {
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

});



