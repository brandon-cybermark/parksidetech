var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Woo mobile cart sidebar
    cybermarkWooMobileCart();
} );

/* ==============================================
WOOCOMMERCE MOBILE CART SIDEBAR
============================================== */
function cybermarkWooMobileCart() {
	"use strict"

	if ( $j( 'body' ).hasClass( 'woocommerce-cart' )
		|| $j( 'body' ).hasClass( 'woocommerce-checkout' ) ) {
		return;
	}
	
	var cybermark_cart_filter_close = function() {
		$j( 'html' ).css( {
			'overflow': '',
			'margin-right': '' 
		} );

		$j( 'body' ).removeClass( 'show-cart-sidebar' );
	};

	$j( document ).on( 'click', '.cybermark-mobile-menu-icon a.wcmenucart', function( e ) {
		e.preventDefault();

		var innerWidth = $j( 'html' ).innerWidth();
		$j( 'html' ).css( 'overflow', 'hidden' );
		var hiddenInnerWidth = $j( 'html' ).innerWidth();
		$j( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );

		$j( 'body' ).addClass( 'show-cart-sidebar' );
	} );

	$j( '.cybermark-cart-sidebar-overlay, .cybermark-cart-close').on( 'click', function( e ) {
		e.preventDefault();
		
		cybermark_cart_filter_close();

		// Remove show-cart here to let the header mini cart working
		$j( 'body' ).removeClass( 'show-cart' );
	} );

	// Close on resize to avoid conflict
	$j( window ).resize( function() {
		cybermark_cart_filter_close();
	} );

}