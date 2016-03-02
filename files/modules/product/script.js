// Show or Hide Icons On subtop
//==============================================

$(document).ready(function() {
    $('#showitemfilters').click(function() {
         $('#itemfilters').toggle("slide");
    });
    $('#viewlist').show( 0 );
    $('#newprod').show( 100 );
    $('#showitemfilters').show( 0 );
});
    
    
// Switch Viewmode
//==============================================
$(function(){
    $('div[id^="delelemf"]').hide();
    $('#viewgrid').hide();
    		
        $("#viewlist").on( "click", function() {
    		$('div[id^="delelem"]').hide( 500 );
            $('div[id^="delelemf"]').show( 500 ); 
            $("#viewlist").hide();
            $("#viewgrid").show( 500 );
    	 });
        
        $("#viewgrid").on( "click", function() {
    		$('div[id^="delelem"]').show( 500 ); 
            $('div[id^="delelemf"]').hide( 500 );
            $("#viewgrid").hide();
            $("#viewlist").show( 500 );
    	 });
        
    // Active Inactive Switch
    $("[name='my-checkbox']").bootstrapSwitch();
});