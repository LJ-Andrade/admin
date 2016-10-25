///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// LIST & GRID ////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Row element selected
function rowElementSelected()
{
    $('.listRow').click(function(){
        toggleRow($(this));
    });
}
rowElementSelected();

// Grid element selected
function gridElementSelected()
{
    $('.RoundItemSelect').click(function(){
        var id = $(this).attr("id").split("_");
        var row = $("#row_"+id[1]);
        toggleRow(row);
    });
}
gridElementSelected();

function toggleRow(element)
{
    element.toggleClass('SelectedRow');
    element.toggleClass('listRowSelected');
    var actions = element.children('.listActions');
    actions.toggleClass('Hidden');

	if(get['status'] && get['status'].toUpperCase()=='I')
    	showActivateButton();
    else
		showDeleteButton();
    //Toggle grid
    var id = element.attr("id").split("_");
    var grid = $("#grid_"+id[1]);
    toggleGrid(grid);
}

function toggleGrid(element)
{
    element.toggleClass('SelectedGrid');
    element.children('div').children('div').children('div').toggleClass('imgSelectorClicked');
    element.children('div').children('div').children('div').children('div').children('.roundItemCheckDiv').children('a').children('button').toggleClass('Hidden');
    element.children('div').children('div').children('div').children('div').children('.roundItemActionsGroup').children('a').children('button').each(function(){
        //$(this).toggleClass('Hidden');
    });
}

function showDeleteButton()
{
    if($('.SelectedRow').length>1 && checkDeleteRestrictions())
    {
        $('.DeleteSelectedElements').removeClass('Hidden');
    }else{
        $('.DeleteSelectedElements').addClass('Hidden');
    }
}

function showActivateButton()
{
    if($('.SelectedRow').length>1 && checkDeleteRestrictions())
    {
        $('.ActivateSelectedElements').removeClass('Hidden');
    }else{
        $('.ActivateSelectedElements').addClass('Hidden');
    }
}

function checkDeleteRestrictions()
{
    var x=true;
    $('.SelectedRow').each(function(){
        if($(this).hasClass('undeleteable'))
            x=false;
    });
    return x;
}

function ShowGridAndList()
{
    $(".ShowGrid,.ShowList").click(function(){
         $(".GridElement").toggleClass("Hidden");
         $(".ListElement").toggleClass("Hidden");
    });
}
ShowGridAndList();

function deleteElement(element)
{
	var elementID	= element.attr('id').split("_");
	var id			= elementID[1];
	var row			= $("#row_"+id);
	var grid		= $("#grid_"+id);
	var process 	= element.attr('process');
	var object		= $("#SearchResult").attr("object");
	var string      = 'id='+ id + '&action=delete&object='+object;
	var result;

    $.ajax({
        type: "POST",
        url: process,
        data: string,
        cache: false,
        async: false,
        success: function(data){
            if(data)
            {
                console.log(data);
                result = false;
            }else{
                grid.remove();
			    row.remove();
            	result = true;
            }
        }
    });
    console.log(result);
    return result;
}

function activateElement(element)
{
	var elementID	= element.attr('id').split("_");
	var id			= elementID[1];
	var row			= $("#row_"+id);
	var grid		= $("#grid_"+id);
	var process 	= element.attr('process');
	var object		= $("#SearchResult").attr("object");
	var string      = 'id='+ id + '&action=activate&object='+object;
	var result;

    $.ajax({
        type: "POST",
        url: process,
        data: string,
        cache: false,
        async: false,
        success: function(data){
            if(data)
            {
                console.log(data);
                result = false;
            }else{
                grid.remove();
			    row.remove();
            	result = true;
            }
        }
    });
    console.log(result);
    return result;
}


function deleteListElement()
{
	$(".deleteElement").click(function(){
		
		var element     = $(this);
		var elementID	= $(this).attr("id").split("_");
		var id			= elementID[1];
		var row			= $("#row_"+id);
		var title		= utf8_encode(row.attr("title"));
		alertify.confirm(utf8_decode('Está a punto de eliminar a '+title+' ¿Desea continuar?'), function(e){
			if(e)
			{
				var result;
				toggleLoader();
				result = deleteElement(element);
				toggleLoader();

				if(result)
				{
					notifySuccess(utf8_decode(title+' ha sido eliminado.'));
					submitSearch();
				}else{
					notifyError('Hubo un problema. '+title+' no pudo ser eliminado.');
				}
			}

		});
		return false;
	});
}
deleteListElement();

function activateListElement()
{
	$(".activateElement").click(function(){
		var element     = $(this);
		var elementID	= $(this).attr("id").split("_");
		var id			= elementID[1];
		var row			= $("#row_"+id);
		var title		= utf8_encode(row.attr("title"));
		alertify.confirm(utf8_decode('Está a punto de activar a '+title+' ¿Desea continuar?'), function(e){
			if(e)
			{
				var result;
				toggleLoader();
				result = activateElement(element);
				toggleLoader();

				if(result)
				{
					notifySuccess(utf8_decode(title+' ha sido activado.'));
					submitSearch();
				}else{
					notifyError('Hubo un problema. '+title+' no pudo ser activado.');
				}
			}

		});
		return false;
	});
}
activateListElement();

function massiveElementDelete()
{
	$(".DeleteSelectedElements").click(function(){
		var delBtn = $(this)
		alertify.confirm(utf8_decode('¿Desea eliminar los registros seleccionados?'), function(e){
	        if(e){
	        	toggleLoader();
	        	var result;
	        	$(".SelectedRow").children('.listActions').children('div').children('.roundItemActionsGroup').children('.deleteElement').each(function(){
	        		result = deleteElement($(this));
	        	});
				toggleLoader();

	        	if(result)
	        	{
	        		delBtn.addClass('Hidden');
	        		notifySuccess(utf8_decode('Los registros seleccionados han sido eliminados.'));
	        		submitSearch();
	        	}else{
	        		notifyError('Hubo un problema al intentar eliminar los registros.');
	        	}
	        }
	    });
	    return false;
	});
}
massiveElementDelete();

function massiveElementActivate()
{
	$(".ActivateSelectedElements").click(function(){
		var delBtn = $(this)
		alertify.confirm(utf8_decode('¿Desea activar los registros seleccionados?'), function(e){
	        if(e){
	        	toggleLoader();
	        	var result;
	        	$(".SelectedRow").children('.listActions').children('div').children('.roundItemActionsGroup').children('.activateElement').each(function(){
	        		result = activateElement($(this));
	        	});
				toggleLoader();

	        	if(result)
	        	{
	        		delBtn.addClass('Hidden');
	        		notifySuccess(utf8_decode('Los registros seleccionados han sido activados.'));
	        		submitSearch();
	        	}else{
	        		notifyError('Hubo un problema al intentar activar los registros.');
	        	}
	        }
	    });
	    return false;
	});
}
massiveElementActivate();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// SEARCHER ///////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(function(){
	$('.ShowFilters').click(function(){
		$('.SearFilters').toggleClass('Hidden');
		$('.NewElementButton').toggleClass('Hidden');
	});
	
	$(".searchButton").click(function(){
		$("#view_page").val("1");
		submitSearch();
	});
	
	$("#regsperview").change(function(){
		$(".searchButton").click();
	});

	$("input").keypress(function(e){
		if(e.which==13){
			$(".searchButton").click();
		}
	});
	
	$("#ClearSearchFields").click(function(){
		$("#SearchFieldsForm").children('.input-group').children('input,select,textarea').val('');
	})
});

function submitSearch()
{
	if(validate.validateFields(''))
	{
		toggleLoader();
		if($(".ShowList").hasClass("Hidden"))
		{
			$("#view_type").val('list');
		}else{
			$("#view_type").val('grid');
		}
		var status		= get['status'];
		var object		= $("#SearchResult").attr("object");
		if(status) status = '&status='+status;
		else status 	= '';
		var process		= '../../library/processes/proc.common.php?action=search&object='+object+status;
		var haveData	= function(returningData)
		{
			$("input,select").blur();
			$("#SearchResult").remove();
			$(".box-body").append(returningData);
			rowElementSelected();
			gridElementSelected();
			showDeleteButton();
			deleteListElement();
			massiveElementDelete();
			activateListElement();
			$("#TotalRegs").html($("#totalregs").val());
			var page = $("#view_page").val();
			appendPager();
		}
		var noData		= function()
		{
			//Empty action
		}
		sumbitFields(process,haveData,noData);
		toggleLoader();
		return false;
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// ORDERER ///////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(function(){
	$(".order-arrows").click(function(){
		$(".sort-activated").removeClass("sort-activated");
		var mode = $(this).attr("mode");
		$(this).children("i").removeClass("fa-sort-alpha-"+mode);
		if(mode=="desc") mode = "asc";
		else mode = "desc";
		$("#view_order_field").val($(this).attr("order"));
		$("#view_order_mode").val(mode);
		$(this).attr("mode",mode);
		$(this).children("i").addClass("fa-sort-alpha-"+mode);
		$(this).addClass("sort-activated");
		$("#view_page").val("1");
		submitSearch();
	});
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// PAGER //////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function appendPager()
{
	var page = parseInt($("#view_page").val());
	var totalpages = calculateTotalPages();
	if(totalpages>1)
	{
		if (totalpages < 7) {
		   $(".pagination").html(appendPagerUnder7(page));
		} else if (totalpages < 31) {
		    $(".pagination").html(appendPagerUnder30(page));
		} else{
		    $(".pagination").html(appendPagerUnlimited(page));
		}
	}else{
		$(".pagination").html('');
	}
	switchPage();
}

function appendPagerUnder7(page)
{
	var html = '<li class="PrevPage"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></i></a></li>';
	var totalpages = calculateTotalPages();
	for (var i = 1; i <= totalpages; i++)
	{
		if(i==page)
			var pageClass = 'active';
		else
			var pageClass = '';
		html = html + '<li class="'+pageClass+' pageElement" page="'+i+'"><a href="#" class="">'+i+'</a></li>';
	}
	return html + '<li class="NextPage"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></i></a></li>';
}

function appendPagerUnder30(page)
{
	var html = '<li class="PrevPage"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></i></a></li>';
	var totalpages = calculateTotalPages();
	var separatorA = '';
	var separatorB = '';
	
	if((page-2)>2)
		separatorA = '...';
	if((page+3)<totalpages)
		separatorB = '...';
	
	
	if((page-2)>1)
		html = html + '<li class="pageElement" page="1"><a href="#">1'+separatorA+'</a></li>';
	if(((page-2)>=1))
		html = html + '<li class="pageElement" page="'+(page-2)+'"><a href="#">'+(page-2)+'</a></li>';
	if(((page-1)>=1))
		html = html + '<li class="pageElement" page="'+(page-1)+'"><a href="#">'+(page-1)+'</a></li>';
	html = html + '<li class="active pageElement" page="'+page+'"><a href="#">'+page+'</a></li>';
	if(((page+1)<=totalpages))
		html = html + '<li class="pageElement" page="'+(page+1)+'"><a href="#">'+(page+1)+'</a></li>';
	if(((page+2)<=totalpages))
		html = html + '<li class="pageElement" page="'+(page+2)+'"><a href="#">'+(page+2)+'</a></li>';
	if((page+2)<totalpages)
		html = html + '<li class="pageElement" page="'+totalpages+'"><a href="#">'+separatorB+totalpages+'</a></li>';
		
	return html + '<li class="NextPage"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></i></a></li>';
}

function appendPagerUnlimited(page)
{
	
	var html = '<li class="Prev10Page"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li><li class="PrevPage"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></i></a></li>';
	var totalpages = calculateTotalPages();
	var separatorA = '';
	var separatorB = '';
	
	if((page-2)>2)
		separatorA = '...';
	if((page+3)<totalpages)
		separatorB = '...';
	
	
	if((page-2)>1)
		html = html + '<li class="pageElement" page="1"><a href="#">1'+separatorA+'</a></li>';
	
	if((page-2)>3)
	{
		var interPageA = Math.ceil((page-3)/2);
		html = html + '<li class="pageElement" page="'+interPageA+'"><a href="#">'+interPageA+separatorA+'</a></li>';
	}
		
	if(((page-2)>=1))
		html = html + '<li class="pageElement" page="'+(page-2)+'"><a href="#">'+(page-2)+'</a></li>';
	if(((page-1)>=1))
		html = html + '<li class="pageElement" page="'+(page-1)+'"><a href="#">'+(page-1)+'</a></li>';
		
	html = html + '<li class="active pageElement" page="'+page+'"><a href="#">'+page+'</a></li>';
	
	if(((page+1)<=totalpages))
		html = html + '<li class="pageElement" page="'+(page+1)+'"><a href="#">'+(page+1)+'</a></li>';
	if(((page+2)<=totalpages))
		html = html + '<li class="pageElement" page="'+(page+2)+'"><a href="#">'+(page+2)+'</a></li>';
	
	if(totalpages-(page+2)>3)
	{
		var interPageB = Math.ceil(totalpages-(page+2)/2);
		html = html + '<li class="pageElement" page="'+interPageB+'"><a href="#">'+separatorB+interPageB+'</a></li>';
	}	
		
	if((page+2)<totalpages)
		html = html + '<li class="pageElement" page="'+totalpages+'"><a href="#">'+separatorB+totalpages+'</a></li>';
		
	return html + '<li class="NextPage"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></i></a></li><li class="Next10Page"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
}

function switchPage()
{
	$('.pageElement').click(function(event){
		event.stopPropagation();
		if(!$(this).hasClass('active'))
		{
			var page = $(this).attr('page');
			$("#view_page").val(page);
			submitSearch();
		}
		return false;
	});
	
	switchPrevNextPage();
}
switchPage();

function switchPrevNextPage()
{
	$('.NextPage').click(function(){
		var page = parseInt($("#view_page").val())+1;
		if(page<=calculateTotalPages())
			$(".pageElement[page='"+page+"']").click();
	});
	
	$('.PrevPage').click(function(){
		var page = parseInt($("#view_page").val())-1;
		if(page>0)
			$(".pageElement[page='"+page+"']").click();
	});
	
	$('.Next10Page').click(function(){
		var page = parseInt($("#view_page").val())+10;
		if(page<=calculateTotalPages())
			$(".pageElement[page='"+page+"']").click();
		else
			$(".pageElement[page='"+calculateTotalPages()+"']").click();
	});
	
	$('.Prev10Page').click(function(){
		var page = parseInt($("#view_page").val())-10;
		if(page>0)
			$(".pageElement[page='"+page+"']").click();
		else
			$(".pageElement[page='1']").click();
	});
}

function calculateTotalPages()
{
	var totalregs	= $("#totalregs").val();
	var regsperview = $("#regsperview").val();
	return Math.ceil(totalregs/regsperview);
}

$(document).ready(function(){
	appendPager();
});