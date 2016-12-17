jQuery('document').ready(function($){
    var $window = $(window),
        $adminBar = $('#wpadminbar'),
        $header = $('#header'),
        $main = $('main'),
        $footer = $('#footer');
        
		$( window ).load(function() {
		             setTimeout(function(){ 
		                 $('#loadgraphic').hide();
		             }, 10);
		        });
	
	$( "main li" ).wrapInner( "<span></small>");
	
  
  	
	
});