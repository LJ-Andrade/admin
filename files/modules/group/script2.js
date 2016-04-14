$(document).ready(function() {
    submitProfile($("#profile_id").val());
	if(get['id']=='newprofile')
	{
		$("#profiles").hide();
		$("#new_profile").show();
		$("#list_title").html("Nuevo Perfil");
	}
});

function hideNewProfile()
{
	$("#name").val("");
	$("#profiles").show();
	$("#new_profile").hide();
	$("#list_title").html("Editar Perfiles");
}


$(function(){
	//SAVE NEW PROFILE
	$("#SubmitButton").click(function(){
		if(validate.validateFields('new')){
			var name		= $("#name").val();
			var string		= 'name='+ name + '&action=new';
			var	process		= "process.abm.php";
			var profiles	= $("#profile_id");
			
			$.ajax({
					type: "POST",
					url: process,
					data: string,
					cache: false,
					success: function(data){
						if(data){
								//alert(data);
								profiles.append('<option value="'+ data +'">' + name + '</option>');
								profiles.val(data);
								profiles.change();
						}
						
					}
			});
			hideNewProfile();
		}
		$("#name").focus();
		$("#name").blur();
	});
	
	$("input").keypress(function(e){
		if(e.which==13){
			$("#SubmitButton").click();
		}
	});
	
	
	//HIDE NEW PROFILE
	$("#CancelButton").click(function(){
		hideNewProfile();
	});
	
	//DISPLAY NEW PROFILE
	$("#newProfile").click(function() {
        $("#profiles").hide();
		$("#new_profile").show();
		$("#list_title").html("Nuevo Perfil");
		//DEFAULT DATA EFFECTS
		$("#name").focus();
		$("#name").blur();
    });
	
	
	//LOAD PROFILE RELATIONS
	$("#profile_id").change(function(){
		
		submitProfile($(this).val());
		
	});
	
	// LIST ACTIONS
	$("img,input:button").click(function(){
		var info	= $(this).attr("id").split('_');
		var action	= info[0];
		var id		= info[1];
		
		switch(action){
			case "view": 	window.location.href = "view.php?id="+id; break;
			case "edit": 	window.location.href = "edit.php?id="+id; break;
			case "new": 	window.location.href = "edit.php?id="+id; break;
			case "delete": 	
			showPopUpConfirm('<div style="padding:10px;">¿Desea eliminar este registro?</div>');
			$("#PopUpConfirm").click(function(){
				var string		= 'id='+ id + '&action=delete';
				var	process		= "process.abm.php";
				
				$.ajax({
						type: "POST",
						url: process,
						data: string,
						cache: false,
						success: function(data){
							if(data){
									$("#Row"+id).slideUp();
							}
							
						}
				});
			});
			break;
		}
	});
	
});

function submitProfile(id)
{
	var string		= 'id='+ id + '&action=fill';
	var	process		= "process.abm.php";
		
		//alert('');
		
		$.ajax({
			type: "POST",
			url: process,
			data: string,
			cache: false,
			success: function(data){
				if(data){
					$("#profile_content").html(data);
					profileActions();
				}else{
					$("#profile_content").html("");
				}
				
			}
		});
}

function profileActions()
{
	// TOGGLE MENUES
	$(".Parent").click(function(){
		var id = $(this).attr("id");
		$("#Child"+id).slideToggle();
		if($("#img"+id).hasClass("ArrowDown"))
		{
			$("#img"+id).removeClass("ArrowDown");
			$("#img"+id).addClass("ArrowLeft");
		}else{
			$("#img"+id).removeClass("ArrowLeft");
			$("#img"+id).addClass("ArrowDown");
		}
	});
	
	$(".MenuCheckbox").change(function(){
		var id	= $(this).attr("id").split("menu");
		id	= id[1];
		if($(this).is(":checked"))
		{
			$("#Child"+id).slideDown();
			$(".Menu"+id).attr("disabled",false);
			$("#img"+id).removeClass("ArrowDown");
			$("#img"+id).addClass("ArrowLeft");
		}else{
		   	$(".Menu"+id).attr("checked",false); 
		   	$(".Menu"+id).change();
		   	$(".Menu"+id).attr("disabled",true);
           	
			//$("#Child"+id).slideUp();
		}
	});
	
	// SAVE CHANGES
	$(".MenuCheckbox").change(function(){
		
		var action;
		if($(this).is(":checked"))
			action = "insert";
		else
			action = "delete_relation";
		
		
		
		
		var string		= 'id='+ $(this).val() + '&profile=' + $("#ProfileID").val() + '&action=' + action;
		var	process		= "process.abm.php";
		
		$.ajax({
				type: "POST",
				url: process,
				data: string,
				cache: false,
				
		});
	});
}