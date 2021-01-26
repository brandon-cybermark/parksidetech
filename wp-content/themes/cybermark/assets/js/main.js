(function ($) {
	"use strict";
	jQuery(document).ready(function ($) {
		// fullpage menu
		$('.navbar-toggles, nav').click(function () {
			$('.navbar-toggles').toggleClass('navbar-on');
			$('nav').fadeToggle();
			$('nav').removeClass('nav-hide');
		});
		// mouse follower remove area
		$("li, a, button, input, textarea, .navbar-toggles").mouseenter(function () {
			$("#follower").css("opacity", "0");
			$("li, a, button, input, textarea, .navbar-toggles").mouseleave(function () {
				$("#follower").css("opacity", "1");
			});
		});

		//header sticker
		$("#sticker").sticky({
			topSpacing: 0,
			bottomSpacing: 0,
		});
		// SMOOTH SCROLLING
		$(function () {
			$("#mainmenu a[href*='#'], a[href*='#']").bind('click', function (event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1250);
				event.preventDefault();
			});
		});
		/*----------------------------
            SCROLL TO TOP
        ------------------------------*/
		$(window).scroll(function () {
			var $totalHeight = $(window).scrollTop();
			var $scrollToTop = $(".scrolltotop");
			if ($totalHeight > 300) {
				$(".scrolltotop").fadeIn();
			} else {
				$(".scrolltotop").fadeOut();
			}
			if ($totalHeight + $(window).height() === $(document).height()) {
				$scrollToTop.css("bottom", "90px");
			} else {
				$scrollToTop.css("bottom", "20px");
			}
		});



		// mouse follow 
		var mouseX = 0,
			mouseY = 0,
			limitX = 150 - 15,
			limitY = 150 - 15;
		$('#fullpage').mousemove(function (e) {
			var offset = $('#fullpage').offset();
			mouseX = Math.min(e.pageX - offset.left, limitX);
			mouseY = Math.min(e.pageY - offset.top, limitY);
			if (mouseX < 0) mouseX = 0;
			if (mouseY < 0) mouseY = 0;
			mouseX = e.pageX;
			mouseY = e.pageY;
		});
		// cache the selector
		var follower = $("#follower");
		var xp = 0,
			yp = 0;
		var loop = setInterval(function () {
			// change 12 to alter damping higher is slower
			xp += (mouseX - xp) / 12;
			yp += (mouseY - yp) / 12;
			follower.css({
				left: xp - 15,
				top: yp - 15
			});
		}, 0);
	});
	// preloader
	$(window).on('load', function () {
		$('.preloder').fadeOut(3000);
		$('.preloader-wrapper').delay(2500).fadeOut('slow');
	});
}(jQuery));