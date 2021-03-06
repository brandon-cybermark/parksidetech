<?php
/**
 * @package WordPress
 * @subpackage Elevative
 * @since Elevative 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>

					<?php
					// Start the loop.
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content-excerpt' );

						// End the loop.
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination(
						array(
							'prev_text'          => __( 'Previous page', 'elevative' ),
							'next_text'          => __( 'Next page', 'elevative' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'elevative' ) . ' </span>',
						)
					);

					// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/post/content', 'none' );

				endif;
				?>

				</main><!-- .site-main -->
			</div><!-- .content-area -->
		</div>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
