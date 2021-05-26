var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
	// Nav no click
	elevativeNavNoClick();
} );

/* ==============================================
NAV NO CLICK
============================================== */
function elevativeNavNoClick() {
	"use strict"

	$j( 'li.nav-no-click > a' ).on( 'click', function() {
		return false;
	} );

}