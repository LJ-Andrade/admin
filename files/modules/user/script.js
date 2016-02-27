/*function sumbitInfo(){
			var password 		= $("#password").val();
			var user			= $("#user").val();
			var profile			= $("#profile").val();
			var first_name		= utf8_encode($("#first_name").val());
			var last_name		= utf8_encode($("#last_name").val());
			if($("#status").is(':checked')){
				var status = 'A';
			}else{
				var status = 'I';
			}
			var target		= '../user/list.php?msg=usercreated';
			var error		= 'Verifique los datos ingresados';
			var values		= 'action=insert&user='+ user + '&password=' + password + '&profile=' + profile + '&first_name=' + first_name + '&last_name=' + last_name + '&status=' + status;
			var	process		= "process.php";
			//var data		= submitAJAX(process,values);
			$.ajax({
					type: "POST",
					url: process,
					data: values,
					cache: false,
					success: function(data){
						if(!data){
							document.location = target;
						}else{
							//alertify.error(error);
							//$("#ShowError").html(error);
							//$("#ShowErrorWrapper").fadeIn(1000).delay(5000).fadeOut(1000);//.setTimeout(function() {$("#ShowError").fadeOut();}, 5000);
							alert(error);
						}
					}
			});
} */

$(document).ready(function(){
	alertify.success("Hola");
	alertify.alert("Hola");
	alertify.error("Hola");
});


$(function(){
	$("#create").click(function(){
		if(validate.validateFields('')){
			var process		= 'process.php';
	 		var target		= 'list.php';
	 		var haveData	= function(returningData)
	 		{
	 			$("input,select").blur();
				alertyfy.error(returningData,10000);
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

////////////////////////////// Make "Edit" and "Delete" Icons Appear ///////////////////////////////////////////////////////////////////////////////////

