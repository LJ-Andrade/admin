///////////////////////// CREATE/EDIT ////////////////////////////////////
$(function(){
	$("#BtnCreate,#BtnCreateNext").on("click",function(e){
		e.preventDefault();
		if(validate.validateFields('new_company_form'))
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

			confirmText += " la empresa '"+$("#name").val()+"'";

			alertify.confirm(utf8_decode('¿Desea '+confirmText+' ?'), function(e){
				if(e)
				{
					var process		= '../../library/processes/proc.common.php?object=Company';
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

///////////////////////// CREATE/EDIT FORM FUNCTIONS ////////////////////////////////////
$(function(){
	$("#agent_add").on("click",function(e){
		e.preventDefault();
		if(validate.validateFields('new_agent_form'))
		{
			var name = $('#agentname').val();
			var charge = $('#agentcharge').val();
			var email = $('#agentemail').val();
			var phone = $('#agentphone').val();
			if(!$("#total_agents").val() || $("#total_agents").val()=='undefined')
				$("#total_agents").val(0);
			var total = parseInt($("#total_agents").val())+1;
			
			
			$("#total_agents").val(total);
			var agent = $("#total_agents").val();
			
			$("#agent_list").append('<div class="col-md-4 col-sm-6 col-xs-12 AgentCard"><div class="info-card-item"><input type="hidden" id="agent_name_'+agent+'" value="'+name+'" /><input type="hidden" id="agent_charge_'+agent+'" value="'+charge+'" /><input type="hidden" id="agent_email_'+agent+'" value="'+email+'" /><input type="hidden" id="agent_phone_'+agent+'" value="'+phone+'" /><div class="close-btn DeleteAgent"><i class="fa fa-times"></i></div><span><i class="fa fa-user"></i> <b>'+name+'</b></span> <br><span><i class="fa fa-briefcase"></i> '+charge+'</span> <br><span><i class="fa fa-envelope"></i> '+email+'</span> <br><span><i class="fa fa-phone"></i> '+phone+'</span> <br></div></div>');
			
			$('#agentname').val('');
			$('#agentcharge').val('');
			$('#agentemail').val('');
			$('#agentphone').val('');
			$('#agent_form').addClass('Hidden');
			$('#BtnCreate').removeClass('disabled-btn');
			$('#BtnCreate').prop("disabled", false);
			$('#BtnCreateNext').removeClass('disabled-btn');
			$('#BtnCreateNext').prop("disabled", false);
			$("#empty_agent").remove();
			DeleteAgent();
		}
	});
	
	
});

function DeleteAgent()
{
	$(".DeleteAgent").on("click",function(event){
		event.preventDefault();
		$(this).parents(".AgentCard").remove();
	});
}
///////////////////////// UPLOAD IMAGE ////////////////////////////////////
$(function(){
	$("#image_upload").on("click",function(){
		$("#image").click();	
	});
	
	$("#image").change(function(){
		var process		= '../../library/processes/proc.common.php?action=newimage&object=Company';
		var haveData	= function(returningData)
		{
			$('#newimage').val(returningData);
			$("#company_logo").attr("src",returningData);
			$('#company_logo').addClass('pulse').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		      $(this).removeClass('pulse');
		    });
		}
		var noData		= function(){console.log("No data");}
		sumbitFields(process,haveData,noData);
	});
});

$('#agent_new').click(function(){
    if ($('#agent_form').hasClass('Hidden')) {
      $('#agent_form').removeClass('Hidden');
      $('#BtnCreate').addClass('disabled-btn');
      $('#BtnCreate').attr('disabled', 'disabled');
      $('#BtnCreateNext').addClass('disabled-btn');
      $('#BtnCreateNext').attr('disabled', 'disabled');
    } else {
      $('#agent_form').addClass('Hidden');
      $('#BtnCreate').removeClass('disabled-btn');
      $('#BtnCreate').prop("disabled", false);
      $('#BtnCreateNext').removeClass('disabled-btn');
      $('#BtnCreateNext').prop("disabled", false);
    }
});

// $('#agent_add').click(function(){
  
//   // Demo Stuff
//   //$('.Demo-Card').removeClass('Hidden');
//   //$('.Info-Card-Empty').addClass('Hidden');
// });

// $(document).ready(function () {

//     // Remove Date Column in account.php from 400px  
//     if (screen.width < 400) {
//         $(".Sheet-Date").addClass('Hidden');
//         $(".Sheet-Col").removeClass('col-xs-3');
//         $(".Sheet-Col").addClass('col-xs-4');
//     }
//     else {
//         $(".Sheet-Date").removeClass('Hidden');
//         $(".Sheet-Col").addClass('col-xs-3');
//         $(".Sheet-Col").removeClass('col-xs-4');
//     }

// });
