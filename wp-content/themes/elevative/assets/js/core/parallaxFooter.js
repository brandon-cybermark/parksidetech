var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
	// Parallax footer
	elevativeParallaxFooter();
} );

$j( window ).on( 'resize', function() {
	"use strict";
	// Parallax footer
	elevativeParallaxFooter();
} );

/* ==============================================
PARALLAX FOOTER
============================================== */
function elevativeParallaxFooter() {
	"use strict"

	// Needed timeout for dynamic parallax content
	if ( $j( 'body' ).hasClass( 'has-parallax-footer' ) ) {

		setTimeout( function() {
			$j( '#main' ).css( 'margin-bottom', $j( '.parallax-footer' ).outerHeight() );
		}, 1 );

	}

}