<?php
/**
 * Template for displaying search forms in Elevative
 *
 * @package WordPress
 * @subpackage Elevative
 * @since 1.0
 * @version 1.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'elevative' ); ?></span>
	</label>
	<div class="search-input">
		<input type="search" id="" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'elevative' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="search-submit"><?php echo elevative_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'elevative' ); ?></span></button>
	</div>
</form>
