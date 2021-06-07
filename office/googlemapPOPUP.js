$(document).ready(function(){
	$('.googlemapPOPUP').each(function() {
	    var thisPopup = $(this);
	    thisPopup.colorbox({
	        iframe: true,
	        innerWidth: 270,
	        innerHeight: 300,
	        opacity: 0.7,
            href: thisPopup.attr('href') + '&ie=UTF8&t=m&output=embed'
	    });
	});

})
var colorboxResize = function(resize) {
        var width = "90%";
        var height = "90%";
        
        if($(window).width() > 960) { width = "860" }
        if($(window).height() > 700) { height = "630" } 
       
        $.colorbox.settings.height = height;
        $.colorbox.settings.width = width;
        
        //if window is resized while lightbox open
        if(resize) {
          $.colorbox.resize({
            'height': height,
            'width': width
          });
        } 
    }
$(window).resize(function() {
   colorboxResize(true);
 });