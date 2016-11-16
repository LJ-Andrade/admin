///////////////////////// CREATE/EDIT ////////////////////////////////////
$(function(){
	$("#BtnCreate,#BtnCreateNext").click(function(){
		if(validate.validateFields(''))
		{
			var BtnID = $(this).attr("id")
			if(get['id']>0)
			{
				confirmText = "modificar";
				procText = "modificaci&oacute;n"
			}else{
				confirmText = "crear";
				procText = "creaci&oacute;n"
			}

			confirmText += " el usuario '"+$("#user").val()+"'";

			alertify.confirm(utf8_decode('¿Desea '+confirmText+' ?'), function(e){
				if(e)
				{
					var process		= '../../library/processes/proc.common.php?object=AdminData';
					if(BtnID=="BtnCreate")
					{
						var target		= 'list.php?element='+$('#user').val()+'&msg='+ $("#action").val();
					}else{
						var target		= 'new.php?element='+$('#user').val()+'&msg='+ $("#action").val();
					}
					var haveData	= function(returningData)
					{
						$("input,select").blur();
						notifyError("Ha ocurrido un error durante el proceso de "+procText+".");
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
///////////////////////////// Upload Image /////////////////////////////////////
$(function(){
	$("#image").change(function(){
		var process		= '../../library/processes/proc.common.php?action=newimage&object=AdminData';
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
}

function fillGroups()
{
	var profile = $('#profile').val();
	var admin 	= $('#id').val();
	var process = '../../library/processes/proc.common.php';

	var string      = 'profile='+ profile +'&admin='+ admin +'&action=fillgroups&object=AdminData';

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
                $('#groups-wrapper').html('<h4 class="subTitleB"><i class="fa fa-users"></i> Grupos</h4><select id="group" class="form-control select2 selectTags" multiple="multiple" disabled="disabled" data-placeholder="Seleccione los grupos" style="width: 100%;"></select>');
            }
            if($('.selectTags').length)
			{
				$('.selectTags').select2();
	            $('.selectTags').on("change", function () { setGroups(); });
	            setGroups();
			}
        }
    });
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

