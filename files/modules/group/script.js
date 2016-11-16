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

			confirmText += " el grupo '"+$("#title").val()+"'";

			alertify.confirm(utf8_decode('¿Desea '+confirmText+' ?'), function(e){
				if(e)
				{
					var process		= '../../library/processes/proc.common.php?object=GroupData';
					if(BtnID=="BtnCreate")
					{
						var target		= 'list.php?element='+$('#title').val()+'&msg='+ $("#action").val();
					}else{
						var target		= 'new.php?element='+$('#title').val()+'&msg='+ $("#action").val();
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

///////////////// TREECHECKBOXES ///////////////////
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

///////////////// SELECT PROFILES /////////////////////
$(function(){
	$('.selectProfileTags').select2();

	if($('.selectProfileTags').length)
	{
		$('.selectProfileTags').select2({
			tags: true
		});
		$('.selectProfileTags').on("change", function (e) { selectProfiles(); });
	}
});

function selectProfiles()
{
	var profiles = "0";
	$("#profile").next('span').children('span').children('span').children('ul').children('.select2-selection__choice').each(function(){
		var optionName = $(this).attr("title");
		$("#profile").children("option").each(function(){
			if($(this).html()==optionName)
			{
				profiles += ","+$(this).attr("value");
			}
		});
	});
	$("#profiles").val(profiles);
}

///////////////// SELECT USERS /////////////////////
$(function(){
	$('.selectUserTags').select2();
	if($('.selectUserTags').length)
	{
		$('.selectUserTags').select2({
			tags: true
		});
		$('.selectUserTags').on("change", function (e) { selectUsers(); });
	}
});
function selectUsers()
{
	var users = "0";
	$("#user").next('span').children('span').children('span').children('ul').children('.select2-selection__choice').each(function(){
		var optionName = $(this).attr("title");
		$("#user").children("option").each(function(){
			if($(this).html()==optionName)
			{
				users += ","+$(this).attr("value");
			}
		});
	});
	$("#users").val(users);
}

///////////////////////////// UPLOAD IMAGE /////////////////////////////////////
$(function(){
	$("#image").change(function(){
		var process		= '../../library/processes/proc.common.php?action=newimage&object=GroupData';
		var haveData	= function(returningData)
		{
			$('#newimage').val(returningData);
			$(".MainImg").attr("src",returningData);
			$('.MainImg').addClass('pulse').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		      $(this).removeClass('pulse');
		    });
		}
		var noData		= function(){alert("No data");}
		sumbitFields(process,haveData,noData);
	});

	$('.imgSelectorContent').click(function(){
		$("#image").click();
	});
});
