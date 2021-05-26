var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Woo off canvas
    elevativeWooOffCanvas();
} );

/* ==============================================
WOOCOMMERCE OFF CANVAS
============================================== */
function elevativeWooOffCanvas() {
	"use strict"

	$j( document ).on( 'click', '.elevative-off-canvas-filter', function( e ) {
		e.preventDefault();

		var innerWidth = $j( 'html' ).innerWidth();
		$j( 'html' ).css( 'overflow', 'hidden' );
		var hiddenInnerWidth = $j( 'html' ).innerWidth();
		$j( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );

		$j( 'body' ).addClass( 'off-canvas-enabled' );
	} );

	$j( '.elevative-off-canvas-overlay' ).on( 'click', function() {
		$j( 'html' ).css( {
			'overflow': '',
			'margin-right': '' 
		} );

		$j( 'body' ).removeClass( 'off-canvas-enabled' );
	} );

}