var $j 		= jQuery.noConflict(),
	$window = $j( window );

$j( document ).on( 'ready', function() {
	"use strict";
	// Scroll effect
	elevativeScrollEffect();
} );

/* ==============================================
SCROLL EFFECT
============================================== */
function elevativeScrollEffect() {
	"use strict"

	if ( ! $j( 'body' ).hasClass( 'single-product' )
		&& ! $j( 'body' ).hasClass( 'no-local-scroll' ) ) {

	    $j( 'a.local[href*="#"]:not([href="#"]), .local a[href*="#"]:not([href="#"]), a.menu-link[href*="#"]:not([href="#"]), a.sidr-class-menu-link[href*="#"]:not([href="#"])' ).on( 'click', function() {

	    	if ( ! $j( this ).hasClass( 'omw-open-modal' )
	        	&& ! $j( this ).parent().hasClass( 'omw-open-modal' )
	        	&& ! $j( this ).parent().parent().parent().hasClass( 'omw-open-modal' )
	        	&& ! $j( this ).parent().hasClass( 'opl-link' ) ) {

	        	var $href     				= $j( this ).attr( 'href' ),
				    $hrefHash 				= $href.substr( $href.indexOf( '#' ) ).slice( 1 ),
				    $target   				= $j( '#' + $hrefHash ),
					$adminbarHeight        	= elevativeGetAdminbarHeight(),
					$topbarHeight        	= elevativeGetTopbarHeight(),
					$stickyHeaderHeight    	= elevativeGetStickyHeaderHeight(),
					$offset    				= $adminbarHeight + $topbarHeight + $stickyHeaderHeight,
				    $scrollPosition;

				if ( $target.length && '' !== $hrefHash ) {
					$scrollPosition     	= $target.offset().top - $offset;

	                $j( 'html, body' ).stop().animate( {
						 scrollTop: Math.round( $scrollPosition )
					}, 1000 );

					return false;

	            }

	        }

	    } );

	}

}

// Admin bar height
function elevativeGetAdminbarHeight() {
	"use strict"

	var $offset 		= 0,
	    $adminBar 		= $j( '#wpadminbar' );

	if ( $adminBar.length ) {
		$offset = $adminBar.outerHeight();
	}

	return $offset;
}

// Top bar height
function elevativeGetTopbarHeight() {
	"use strict"

	var $offset 		= 0,
	    $stickyTopBar 	= $j( '#top-bar-wrap' );

	if ( $stickyTopBar.hasClass( 'top-bar-sticky' )
		&& $stickyTopBar.length ) {
		$offset = $stickyTopBar.outerHeight();
	}

	return $offset;
}

// Header height
function elevativeGetStickyHeaderHeight() {
	"use strict"

	var $offset 		= 0,
	    $stickyHeader 	= $j( '#site-header' );

	if ( ! $stickyHeader.length ) {
		return;
	}

	if ( $stickyHeader.hasClass( 'fixed-scroll' ) ) {
		$offset = $stickyHeader.data( 'height' );
	}

	if ( $window.width() <= 960
		&& ! $stickyHeader.hasClass( 'has-sticky-mobile' ) ) {
		$offset = $offset;
	}

	if ( $stickyHeader.hasClass( 'medium-header' ) ) {
		if ( $j( '#site-header .bottom-header-wrap' ).hasClass( 'fixed-scroll' ) ) {
			$offset = $j( '#site-header .bottom-header-wrap' ).outerHeight();
		} else {
			$offset = $j( '.is-sticky #site-header-inner' ).outerHeight();
		}
	}

	if ( $stickyHeader.hasClass( 'vertical-header' ) ) {
		$offset = $offset;
	}

	return $offset;
}