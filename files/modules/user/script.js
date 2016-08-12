$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess("Usuario'"+get['user']+"' creado correctamente");
	if(get['msg']=='update')
		notifySuccess('Usuario modificado correctamente');
});

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
					// var status = 'I';
					// if($("#status").is(':checked'))
					// 	status = 'A';

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
		var process		= 'process.php?action=newimage';
		var haveData	= function(returningData)
		{
			$('#newimage').val(returningData);
			$(".MainImg").attr("src",returningData);
			$('#UserImages').append('<li><img src="'+returningData+'" class="ImgSelecteable"></li>');
			selectImg();
		}
		var noData		= function(){}
		sumbitFields(process,haveData,noData);
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
		$("#newimage").val(src);
	});
}

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

//////////////// Select Input With Tags //////////////////////////
$(function() {
	$('.selectTags').select2({
		tags: true
	});
	
	$('.selectTags').on("change", function (e) { setGroups(); });
});

// /////////////////////////// Fill Groups /////////////////////////////////////
$(document).ready(function(){
	fillGroups();
	setGroups();
});

$(function(){
	$('#profile').change(function(){
		fillGroups();
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
	//alert(groups);
}

function fillGroups()
{
	//$('.selectTags').select2().val(["CA", "AL"]).trigger("change");
	//toggleLoader();
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
                //$('.selectTags').select2().val(["CA", "AL"]).trigger("change");
                $('#groups-wrapper').html(data);
                //console.log(data);
                //$('#groups').attr("disabled","");
            }else{
                $('#groups').html('<h4 class="subTitleB"><i class="fa fa-users"></i> Grupos</h4><select id="group" class="form-control select2 selectTags" multiple="multiple" disabled="disabled" data-placeholder="Seleccione los grupos" style="width: 100%;"></select>');
                //console.log("empty groups");
                //$('#groups').attr("disabled","disabled");
            }
			$('.selectTags').select2();
            $('.selectTags').on("change", function () { setGroups(); });
            // getCheckedGroups();
            // clickGroupCheckbox();
        }
    });
    //toggleLoader();
}

///////////////// TreeCheckboxes Multiple Select ///////////////////
$(document).ready(function(){
	$('#treeview-checkbox').treeview();
	fillCheckboxTree();
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
