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
	

	$("header > nav > ul > li").each( function() { 
		
		var self = $(this);
		var originalWidth = self.width();
		var children = self.find('.children').appendTo($('body')).offset({left: self.offset().left - 150 + self.width()/2 });
		
		if(children.length > 0) {
			var hiddenBox = $('<div/>')
				.attr({class: 'hiddenBox'})
				.width(children.innerWidth())
				.offset({left: children.offset().left });

			var onHoverIn = function() {
				self.stop().animate({ width: 150 }, function() {
					if(children.length > 0) {
						children.stop().animate({top: 74});
						hiddenBox.appendTo($('body'));
					}
				});

				setTimeout(onHoverOut, 2000);
			}

			var onHoverOut = function() {
				if(!(self.is(':hover') || children.is(':hover') || hiddenBox.is(':hover'))) {
					children.stop().animate({top: 0});
					hiddenBox.remove();
					self.stop().animate({ width: originalWidth });
				} else {
					setTimeout(onHoverOut, 2000);
				}
			}

			self.hover(onHoverIn, onHoverOut);
			children.hover(onHoverIn, onHoverOut);
			hiddenBox.hover(onHoverIn, onHoverOut);
		}

	});

});

