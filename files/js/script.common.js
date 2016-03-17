                                            ////// JavaScript Document //////

//////////////////////////////////////////////////// Scrollbar Styles //////////////////////////////////////////////////////
$(document).ready(function() {  
    $("html").niceScroll({cursorwidth: '8px', cursorborder: 0, cursorborderradius: 0, autohidemode: false, zindex: 999, cursorcolor: '#2C3E50', cursoropacitymax: .5 });
});

//////////////////////////////////////////////////// Subtop Icons //////////////////////////////////////////////////////
$(document).ready(function() {  
    if(get['msg']=="logok")$('#volverprod').hide();
    $('#viewlistbt').hide();
    $('#viewgridbt').hide();
    $('#showitemfilters').hide();      // <<<<<================== Cambiar los ID's por una clase que los represente a todos.
    $('#showitemfiltersuser').hide();
    $('#volverusers').hide();
    $('#newuser').hide();
    $('#newprod').hide();
});

$(function(){
    $(".BackToLastPage").click(function(){
        window.history.go(-1);
    });
});

//////////////////////////////////////////////////// Characters limiter //////////////////////////////////////////////////////
$('input, textarea').keyup(function() {
  var max = $(this).attr('maxLength');
  var curr = this.value.length;
  var percent = (curr/max) * 100;
  var indicator = $(this).parent().children('.indicator-wrapper').children('.indicator').first();
   
  // Shows characters left
  indicator.children('.current-length').html(max - curr);
   
  // Change colors
  if (percent > 30 && percent <= 50) { indicator.attr('class', 'indicator low'); }
  else if (percent > 50 && percent <= 70) { indicator.attr('class', 'indicator med'); }
  else if (percent > 70 && percent < 100) { indicator.attr('class', 'indicator high'); }
  else if (percent == 100) { indicator.attr('class', 'indicator full'); }
  else { indicator.attr('class', 'indicator empty'); }
  indicator.width(percent + '%');
});

//////////////////////////////////////////////////// Page Loader //////////////////////////////////////////////////////
    function toggleLoader()
    {
        if(isVisible($('#page_loader')))
        {
            $('#page_loader').fadeOut( 500 );
        }else{
            $('#page_loader').fadeIn( 500 );
        }
    }

//////////////////////////////////////////////////// Notify //////////////////////////////////////////////////////
function notifyError(msgNotify)
{
    $.notify({
        // options
        message: '<div style="text-align:center;">'+msgNotify+'</div>'
    },{
        // settings
        type: 'danger',
        allow_dismiss: false,
        placement: {
            from: "top",
            align: "center"
        }
    });
}

function notifySuccess(msgNotify)
{
    $.notify({
        // options
        message: '<div style="text-align:center;">'+msgNotify+'</div>'
    },{
        // settings
        type: 'success',
        allow_dismiss: false,
        placement: {
            from: "bottom",
            align: "center"
        }
    });
}

function notifyInfo(msgNotify)
{
    $.notify({
        // options
        message: '<div style="text-align:center;">'+msgNotify+'</div>' 
    },{
        // settings
        type: 'info',
        allow_dismiss: false,
        placement: {
            from: "bottom",
            align: "right"
        }
    });
}

function notifyWarning(msgNotify)
{
    $.notify({
        // options
        message: '<div style="text-align:center;">'+msgNotify+'</div>'
    },{
        // settings
        type: 'warning',
        placement: {
            from: "bottom",
            align: "right"
        }
    });
}

function notifyMsg(typeMsg,msgNotify)
{
    $.notify({
        // options
        message: msgNotify 
    },{
        // settings
        type: typeMsg
    });
}
//////////////////////////////////////////////////// Submit Data //////////////////////////////////////////////////////
function submitData()
{
    var formFiles;
    var checkValue;
    var checkID;
    var elementID;
    var checkbox    = [];
    var checkboxID  = [];
    var variables   = [];
    var data        = new FormData();
    var i           = 0;
    var element;
    var id;
    //tinyMCE.triggerSave(); // Save trigger for TinyMCE editor
    $('textarea,select,input[type!="checkbox"]').each(function()
    {
        elementID   = $(this).attr("id");
        if($(this).attr("type")=="file")
        {
            formFiles       = document.getElementById(elementID).files;
            element = {id:elementID,value:formFiles[0]}
            variables[variables.length] = element;
        }else{
            element = {id:elementID,value:$(this).val()};
            variables[variables.length] = element;
        }
        
    });

    $('input[type="checkbox"]:checked').each(function()
    {
        checkID = $(this).attr("id");
        if(checkboxID.indexOf(checkID)==-1)
        {
            checkboxID[checkboxID.length] = checkID;
            checkValue="";
            $('input[type="checkbox"][name="'+checkID+'"]:checked').each(function()
            {
                if(checkValue!="")
                {
                    checkValue = checkValue + "," + $(this).val();
                }else{
                    checkValue = $(this).val();
                }
            });
            notifyError(checkValue);
            variables[variables.length] = {id:checkID,value:checkValue};
        }
    });

    while(element= variables[i++])
    {
        data.append(element.id,element.value);
    }
    return data;
}

function sumbitFields(process,haveData,noData){
    var data    = submitData();
    $.ajax({
        url: process,
        type:'POST',
        contentType:false,
        data:data,
        processData:false,
        cache:false,
        success: function(rs){
            if(rs)
            {
                haveData(rs);
            }else{
                noData();
            }
        }
    });
}

///////////////////////////////////////////////////// Attach a Selector //////////////////////////////////////////////////
$(function(){   
    $("select,input,textarea").change(function(){
        var attach = $(this).attr("attach");
        if(attach){
            var string = 'value=' + $(this).val();
            var data = attach.split("/");
            var target = $("#"+data[0]);
            var process = data[1];
            var noData = target.attr("default");
            if(target.prop("tagName")=="SELECT") noData = '<option value="' + target.attr("firstvalue") + '">' + target.attr("firsttext") + '</option>';
            $.ajax({
                url: process,
                type:'POST',
                contentType:false,
                data:string,
                processData:false,
                cache:false,
                success: function(rs){
                    if(rs)
                    {
                        target.html(rs);
                    }else{
                        target.html(noData);
                    }
                }
            });
        }

    });
});





$(function(){

    ////////////////////////////////////////////////////////////////// DELETE ACTION //////////////////////////////////////////////
    $(".deleteElement").click(function(){
        var action      = "delete";
        var parents     = $(this).attr("deleteParent").split("/");
        var process     = $(this).attr("deleteProcess");
        var conText     = utf8_encode($(this).attr("confirmText"));
        var sucText     = utf8_encode($(this).attr("successText"));
        var id          = $(this).attr("deleteElement");
        
        alertify.confirm(utf8_decode(conText), function(e){
            if(e){
                var result;
                result = deleteElement(action,id,process);
                if(result){
                    notifyError(result);
                }else{
                    parents.forEach(function(parent){
                        $("#"+parent).slideUp();
                    });
                    notifySuccess(utf8_decode(sucText));
                }
            }
        });
    });

    // function listActions(action,id,process,target)
    // {
        
    //     switch(action){
    //         case "view":    window.location.href = target + "?id="+id; break;
    //         case "edit":    window.location.href = target + "?id="+id; break;
    //         case "delete":  
    //             alertify.confirm(utf8_decode("¿Desea eliminar este registro?"), function(e){
    //                 if(e){
    //                     var string      = 'id='+ id + '&action=delete';
    //                     $.ajax({
    //                         type: "POST",
    //                         url: process,
    //                         data: string,
    //                         cache: false,
    //                         success: function(data){
    //                             if(data){
    //                                 $("#Row"+id).slideUp();
    //                                 msg.success("Registro eliminado correctamente",5000);
    //                             }
                                
    //                         }
    //                     });
    //                 }else{
    //                     //alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
    //                 }
    //             }); 
    //             return false;
    //         break;
    //     }
    // }

    function deleteElement(action,id,process)
    {
        var string      = 'id='+ id + '&action=' + action;
        var data;
        $.ajax({
            type: "POST",
            url: process,
            data: string,
            cache: false,
            success: data
        });
        return data;
    }

    //////////////////////////////////////////////////// Pager /////////////////////////////////////////////////////////////////
    function fillPagerDestiny(parent,page)
    {
        var pagerid         = parent.attr("id");
        var string          = 'page='+ page +'&action=pager&pagerid='+pagerid;
        var process         = parent.attr("process");
        var destiny         = parent.attr("destiny");
        var activeclass     = parent.attr("activeclass");
        var inactiveclass   = parent.attr("inactiveclass");
        var totalpages      = parent.attr("totalpages");

        $.ajax({
            type: "POST",
            url: process,
            data: string,
            cache: false,
            success: function(data){
                $("#"+destiny).html(data);
                $("#"+pagerid+" .ActivePage").each(function(){
                    $(this).removeClass(activeclass);
                    $(this).addClass(inactiveclass);
                });
                $("#"+pagerid+" #page"+page).removeClass(inactiveclass);
                $("#"+pagerid+" #page"+page).addClass(activeclass);
                $("#BtnFoward"+pagerid).attr("page",parseInt(page)+1);
                $("#BtnBack"+pagerid).attr("page",parseInt(page)-1);
                
                switch(page)
                {
                    case "1":
                        $("#BtnBack"+pagerid).removeClass($("#BtnBack"+pagerid).attr("classon"));
                        $("#BtnBack"+pagerid).addClass($("#BtnBack"+pagerid).attr("classoff"));
                        $("#BtnFoward"+pagerid).removeClass($("#BtnFoward"+pagerid).attr("classoff"));
                        $("#BtnFoward"+pagerid).addClass($("#BtnFoward"+pagerid).attr("classon"));
                    break;

                    case totalpages:
                        $("#BtnFoward"+pagerid).removeClass($("#BtnFoward"+pagerid).attr("classon"));
                        $("#BtnFoward"+pagerid).addClass($("#BtnFoward"+pagerid).attr("classoff"));
                        $("#BtnBack"+pagerid).addClass($("#BtnBack"+pagerid).attr("classon"));
                        $("#BtnBack"+pagerid).removeClass($("#BtnBack"+pagerid).attr("classoff"));
                    break;

                    default:
                        $("#BtnFoward"+pagerid).addClass($("#BtnFoward"+pagerid).attr("classon"));
                        $("#BtnFoward"+pagerid).removeClass($("#BtnFoward"+pagerid).attr("classoff"));
                        $("#BtnBack"+pagerid).addClass($("#BtnBack"+pagerid).attr("classon"));
                        $("#BtnBack"+pagerid).removeClass($("#BtnBack"+pagerid).attr("classoff"));
                    break;
                }
                ///// LIST ACTIONS ////
                $("img").click(function(){
                    var info    = $(this).attr("id").split('_');
                    var action  = $(this).attr("action");
                    var process = $(this).attr("process");
                    var target  = $(this).attr("target");
                    var id      = info[1];
                    listActions(action,id,process,target);
                });
            }
        });

    }

    $(".ActivePageLink").click(function(){
        fillPagerDestiny($(this).parent(),$(this).attr("page"));
    });

    $(".BtnFoward,.BtnBack").click(function(){
        var arrayid;
        var pagerid;
        var buttonclass;
        if($(this).hasClass("BtnFoward"))
            buttonclass = "Foward";
        else 
            buttonclass = "Back";
        arrayid         = $(this).attr("id").split(buttonclass);
        pagerid         = arrayid[1];
        $("#"+pagerid+" #page"+$(this).attr("page")).click();
    });


    function changePagerView(selectPager)
    {
        var pagerid         = selectPager.attr("parentid");
        var parent          = $("#"+pagerid);
        var string          = 'regs='+ selectPager.val() +'&action=changepagerview&pagerid='+pagerid;
        var process         = parent.attr("process");

        $.ajax({
            type: "POST",
            url: process,
            data: string,
            cache: false,
            success: function(data){
                //alert(data);
                fillPagerDestiny(parent,"1");
                if(data=="erase")
                {
                    parent.hide();
                    $("#BtnFoward"+pagerid).addClass("Hidden");
                    $("#BtnBack"+pagerid).addClass("Hidden");

                }else{
                    parent.addClass("MustBeRemoved");
                    parent.after(data);
                    $(".MustBeRemoved").remove();
                    $("#BtnFoward"+pagerid).removeClass("Hidden");
                    $("#BtnBack"+pagerid).removeClass("Hidden");
                }

                $(".ActivePageLink").click(function(){
                    fillPagerDestiny($(this).parent(),$(this).attr("page"));
                });
            }
        });
    }

    $(".RegsPerPage").change(function(){
        changePagerView($(this));
    });


//////////////////////////////////////////////////// Searcher /////////////////////////////////////////////////////////////////

    
    function startSearch(field)
    {
        var parent  = field.parent().parent().parent();
        var value   = field.val();
        var fieldid = field.attr("id");
        var process = parent.attr("process");
        var pagerid = parent.attr("pagerid");
        var string  = "action=searcher&pagerid="+ pagerid + "&field=" + fieldid + "&value=" + value;

        $.ajax({
            type: "POST",
            url: process,
            data: string,
            cache: false,
            success: function(data){
                if(!data)
                {
                    changePagerView($("#select"+pagerid+" #regsperpage"));
                }else{
                    alert(data);
                }
            }
        });
    }

    $(".StartSearch").keyup(function(){
        startSearch($(this));
    });

    $(".StartSearch").change(function(){
        startSearch($(this));
    });



});

//////////////////////////////////////////////////// Validation ///////////////////////////////////////////////////////////////
var validate    = new ValidateFields();
    
$(function(){   
    validate.createErrorDivs();
    
    $(validateElements).change(function(){
        validate.validateOneField(this);
    });
});


//////////////////////////////////////////////////// Logout ////////////////////////////////////////////////////
$(function(){
    
        $("#Logout").click(function(){
            
            alertify.confirm(utf8_decode("¿Desea salir del sistema?"), function(e){
                if(e){
                    var target      = '../login/login.php';
                    var process     = '../login/process.logout.php';
                    
                    $.ajax({
                        type: "POST",
                        url: process,
                        cache: false,
                        success: function(){
                            document.location = target;
                        }
                    });
                }else{
                    //alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
                }
            });
        });
    
});


//////////////////////////////////////////////////// Customized File Field ////////////////////////////////////////////////////
$(function(){
    $("input:file").change(function(){
        $("#File"+$(this).attr("id")).focus();
        $("#File"+$(this).attr("id")).val($(this).val());
        $("#File"+$(this).attr("id")).blur();
    });
    
    
    $("input").click(function(){
        
        if($(this).attr("id").substring(0,4)=="File"){
            $(this).blur();
            $("#"+$(this).attr("id").substring(4)).click();
        }
    });
});


//////////////////////////////////////////////////// Value In Array ////////////////////////////////////////////////////
function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}


//////////////////////////////////////////////////// Element Visible ////////////////////////////////////////////////////////

function isVisible(object)
{
    return $(object).is (':visible') && $(object).parents (':hidden').length == 0;
}


//////////////////////////////////////////////////// Get Vars From URL ////////////////////////////////////////////////////
function getVars(){
    var loc = document.location.href;
    var getString = loc.split('?');
    if(getString[1]){
        var GET = getString[1].split('&');
        var get = {};//This object will be filled with the key-value pairs and returned.
        
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
    }else{
        return "";
    }
}
get = getVars();


//////////////////////////////////////////////////// UTF8_ENCODE ////////////////////////////////////////////////////
function utf8_encode (argString) {

  if (argString === null || typeof argString === "undefined") {
    return "";
  }

  var string = (argString + ''); // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
  var utftext = '',
    start, end, stringl = 0;

  start = end = 0;
  stringl = string.length;
  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n);
    var enc = null;

    if (c1 < 128) {
      end++;
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(
         (c1 >> 6)        | 192,
        ( c1        & 63) | 128
      );
    } else if (c1 & 0xF800 != 0xD800) {
      enc = String.fromCharCode(
         (c1 >> 12)       | 224,
        ((c1 >> 6)  & 63) | 128,
        ( c1        & 63) | 128
      );
    } else { // surrogate pairs
      if (c1 & 0xFC00 != 0xD800) { throw new RangeError("Unmatched trail surrogate at " + n); }
      var c2 = string.charCodeAt(++n);
      if (c2 & 0xFC00 != 0xDC00) { throw new RangeError("Unmatched lead surrogate at " + (n-1)); }
      c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000;
      enc = String.fromCharCode(
         (c1 >> 18)       | 240,
        ((c1 >> 12) & 63) | 128,
        ((c1 >> 6)  & 63) | 128,
        ( c1        & 63) | 128
      );
    }
    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end);
      }
      utftext += enc;
      start = end = n + 1;
    }
  }

  if (end > start) {
    utftext += string.slice(start, stringl);
  }

  return utftext;
}


//////////////////////////////////////////////////// UTF8_DECODE ////////////////////////////////////////////////////
function utf8_decode (str_data) {

  var tmp_arr = [],
    i = 0,
    ac = 0,
    c1 = 0,
    c2 = 0,
    c3 = 0,
    c4 = 0;

  str_data += '';

  while (i < str_data.length) {
    c1 = str_data.charCodeAt(i);
    if (c1 <= 191) {
      tmp_arr[ac++] = String.fromCharCode(c1);
      i++;
    } else if (c1 <= 223) {
      c2 = str_data.charCodeAt(i + 1);
      tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
      i += 2;
    } else if (c1 <= 239) {
      // http://en.wikipedia.org/wiki/UTF-8#Codepage_layout
      c2 = str_data.charCodeAt(i + 1);
      c3 = str_data.charCodeAt(i + 2);
      tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
      i += 3;
    } else {
      c2 = str_data.charCodeAt(i + 1);
      c3 = str_data.charCodeAt(i + 2);
      c4 = str_data.charCodeAt(i + 3);
      c1 = ((c1 & 7) << 18) | ((c2 & 63) << 12) | ((c3 & 63) << 6) | (c4 & 63);
      c1 -= 0x10000;
      tmp_arr[ac++] = String.fromCharCode(0xD800 | ((c1>>10) & 0x3FF));
      tmp_arr[ac++] = String.fromCharCode(0xDC00 | (c1 & 0x3FF));
      i += 4;
    }
  }

  return tmp_arr.join('');
}