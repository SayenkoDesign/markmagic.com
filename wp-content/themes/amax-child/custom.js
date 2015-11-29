"use strict";

jQuery(function($){
	$('a.fa-bars').click(function(e) {
		$('.mobile-header-menu-container').stop(true, true).slideToggle();
		e.preventDefault();
		return false;
	});

	$(window).scroll(function(){
		var breakpoint = 1050;
		var height = $('.header-top').outerHeight();
		var position = $(window).scrollTop();

		if(position > height && $(window).innerWidth() < breakpoint) {
			$('.header-mobile-menu').css({
				"position": "fixed",
				"top": "0",
				"width": "100%"
			});
			$('.logo-type-image').css({
				"position": "fixed",
				"top": "0px",
				"left": "calc(50% - 75px)"
			});
			$('.header-wrapper').next().css({
				"margin-top": $('.header-mobile-menu').outerHeight()
			});
		} else {
			$('.header-mobile-menu').css({
				"position": "",
				"top": ""
			});
			$('.logo-type-image').css({
				"position": "",
				"top": "",
				"left": ""
			});
			$('.header-wrapper').next().css({
				"margin-top": ""
		});
		}
	});

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