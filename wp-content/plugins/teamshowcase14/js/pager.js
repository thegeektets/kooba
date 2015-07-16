jQuery(document).ready(function($){

	var i = 0;
	var sliderarray = new Array();

	while (i <= tspagerparam.count) {

		var teamDiv = $('.tshowcase-pager-wrap');
		teamDiv.fadeIn('slow');

		var start = getHashUrlVars()["t"];
		startslide = 0;
		if(start != '' && start != null){
			startslide = parseInt(start);
		}


	    sliderarray[i] = $('.tshowcase-bxslider-'+i).bxSlider({
	      pagerCustom: '#tshowcase-bx-pager-'+i,
		  controls:false,
		  mode:'fade',
		  //speed:1,
		  startSlide: startslide
	    });

	    i++;

    }

     //Custom Hover code. Needs improvement. Still not officially supported
     //speed paramater above should also be uncommented
     

		/*
		
		jQuery.each(sliderarray, function(index,value) {

			jQuery('#tshowcase-bx-pager-'+index+' a').mouseenter(function() {
				var idslide = $(this).attr('data-slide-index');
				value.goToSlide(idslide);
				});

		});
*/
		

});

function getHashUrlVars(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('#') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}