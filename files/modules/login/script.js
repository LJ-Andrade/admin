
$(document).ready(function() {
	if(get['error']=='login'){
		notifyError("Para ingresar a esta sección debe estar conectado.");
	}
});

function sumbitLogin(){
	var password 	= $("#password").val();
	var user		= $("#user").val();
	var target		= '../main/main.php?msg=logok';
	var error		= 'Verifique los datos ingresados';
	var values		= 'user='+ user + '&password=' + password + '&target=' + target + '&error=' + error ;
	var	process		= "process.login.php";
	
	$.ajax({
			type: "POST",
			url: process,
			data: values,
			cache: false,
			success: function(data){
				if(!data){
					document.location = target;
				}else{
					alertify.error(error);
					//$("#ShowError").html(error);
					//$("#ShowErrorWrapper").fadeIn(1000).delay(5000).fadeOut(1000);//.setTimeout(function() {$("#ShowError").fadeOut();}, 5000);
					//alert(error);
				}
			}
	});
}

$(function(){
	$(".ButtonLogin").click(function(){
		//if(validate.validateFields('')){
			sumbitLogin();
		//}
	});
	
	$("input").keypress(function(e){
		if(e.which==13){
			$(".ButtonLogin").click();
		}
	});
	
});
