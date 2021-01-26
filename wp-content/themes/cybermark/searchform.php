<?php
/**
 * Template for displaying search forms in CyberMark
 *
 * @package WordPress
 * @subpackage CyberMark
 * @since 1.0
 * @version 1.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'cybermark' ); ?></span>
	</label>
	<div class="search-input">
		<input type="search" id="" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'cybermark' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="search-submit"><?php echo cybermark_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'cybermark' ); ?></span></button>
	</div>
</form>
