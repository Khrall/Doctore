jQuery(document).ready(function($) {
	
	//Slider stuff
	current = 0;
	total = $("#slider .container > li").length - 1;
	width = 900;
	
	function sliderHoverIn() { $('#slider > .wrapper').find('.overlay').stop().animate({ top: -508 }, 350); }
	function sliderHoverOut () { $('#slider > .wrapper').find('.overlay').stop().animate({ top: -578 }, 150); }
	
	function sliderNextHoverIn() { $('#slider .sliderNext').stop().animate({ left: 870 }, 150); }
	function sliderNextHoverOut() { $('#slider .sliderNext').stop().animate({ left: 860 }, 150); }
	
	function sliderPrevHoverIn() { $('#slider .sliderPrev').stop().animate({ left: -50 }, 150); }
	function sliderPrevHoverOut() { $('#slider .sliderPrev').stop().animate({ left: -40 }, 150); }
	
	function nextSlide() { 
		if(current < total) { $('#slider .container').animate({ left: -(++current * width) }); }
	}
	function prevSlide() { 
		if(current > 0) { $('#slider .container').animate({ left: -(--current * width) }); }
	}
	
	$('#slider > .wrapper').hover( sliderHoverIn, sliderHoverOut);
	$('#slider .sliderNext').hover( sliderNextHoverIn, sliderNextHoverOut);
	$('#slider .sliderPrev').hover( sliderPrevHoverIn, sliderPrevHoverOut);
	$('#slider .sliderNext').bind('click', nextSlide);
	$('#slider .sliderPrev').bind('click', prevSlide);
	
});

