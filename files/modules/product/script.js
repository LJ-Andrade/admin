/////////// Show or Hide Icons On subtop //////////////////////


$(document).ready(function() {
    $('#showitemfilters').click(function() {
         $('#filteritem').toggle("slide");
    });
    $('#viewlistbt').show( 0 );
    $('#newprod').show( 100 );
    $('#showitemfilters').show( 0 );
});
    
    
// Switch Viewmode
//==============================================
$(function(){
    $('div[id="viewlist"]').hide();
    $('#viewlist').hide();
    		
        $("#viewlistbt").on( "click", function() {
    		$('div[id="viewgrid"]').hide( 500 );
            $('div[id="viewlist"]').show( 500 ); 
            $("#viewlistbt").hide();
            $("#viewgridbt").show( 0 );
    	 });
        
        $("#viewgridbt").on( "click", function() {
    		$('div[id="viewgrid"]').show( 500 ); 
            $('div[id="viewlist"]').hide( 500 );
            $("#viewgridbt").hide();
            $("#viewlistbt").show( 0 );
    	 });
        
    // Active Inactive Switch
    $("[name='my-checkbox']").bootstrapSwitch();
});

