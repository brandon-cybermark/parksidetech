var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Responsive Video
	cybermarkInitFitVids();
} );

/* ==============================================
RESPONSIVE VIDEOS
============================================== */
function cybermarkInitFitVids( $context ) {
	"use strict"

	$j( '.responsive-video-wrap, .responsive-audio-wrap', $context ).fitVids();

}