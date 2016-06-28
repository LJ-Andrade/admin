$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess('Usuario creado correctamente');
	if(get['msg']=='update')
		notifySuccess('Usuario modificado correctamente');
});

$(function(){
	$("#generate").click(function(){
		// if(validate.validateFields(''))
		// {
			alertify.confirm(utf8_decode('¿Desea crear un usuario de testeo ?'), function(e){
				if(e)
				{
					var process		= 'process.php';
					//var target		= 'generate_te.php?status='+status+'&msg='+ $("#action").val();
					var haveData	= function(returningData)
					{
						//$("input,select").blur();
						//notifyError(returningData);
						console.log(returningData);
						notifySuccess('Usuario de testeo creado satisfactoriamente')
					}
					var noData		= function()
					{
						//document.location = target;
						//alert('')

					}
					sumbitFields(process,haveData,noData);
				}
			});
		//}
	});
});

/////////////////////////// Upload Image /////////////////////////////////////
// 	$("#image").change(function(){
// 		var process		= 'process.php?action=newimage';
// 		var haveData	= function(returningData)
// 		{
// 			$('#newimage').val(returningData);
// 			$('#ImageBox').append('<li><img src="'+returningData+'" alt="" class="img-responsive" ><span class="GenImg RecentlyAdded"><i class="fa fa-trash delImgIco"></i></span></li>');
// 			SelectThumbImg();
// 			CancelSelectionWindows();
// 			ImageGalleryHover();
// 			DeleteImageGallery();
// 			BtnBack();
// 			$('.RecentlyAdded').click();
// 			$('.RecentlyAdded').removeClass('RecentlyAdded');
// 			return false;

// 		}
// 		var noData		= function()
// 		{
// 			//document.location = target;
// 		}
// 		sumbitFields(process,haveData,noData);
// 	});

// 	$('.SelectNewImg').click(function(){
// 		$("#image").click();
// 	});

// /////////////////////////// Fill Groups /////////////////////////////////////
// 	$('#profile').change(function(){
// 		fillGroups();
// 	});
// });

// function fillGroups()
// {
// 	toggleLoader();
// 	var profile = $('#profile').val();
// 	var admin 	= $('#id').val();
// 	var process = 'process.php';

// 	var string      = 'profile='+ profile +'&admin='+ admin +'&action=fillgroups';

//     var data;
//     $.ajax({
//         type: "POST",
//         url: process,
//         data: string,
//         cache: false,
//         success: function(data){
//             if(data)
//             {
//                 $('#GroupTree').html(data);
//             }else{
//                 $('#GroupTree').html('');
//             }
//             getCheckedGroups();
//             clickGroupCheckbox();
//             $("#groups").val('');
//         }
//     });
//     toggleLoader();
// }

// function getCheckedGroups()
// {
//     var values = '';
//     $(".GroupCheckbox").each(function(){
//         if($(this).is(":checked"))
//             if(values=='')
//                 values = $(this).val();
//             else
//             	values = values + ',' + $(this).val();
//     });
//     $("#groups").val(values);
// }

// function clickGroupCheckbox()
// {
// 	$(".GroupCheckbox").click(function(){
//    		getCheckedGroups();
//     });
// }

// $(document).ready(function(){
// 	fillGroups();
//     getCheckedGroups();
// });


// /////////////////////////// Massive Delete /////////////////////////////////////
// 	$("#delselected").click(function(){
// 		alertify.confirm(utf8_decode('¿Desea eliminar los usuarios seleccionados?'), function(e){
//             if(e){
//             	var result;
//             	$(".deleteThis").each(function(){
//             		var elem 	= $(this).find('.deleteElement');
//             		var id 		= elem.attr('deleteElement');
//             		var parents = elem.attr('deleteParent').split("/");
//             		var process = elem.attr('deleteProcess');

//                 	var string      = 'id='+ id + '&action=delete';
//                 	console.log(elem);
// 			        var data;
// 			        $.ajax({
// 			            type: "POST",
// 			            url: process,
// 			            data: string,
// 			            cache: false,
// 			            success: function(data){
// 		                    if(data)
// 		                    {
// 		                        notifyError('Hubo un problema al eliminar los usuarios: '+data);
// 		                        result = data;
// 		                        return false;
// 		                    }else{
// 		                        parents.forEach(function(parent){
// 			                        $("#"+parent).addClass('animated zoomOut');
//                         			$("#"+parent).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){$("#"+parent).remove();});
// 			                    });
// 		                    }
// 		                }
// 			        });
//             	});


//             	if(result)
//             	{
//             		notifyError('Hubo un problema al eliminar los usuarios: '+result);
//             	}else{
//             		$('#delselected').addClass('Hidden');
//             		$(".deleteThis").each(function(){ $(this).removeClass('deleteThis'); });
//             		notifySuccess(utf8_decode('Los usuarios seleccionados han sido eliminados.'));
//             	}
//             }
//         });
// 	});


// ///////////////////// User Icons Del Modify ///////////////////////

	

// 	// $(".listrow").click(function(){
// 	// 	$(this).toggleClass("deleteThis");
// 	// 	$(this).toggleClass("listselect");
// 	// 	var totalSelected = 0;
// 	// 	var admDelBtn;
// 	// 	$(".listselect").each(function(){
// 	// 		if($(this).hasClass('undeleteable'))
// 	// 		{
// 	// 			admDelBtn = $(this);
// 	// 		}else{
// 	// 			totalSelected++;
// 	// 		}

// 	// 	});
// 	// 	if(totalSelected>1 && !admDelBtn){
// 	// 		$('#delselected').removeClass('Hidden');
// 	// 	}else{
// 	// 		$('#delselected').addClass('Hidden');
// 	// 	}
// 	// });



// $(function(){
// 	// Hover Effect
	

// 	// // Select multiple rows
// 	// var isMouseDown = false, isHighlighted;
// 	// 	$(".listrow")
// 	// 		.mousedown(function () {
// 	// 			isMouseDown = true;
// 	// 			//$(this).click("listselect");
// 	// 			isHighlighted = $(this).hasClass("listselect");
// 	// 			return false; // prevent text selection
// 	// 		})
// 	// 		.mouseover(function () {
// 	// 			if (isMouseDown) {
// 	// 				$(this).toggleClass("listselect", isHighlighted);
// 	// 			}
// 	// 		})
// 	// 		.bind("selectstart", function () {
// 	// 			return false;
// 	// 		});

// 	// $(document).mouseup(function () {isMouseDown = false;});

// ////////////////// User Creation Window /////////////////////////

// 	// Insert Img
// 	var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
// 	var fileInput = $(':file').wrap(wrapper);

// 	fileInput.change(function(){
// 	    $this = $(this);
// 	    $('#file').text($this.val());
// 	})

// 	$('#file').click(function(){
// 	    fileInput.click();
// 	}).show();

// 	// Active Paused Product Switch
// 	$("[name='status']").bootstrapSwitch();


// });
