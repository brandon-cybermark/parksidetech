var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
	// Nav no click
	cybermarkNavNoClick();
} );

/* ==============================================
NAV NO CLICK
============================================== */
function cybermarkNavNoClick() {
	"use strict"

	$j( 'li.nav-no-click > a' ).on( 'click', function() {
		return false;
	} );

}