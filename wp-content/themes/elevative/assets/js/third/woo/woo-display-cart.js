var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Woo display cart
    elevativeWooDisplayCart();
} );

/* ==============================================
WOOCOMMERCE DISPLAY CART
============================================== */
function elevativeWooDisplayCart() {
	"use strict"

	var $overlay = $j( '.owp-cart-overlay' );

	$j( 'body' ).on( 'added_to_cart', function() {
		$overlay.fadeIn();
		$j( 'body' ).addClass( 'show-cart' );

		// Close quick view modal if enabled
		var qv_modal 		= $j( '#owp-qv-wrap' ),
			qv_content 		= $j( '#owp-qv-content' );

		if ( qv_modal.length ) {	
			$j( 'html' ).css( {
				'overflow': '',
				'margin-right': '' 
			} );
			$j( 'html' ).removeClass( 'owp-qv-open' );

			qv_modal.fadeOut();
			qv_modal.removeClass( 'is-visible' );

			setTimeout( function() {
				qv_content.html( '' );
			}, 600);
		}
    } );

    $overlay.on( 'click', function() {
		$j( this ).fadeOut();
		$j( 'body' ).removeClass( 'show-cart' );
	} );

	// Close on resize to avoid conflict
	$j( window ).resize( function() {
		$overlay.fadeOut();
		$j( 'body' ).removeClass( 'show-cart' );
	} );

}