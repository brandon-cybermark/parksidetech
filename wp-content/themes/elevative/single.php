<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Elevative
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'elevative' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'elevative' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . elevative_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'elevative' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'elevative' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . elevative_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					)
				);

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
	<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
get_footer();
