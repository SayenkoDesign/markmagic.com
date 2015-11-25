"use strict";

jQuery(function($){
	equal_events();
	equal_testimonials();

	$(window).resize(function() {
		var breakpoint = 768;
		if($(window).innerWidth() < breakpoint) {
			unset_equal_events();
			unset_equal_testimonials();
			return;
		}

		equal_events();
		equal_testimonials();
	});

	function equal_events() {
		var event_height = 0;
		$('#events > .wpb_column > .wpb_wrapper').each(function() {
			$(this).innerHeight("auto");
			var h = $(this).innerHeight();

			if(h > event_height) {
				event_height = h;
			}
		});

		$('#events > .wpb_column > .wpb_wrapper').each(function() {
			$(this).innerHeight(event_height);
		});
	}

	function equal_testimonials() {
		var event_height = 0;
		$('#testimonials .vc_om-testimonials-items').each(function() {
			$(this).innerHeight("auto");
			var h = $(this).innerHeight();

			if(h > event_height) {
				event_height = h;
			}
		});

		$('#testimonials .vc_om-testimonials-items').each(function() {
			$(this).innerHeight(event_height);
		});
	}

	function unset_equal_events() {
		$('#events > .wpb_column > .wpb_wrapper').innerHeight("auto");
	}

	function unset_equal_testimonials() {
		$('#testimonials .vc_om-testimonials-items').innerHeight("auto");
	}

	$('#icon-hover .wpb_single_image').click(function(){
		$(this).prev('.wpb_text_column').stop(true, true).slideToggle();
	});
});