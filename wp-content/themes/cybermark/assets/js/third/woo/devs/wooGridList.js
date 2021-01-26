var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Woo catalog view
    cybermarkWooGridList();
} );

/* ==============================================
WOOCOMMERCE GRID LIST VIEW
============================================== */
function cybermarkWooGridList() {
	"use strict"

	if ( $j( 'body' ).hasClass( 'has-grid-list' ) ) {

		// Re-run function
		var cybermarkProductSlider = function() {
			if ( ! $j( 'body' ).hasClass( 'no-carousel' )
				&& $j( '.woo-entry-image.product-entry-slider' ).length) {
                setTimeout( function() {
                    $j( '.woo-entry-image.product-entry-slider' ).slick( 'unslick' );
                    cybermarkInitCarousel();
                }, 350 );
            }
        }

		$j( '#cybermark-grid' ).on( 'click', function() {
			cybermarkProductSlider();

			$j( this ).addClass( 'active' );
			$j( '#cybermark-list' ).removeClass( 'active' );
			Cookies.set( 'gridcookie', 'grid', { path: '' } );
			$j( '.woocommerce ul.products' ).fadeOut( 300, function() {
				$j( this ).addClass( 'grid' ).removeClass( 'list' ).fadeIn( 300 );
			} );
			return false;
		} );

		$j( '#cybermark-list' ).on( 'click', function() {
			cybermarkProductSlider();
            
			$j( this ).addClass( 'active' );
			$j( '#cybermark-grid' ).removeClass( 'active' );
			Cookies.set( 'gridcookie', 'list', { path: '' } );
			$j( '.woocommerce ul.products' ).fadeOut( 300, function() {
				$j( this ).addClass( 'list' ).removeClass( 'grid' ).fadeIn( 300 );
			} );
			return false;
		} );

		if ( Cookies.get( 'gridcookie' ) == 'grid' ) {
	        $j( '.cybermark-grid-list #cybermark-grid' ).addClass( 'active' );
	        $j( '.cybermark-grid-list #cybermark-list' ).removeClass( 'active' );
	        $j( '.woocommerce ul.products' ).addClass( 'grid' ).removeClass( 'list' );
	    }

	    if ( Cookies.get( 'gridcookie' ) == 'list' ) {
	        $j( '.cybermark-grid-list #cybermark-list' ).addClass( 'active' );
	        $j( '.cybermark-grid-list #cybermark-grid' ).removeClass( 'active' );
	        $j( '.woocommerce ul.products' ).addClass( 'list' ).removeClass( 'grid' );
	    }

	} else {

		Cookies.remove( 'gridcookie', { path: '' } );

	}

}