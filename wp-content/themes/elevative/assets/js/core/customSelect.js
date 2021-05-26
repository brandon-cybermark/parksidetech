var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
	// Custom select
	elevativeCustomSelects();
} );

/* ==============================================
CUSTOM SELECT
============================================== */
function elevativeCustomSelects() {
	"use strict"

	$j( elevativeLocalize.customSelects ).customSelect( {
		customClass: 'theme-select'
	} );

}