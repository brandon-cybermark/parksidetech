<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage CyberMark
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="section__wrapper vh-100">
	<div class="container h-100">
		<div id="primary" class="content-area h-100">

				<section class="error-404 not-found h-100">
					<header class="page-header text-center">
						<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'cybermark' ); ?></h1>
						<p><?php _e( 'It looks like nothing was found. Maybe try a search?', 'cybermark' ); ?></p>
					</header><!-- .page-header -->
					<div class="page-content">

						<?php get_search_form(); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->
		</div><!-- #primary -->
	</div><!-- .wrap -->
</div>
<?php
get_footer();
