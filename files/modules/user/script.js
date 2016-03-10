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

/////////////////////////// Massive Delete /////////////////////////////////////
	$("#delselected").click(function(){
		alertify.confirm(utf8_decode('¿Desea eliminar los usuarios seleccionados?'), function(e){
            if(e){
            	var result;
            	$(".usergralselect").each(function(){
            		var elem 	= $(this).find('.btndel');
            		var id 		= elem.attr('deleteElement');
            		var parent 	= elem.attr('deleteParent');
            		var process = elem.attr('deleteProcess');
	                
                	var string      = 'id='+ id + '&action=delete';
                	console.log(elem);
			        var data;
			        $.ajax({
			            type: "POST",
			            url: process,
			            data: string,
			            cache: false,
			            success: function(data){
		                    if(data)
		                    {
		                        notifyError('Hubo un problema al eliminar los usuarios: '+data);
		                        result = data;
		                        return false;
		                    }else{
		                        $("#"+parent).slideUp();
		                    }
		                }
			        });
            	});

            	if(result)
            	{
            		notifyError('Hubo un problema al eliminar los usuarios: '+result);
            	}else{
            		notifySuccess(utf8_decode('Los usuarios seleccionados han sido eliminados.'));
            	}
            }
        });
	})

/////////////////////////// Switch View Mode /////////////////////////////////////
	$("#viewlistbt").on( "click", function() {
		$(".usergralselect").each(function(){
			$(this).removeClass('deleteThis');
			$(this).removeClass('usergralselect');
			$(this).find('.userButtons').toggle();
			$(this).find('.userMainSection').toggleClass("usergralselect", 500);
		});

		$('div[id="viewgrid"]').hide( 500 );
		$('div[id="viewlist"]').show( 500 ); 
		$("#viewlistbt").hide();
		$("#viewgridbt").show( 0 );
		$('#delselected').hide();
	});

	$("#viewgridbt").on( "click", function() {
		$('div[id="viewgrid"]').show( 500 ); 
		$('div[id="viewlist"]').hide( 500 );
		$("#viewgridbt").hide();
		$("#viewlistbt").show( 0 );
		$('#delselected').hide();
	});


///////////////////// User Icos Del Modify Appears On Hover ///////////////////////

 // Del & Mod User Icons appearing onclick
$(function(){
	$('.userButtons').hide(); 	
	$('.usergral').click(function() {
		$(this).find('.userButtons').toggle();
		$(this).find('.userMainSection').toggleClass("usergralselect", 500);
		$(this).find('.userMainSection').toggleClass("usergralselect", 500);
});

	// Select User
	$(".usergral").click(function(){
		$(this).toggleClass("deleteThis");
		$(this).toggleClass("usergralselect");
		var totalSelected = 0;
		var admDelBtn;
		$(".usergralselect").each(function(){
			if($(this).hasClass('undeleteable'))
			{
				admDelBtn = $(this);
			}else{
				totalSelected++;
			}
				
		});
		if(totalSelected>1 && !admDelBtn){
			$('#delselected').show();
		}else{
			$('#delselected').hide();
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


///////// Responsivity List View //////////////////////////////////

 if (screen.width < 1200) {
					$(".titlist4, .col4listus, .titlist5, .col5listus").hide();
					}
					else {

					$(".titlist4, .col4listus, .titlist5, .col5listus").show();
					}

 if (screen.width < 490) {
					$(".viewlist").hide();
					}
					else {
					$(".viewgrid").show();
					}
});



