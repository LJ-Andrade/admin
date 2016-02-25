function sumbitInfo(){
			var title 		= $("#title").val();
			var link		= $("#link").val();
			var status		= $("#status").val();
			var parent		= $("#parent").val();
			var position	= $("#position").val();
			var icon		= $("#icon").val();
			var action 		= $("#action").val();
			if($("#public").is(':checked')){
				var publicMenu = 'Y';
			}else{
				var publicMenu = 'N';
			}
			var target		= 'list.php?msg=created';
			var error		= 'Verifique los datos ingresados';
			var values		= 'action='+ action +'&title='+ title + '&link=' + link + '&parent=' + parent + '&position=' + position + '&icon=' + icon + '&public=' + publicMenu + '&status=' + status;
			var	process		= "process.php";
			
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
							alert(error+": "+ data);
						}
					}
			});
			
			
			

}

$(function(){
	$("#create").click(function(){
		//if(validate.validateFields('')){
			sumbitInfo();
		//}
	});
	
	$("input").keypress(function(e){
		if(e.which==13){
			$("#create").click();
		}
	});
	
});