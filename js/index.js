jQuery(document).ready(function($){

	$(".slidetabs").tabs(".images > div", {
			rotate: true,
			interval: 1000
	    }).slideshow();
	$(".slidetabs").data("slideshow").play();

});