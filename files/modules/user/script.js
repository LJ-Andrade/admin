$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess("El usuario '"+get['user']+"' ha sido creado correctamente");
	if(get['msg']=='update')
		notifySuccess("El usuario '"+get['user']+"' ha sido modificado correctamente");
});


///////////////////////// CREATE/EDIT USER ////////////////////////////////////
$(function(){
	$("#BtnCreate,#BtnCreateNext").click(function(){
		if(validate.validateFields(''))
		{
			var BtnID = $(this).attr("id")
			if(get['id']>0)
				confirmText = "modificar";
			else
				confirmText = "crear";

			confirmText += " el usuario '"+$("#user").val()+"'";

			alertify.confirm(utf8_decode('¿Desea '+confirmText+' ?'), function(e){
				if(e)
				{
					toggleLoader();
					var process		= 'process.php';
					if(BtnID=="BtnCreate")
					{
						var target		= 'list.php?user='+$('#user').val()+'&msg='+ $("#action").val();
					}else{
						var target		= 'new.php?user='+$('#user').val()+'&msg='+ $("#action").val();
					}
					var haveData	= function(returningData)
					{
						$("input,select").blur();
						notifyError("Ha ocurrido un error durante el proceso de creaci&oacute;n.");
						console.log(returningData);
					}
					var noData		= function()
					{
						document.location = target;
					}
					sumbitFields(process,haveData,noData);
					toggleLoader();
				}
			});
		}
	});

	$("input").keypress(function(e){
		if(e.which==13){
			$("#BtnCreate").click();
		}
	});
});
// /////////////////////////// Upload Image /////////////////////////////////////
$(function(){
	$("#image").change(function(){
		toggleLoader();
		var process		= 'process.php?action=newimage';
		var haveData	= function(returningData)
		{
			$('#newimage').val(returningData);
			$(".MainImg").attr("src",returningData);
			$('.MainImg').addClass('pulse').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		      $(this).removeClass('pulse');
		    });
			$('#UserImages').append('<li><img src="'+returningData+'" class="ImgSelecteable"></li>');
			selectImg();
		}
		var noData		= function(){}
		sumbitFields(process,haveData,noData);
		toggleLoader();
	});

	$('.imgSelectorContent').click(function(){
		$("#image").click();
	});

	selectImg();
});

function selectImg()
{
	$(".ImgSelecteable").click(function(){
		var src = $(this).attr("src");
		$(".MainImg").attr("src",src);
		$('.MainImg').addClass('pulse').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	      $(this).removeClass('pulse');
	    });
		$("#newimage").val(src);
	});
}

//////////////// Select Input With Tags //////////////////////////
$(function() {
	if($('.selectTags').length)
	{
		$('.selectTags').select2({
			tags: true
		});
		$('.selectTags').on("change", function (e) { setGroups(); });
	}
});

// /////////////////////////// Fill Groups /////////////////////////////////////
$(document).ready(function(){
	fillGroups();
	setGroups();
});

$(function(){
	$('#profile').change(function(){
		toggleLoader();
		fillGroups();
		toggleLoader();
	});
});

function setGroups()
{
	var groups = "0";
	$(".select2-selection__choice").each(function(){
		var optionName = $(this).attr("title");
		$("#group").children("option").each(function(){
			if($(this).html()==optionName)
			{
				groups += ","+$(this).attr("value");
			}
		});
	});
	$("#groups").val(groups);
}

function fillGroups()
{
	toggleLoader();
	var profile = $('#profile').val();
	var admin 	= $('#id').val();
	var process = 'process.php';

	var string      = 'profile='+ profile +'&admin='+ admin +'&action=fillgroups';

    var data;
    $.ajax({
        type: "POST",
        url: process,
        data: string,
        cache: false,
        success: function(data){
            if(data)
            {
                $('#groups-wrapper').html(data);
            }else{
                $('#groups').html('<h4 class="subTitleB"><i class="fa fa-users"></i> Grupos</h4><select id="group" class="form-control select2 selectTags" multiple="multiple" disabled="disabled" data-placeholder="Seleccione los grupos" style="width: 100%;"></select>');
            }
            if($('.selectTags').length)
			{
				$('.selectTags').select2();
	            $('.selectTags').on("change", function () { setGroups(); });
			}
        }
    });
    toggleLoader();
}

///////////////// TreeCheckboxes Multiple Select ///////////////////
$(document).ready(function(){
	if($('#treeview-checkbox').length)
	{
		$('#treeview-checkbox').treeview();
		fillCheckboxTree();
	}
});

$(function() {
	$(".tw-control").click(function(){
		var selected = "0"
		$(".tw-control").each(function(){
			if($(this).is(":checked"))
			{
				selected += ","+$(this).parent().attr("data-value");
			}
		});
		$("#menues").val(selected);
	});
});

function fillCheckboxTree()
{
	var menues = $("#menues").val().split(',');
	$(".tw-control").each(function(menu){
		if(inArray($(this).parent().attr("data-value"),menues))
		{
			//alert($(this).parent().attr("data-value"));
			$(this).click();
		}
	});
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// LIST & GRID ////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////// Delete Element /////////////////////////////////////
function deleteListElement()
{
	$(".deleteElement").click(function(){
		var element     = $(this);
		var elementID	= $(this).attr("id").split("_");
		var id			= elementID[1];
		var row			= $("#row_"+id);
		var title		= row.attr("title");
		alertify.confirm(utf8_decode('¿Desea eliminar a '+title+'?'), function(e){
			if(e)
			{
				var result;
				toggleLoader();
				result = deleteElement(element);
				toggleLoader();
	
				if(result)
				{
					notifySuccess(utf8_decode(title+' ha sido eliminado.'));
				}else{
					notifyError('Hubo un problema al intentar eliminar a '+title);
				}
			}
	
		});
		return false;
	});
}
deleteListElement();
/////////////////////////// Activate Element /////////////////////////////////////
function activateListElement()
{
	$(".activateElement").click(function(){
		var element     = $(this);
		var elementID	= $(this).attr("id").split("_");
		var id			= elementID[1];
		var row			= $("#row_"+id);
		var title		= row.attr("title");
		alertify.confirm(utf8_decode('¿Desea activar al usuario '+title+'?'), function(e){
			if(e)
			{
				var result;
				toggleLoader();
				result = activateElement(element);
				toggleLoader();
	
				if(result)
				{
					notifySuccess(utf8_decode(title+' ha sido activado.'));
				}else{
					notifyError('Hubo un problema al intentar activar al usuario '+title);
				}
			}
	
		});
		return false;
	});
}
activateListElement();
/////////////////////////// Massive Element Delete /////////////////////////////////////
function massiveElementDelete()
{
	$(".deleteSelectedAbs").click(function(){
		alertify.confirm(utf8_decode('¿Desea eliminar los usuarios seleccionados?'), function(e){
	        if(e){
	        	toggleLoader();
	        	var result;
	        	$(".SelectedRow").children('.listActions').children('div').children('.deleteElement').each(function(){
	        		result = deleteListElement($(this));
	        	});
				toggleLoader();
	
	        	if(result)
	        	{
	        		$('.deleteSelectedAbs').addClass('Hidden');
	        		notifySuccess(utf8_decode('Los usuarios seleccionados han sido eliminados.'));
	        	}else{
	        		notifyError('Hubo un problema al intentar eliminar los usuarios');
	        	}
	        }
	    });
	});
}
massiveElementDelete();