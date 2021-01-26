var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
	// Custom select
	cybermarkCustomSelects();
} );

/* ==============================================
CUSTOM SELECT
============================================== */
function cybermarkCustomSelects() {
	"use strict"

	$j( cybermarkLocalize.customSelects ).customSelect( {
		customClass: 'theme-select'
	} );

}