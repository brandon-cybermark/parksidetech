<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Elevative
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="section__wrapper">
	<div class="container">
	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1><?php printf( __( 'Search Results for: %s', 'elevative' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1><?php _e( 'Nothing Found', 'elevative' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area section__wrapper">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'excerpt' );

			endwhile; // End of the loop.

			the_posts_pagination(
				array(
								'prev_text'          => __( '<span class="screen-reader-text" style="display: none;">Previous page</span>', 'elevative' ),
								'next_text'          => __( '<span class="screen-reader-text" style="display: none;">Next page', 'elevative</span>' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'elevative' ) . ' </span>',
				)
			);

		else :
			?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'elevative' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>

	</div><!-- #primary -->
</div><!-- .wrap -->
</div>
<?php
get_footer();
