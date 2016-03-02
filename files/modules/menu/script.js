$(document).ready(function(){
	if(get['msg']=='insert')
		notifySuccess('Menú creado correctamente');
	if(get['msg']=='update')
		notifySuccess('Menú modificado correctamente');
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
	$("[name='public']").bootstrapSwitch();
});	