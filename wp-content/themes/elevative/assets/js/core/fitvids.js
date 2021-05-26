var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Responsive Video
	elevativeInitFitVids();
} );

/* ==============================================
RESPONSIVE VIDEOS
============================================== */
function elevativeInitFitVids( $context ) {
	"use strict"

	$j( '.responsive-video-wrap, .responsive-audio-wrap', $context ).fitVids();

}