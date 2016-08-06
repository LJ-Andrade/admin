$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess('Categor&iacute;a creada correctamente');
	if(get['msg']=='update')
		notifySuccess('Categor&iacute;a modificada correctamente');
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



/////////////////////////// Massive Delete /////////////////////////////////////
	$("#delselected").click(function(){
		alertify.confirm(utf8_decode('¿Desea eliminar las categor&iacute;as seleccionadas?'), function(e){
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
		                        //notifyError('Hubo un problema al eliminar los usuarios: '+data);
		                        result = data;
		                        return false;
		                    }else{
		                        parents.forEach(function(parent){
			                        $("#"+parent).slideUp();
			                    });
			                    $(".deleteThis").each(function(){ $(this).removeClass('deleteThis'); });
		                    }
		                }
			        });
            	});


            	if(result)
            	{
            		notifyError('Hubo un problema al eliminar las categorías: '+result);
            	}else{
            		$('#delselected').hide();
            		notifySuccess(utf8_decode('Las categor&iacuteas seleccionadas han sido eliminadas.'));
            	}
            }
        });
	})


///////////////////// User Icos Del Modify Appears On Hover ///////////////////////

 // Del & Mod User Icons appearing onclick
	$(".listrow").click(function(){
		$(this).toggleClass("deleteThis");
		$(this).toggleClass("listselect");
		var totalSelected = 0;
		$(".listselect").each(function(){
			totalSelected++;
		});
		if(totalSelected>1){
			$('#delselected').show();
		}else{
			$('#delselected').hide();
		}
	});

///////////////////// Categories Update Button ///////////////////////
	$("#refresh_categories").click(function(){
		var site = $(this).attr("site");
		var process = "process.update.php";
		var string	= "action=update&site="+site;
		$.ajax(
		{
            type: "POST",
            url: process,
            data: string,
            cache: false,
            success: function(data){
                if(data)
                {
                    notifyError('Hubo un problema al actualizar las categor&iacute;as de '+site);
                    console.log(data);
                }else{
                    notifySuccess('Las categor&iacute;as de '+site+' han sido actualizadas correctamente');
                    
                }
            }
        });
	});
	
});