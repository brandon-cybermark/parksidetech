<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage CyberMark
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" class="blog-entry large-entry post type-post status-publish format-standard ">
		<div class="blog-entry-inner clr">
			<div class="row align-items-center">
					<?php if ( has_post_thumbnail() ):?>
						<div class="col-lg-12 mb-3">
							<div class="featured_img">
								<?php the_post_thumbnail();?>
								<div class="meta clr">
									<span class="meta-cat"><?php the_category( ' / ', get_the_ID() ); ?></span>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<div class="col-12">

				<header class="blog-entry-header clr">
					<div class="meta clr">
						<span class="meta-date"><?php echo get_the_date(); ?></span>
						<span class="meta-auth"><?php echo get_the_author(); ?></span>
					</div>
					
					<h2 class="blog-entry-title entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2><!-- .blog-entry-title -->
				</header><!-- .blog-entry-header -->

				<div class="blog-entry-summary clr">

				    <p>
				            <?php
				            // Display custom excerpt
				            the_excerpt();?>
				        </p>

				   

				</div><!-- .blog-entry-summary -->

				<div class="blog-entry-readmore clr">
				    <a href="<?php the_permalink(); ?>" title="" class="btn primary-btn">Read More</a>
				</div><!-- .blog-entry-readmore -->


				</div>
			</div><!-- .blog-entry-inner -->
		</div>
	</article><!-- #post-## -->
