/*
$(window).scroll(function(){
  $('#wrapper')[0].scrollTop=$(window).scrollTop();
});*/

$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess('Grupo creado correctamente');
	if(get['msg']=='update')
		notifySuccess('Grupo modificado correctamente');
	$('#newuser').fadeIn(500);
	$('#viewlistbt').show();
	$('#viewlist').hide();
	$('#delselected').hide();
});

$(function(){
	////////////////////////////////////// Create/Update ///////////////////////////
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

	///////////////////////////////////// Load Image ///////////////////////////
	$("#groupimg").click(function(){
		$("#image").click();
	});

	$("#image").change(function(){
		//notifyInfo($(this).val());
		var process		= 'process.php?action=newimage';

		var haveData	= function(returningData)
		{
			//$("input,select").blur();
			//alert(returningData);
			//alert(returningData);
			$('#groupimage').val(returningData);
			$('#groupimg').attr('src',returningData);
			$('#groupimg').removeClass('Hidden');
			$('#image').parent().parent().children('input[type="text"]').val('');
			//notifyInfo(returningData);
			return false;

		}
		var noData		= function()
		{
			//document.location = target;
		}
		sumbitFields(process,haveData,noData);
	});


});

/////////////////////////// Profile Tree /////////////////////////////////////
function getCheckedProfiles()
    {
        var values = '';
        $(".ProfileCheckbox").each(function(){
            if($(this).is(":checked"))
                if(values=='')
                    values = $(this).val();
                else
                    values = values + ',' + $(this).val();
        });
        $("#profiles").val(values);
    }

    $(document).ready(function(){
        getCheckedProfiles();
    });

    $(function(){
        $(".ProfileCheckbox").click(function(){
            getCheckedProfiles();
        });
    });

/////////////////////////// Massive Delete /////////////////////////////////////
	$("#delselected").click(function(){
		alertify.confirm(utf8_decode('¿Desea eliminar los grupos seleccionados?'), function(e){
            if(e){
            	var result;
            	$(".deleteThis").each(function(){
            		var elem 	= $(this).find('.btndel');
            		var id 		= elem.attr('deleteElement');
            		var parents = elem.attr('deleteParent').split("/");
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
		                        notifyError('Hubo un problema al eliminar los grupos: '+data);
		                        result = data;
		                        return false;
		                    }else{
		                        parents.forEach(function(parent){
			                        $("#"+parent).slideUp();
			                    });
		                    }
		                }
			        });
            	});


            	if(result)
            	{
            		notifyError('Hubo un problema al eliminar los grupos: '+result);
            	}else{
            		$('#delselected').hide();
            		$(".deleteThis").each(function(){ $(this).removeClass('deleteThis'); });
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
		$(".listselect").each(function(){
			$(this).removeClass('deleteThis');
			$(this).removeClass('listselect');
		});
		$('div[id="viewgrid"]').show( 500 );
		$('div[id="viewlist"]').hide( 500 );
		$("#viewgridbt").hide();
		$("#viewlistbt").show( 0 );
		$('#delselected').hide();
	});


///////////////////// User Icons Del Modify Appears On Hover ///////////////////////

 // Del & Mod User Icons appearing onclick
$(function(){
	$('.userButtons').hide();
	$('.usergral').click(function() {
		$(this).find('.userButtons').toggle();
		$(this).find('.userMainSection').toggleClass("usergralselect", 500);
		$(this).find('.userMainSection').toggleClass("usergralselect", 500);
});

	// Select Users
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

	$(".listrow").click(function(){
		$(this).toggleClass("deleteThis");
		$(this).toggleClass("listselect");
		var totalSelected = 0;
		var admDelBtn;
		$(".listselect").each(function(){
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
