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

			confirmText += " el menú '"+utf8_encode($("#title").val())+"'";

			alertify.confirm(utf8_decode('¿Desea '+confirmText+' ?'), function(e){
				if(e)
				{
					toggleLoader();
					var process		= '../../library/processes/proc.common.php?object=Menu';
					if(BtnID=="BtnCreate")
					{
						var target		= 'list.php?element='+utf8_encode($('#title').val())+'&msg='+ $("#action").val();
					}else{
						var target		= 'new.php?element='+utf8_encode($('#title').val())+'&msg='+ $("#action").val();
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

$(function(){
	$("#create").click(function(){
		if(validate.validateFields('')){
			var process		= 'process.php';
	 		var target		= 'list.php?msg='+ $("#action").val();
	 		var haveData	= function(returningData)
	 		{
	 			$("input,select").blur();
				notifyError(returningData);
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

	// Active Inactive Switch
	//$("[name='public']").bootstrapSwitch();
});



/////////////// Bootstrap Switch ////////////////////
$(function(){
	$("#public").bootstrapSwitch();
	$("#status").bootstrapSwitch();
});


/////////////// ICON SELECTION //////////////////////

$('.IconInput').click(function() {
	$('#iconModal').modal('show');
});


////////// Menu Icon Selection Marker ///////////////
$('.iconModalContent i').click(function(e){
	$('#iconModal').modal('hide');
	$('.IconInput').html($(this));
	var iconClass = $(this).attr("class");
	var icon = iconClass.split(" ");
	$('#icon').val(icon[2]);
});

///////////////// SELECT GROUPS /////////////////////
$(function(){
	$('.selectGroupTags').select2();

	if($('.selectGroupTags').length)
	{
		$('.selectGroupTags').select2({
			tags: true
		});
		$('.selectGroupTags').on("change", function (e) { selectGroups(); });
	}
});

function selectGroups()
{
	var groups = "0";
	$("#group").next('span').children('span').children('span').children('ul').children('.select2-selection__choice').each(function(){
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