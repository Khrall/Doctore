jQuery.fn.reverse = [].reverse;

jQuery(document).ready(function($) {
	
	var fadeTime = 300;
	var current = 0;
	var container = $('#frontPosts');
	container.height(container.height());

	toPage = function(destination) {
		if(current == destination) return;

		var toHide = $('.page-'+current).reverse();
		var toDisplay = $('.page-'+destination).reverse();
		var postNumber = 0;

		$('html, body').animate({scrollTop: container.offset().top - 100});

		toHide.each( function() {
			$(this).delay(postNumber * fadeTime).fadeOut(fadeTime);
			postNumber++;
		});

		toDisplay.delay((toHide.length - 1) * fadeTime).each( function() {
			$(this).delay(postNumber * fadeTime).fadeIn(fadeTime);
			postNumber--;
		});

		$('#frontPostsNav li[page="'+current+'"]').removeClass('active');
		$('#frontPostsNav li[page="'+destination+'"]').addClass('active');
		current = destination;
	}

	$('#frontPostsNav li').click(function() { toPage($(this).attr('page')) });

});

