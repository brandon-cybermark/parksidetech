var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Woo catalog view
    elevativeWooGridList();
} );

/* ==============================================
WOOCOMMERCE GRID LIST VIEW
============================================== */
function elevativeWooGridList() {
	"use strict"

	if ( $j( 'body' ).hasClass( 'has-grid-list' ) ) {

		// Re-run function
		var elevativeProductSlider = function() {
			if ( ! $j( 'body' ).hasClass( 'no-carousel' )
				&& $j( '.woo-entry-image.product-entry-slider' ).length) {
                setTimeout( function() {
                    $j( '.woo-entry-image.product-entry-slider' ).slick( 'unslick' );
                    elevativeInitCarousel();
                }, 350 );
            }
        }

		$j( '#elevative-grid' ).on( 'click', function() {
			elevativeProductSlider();

			$j( this ).addClass( 'active' );
			$j( '#elevative-list' ).removeClass( 'active' );
			Cookies.set( 'gridcookie', 'grid', { path: '' } );
			$j( '.woocommerce ul.products' ).fadeOut( 300, function() {
				$j( this ).addClass( 'grid' ).removeClass( 'list' ).fadeIn( 300 );
			} );
			return false;
		} );

		$j( '#elevative-list' ).on( 'click', function() {
			elevativeProductSlider();
            
			$j( this ).addClass( 'active' );
			$j( '#elevative-grid' ).removeClass( 'active' );
			Cookies.set( 'gridcookie', 'list', { path: '' } );
			$j( '.woocommerce ul.products' ).fadeOut( 300, function() {
				$j( this ).addClass( 'list' ).removeClass( 'grid' ).fadeIn( 300 );
			} );
			return false;
		} );

		if ( Cookies.get( 'gridcookie' ) == 'grid' ) {
	        $j( '.elevative-grid-list #elevative-grid' ).addClass( 'active' );
	        $j( '.elevative-grid-list #elevative-list' ).removeClass( 'active' );
	        $j( '.woocommerce ul.products' ).addClass( 'grid' ).removeClass( 'list' );
	    }

	    if ( Cookies.get( 'gridcookie' ) == 'list' ) {
	        $j( '.elevative-grid-list #elevative-list' ).addClass( 'active' );
	        $j( '.elevative-grid-list #elevative-grid' ).removeClass( 'active' );
	        $j( '.woocommerce ul.products' ).addClass( 'list' ).removeClass( 'grid' );
	    }

	} else {

		Cookies.remove( 'gridcookie', { path: '' } );

	}

}