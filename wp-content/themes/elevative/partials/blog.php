<?php
$content_block = get_sub_field('content_block');
$blog_heading = get_sub_field('blog_heading');
$blog_subheading = get_sub_field('blog_subheading');
		$block_id = get_sub_field('block_id');
	$args = array(
	  'post_type'   => 'post',
	  'post_status' => 'publish',	
		'order'				=> 'ASC',
		'posts_per_page' => 5,
	  
	 );
	 
	$blogs = new WP_Query( $args );
	if( $blogs->have_posts() ) :
	?>
<div class="section__wrapper" id="blogPosts <?php echo $block_id;?>">
	<div class="container">
		<div class="row flex-row-reverse align-items-center">
			<div class="col-lg-6">
				<div class="section__heading blog__heading">
					<h2><?php echo $blog_heading;?></h2>
					<span class="h1"><?php echo $blog_subheading;?></span>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="section__container">
					<div class="section__content ">
						<?php echo $content_block;?>
						<div class="section__button ">
							<a class="btn primary-btn" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">View All</a>				
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="blog-posts__wrapper mt-5">
			<?php
				while( $blogs->have_posts() ) :
				    $blogs->the_post();?>
				<div class="blog__posts">
					<div class="column blog-column text-center">
						<div class="blog-post">
							<div class="blog-post__img">
								<?php if ( has_post_thumbnail() ) {
								    the_post_thumbnail();
								}
									else {
										echo '<img src="'.get_template_directory_uri().'/assets/images/blog-default.png"  />';
									}
								?>
							</div>
							<div class="blog-post__header">
								<span class="blog-meta"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
								<span class="h5 blog-title d-block"><?php the_title();?></span>
							</div>
							<div class="blog-content">
								<?php echo get_excerpt(); ?>
							</div>	
							<div class="blog-post__footer">
								<a href="<?php the_permalink();?>" class="btn more-btn">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata();?>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.blog-posts__wrapper').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: true,
  dots: false,
  prevArrow:"<button type='button' class='slick-prev pull-left'><svg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve'><g><g><path d='M123.6,270.1l236.8,236.2c7.8,7.7,20.3,7.7,28.1,0c7.7-7.8,7.7-20.3,0-28.1L165.7,256L388.4,33.9c7.8-7.7,7.8-20.3,0-28.1c-3.9-3.9-9-5.8-14.1-5.8c-5.1,0-10.1,1.9-14,5.8L123.6,242c-3.7,3.7-5.8,8.8-5.8,14.1C117.7,261.3,119.8,266.3,123.6,270.1z'/></g></g></svg></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 512.002 512.002' style='enable-background:new 0 0 512.002 512.002;' xml:space='preserve'> <g> <g> <path d='M388.425,241.951L151.609,5.79c-7.759-7.733-20.321-7.72-28.067,0.04c-7.74,7.759-7.72,20.328,0.04,28.067l222.72,222.105 L123.574,478.106c-7.759,7.74-7.779,20.301-0.04,28.061c3.883,3.89,8.97,5.835,14.057,5.835c5.074,0,10.141-1.932,14.017-5.795 l236.817-236.155c3.737-3.718,5.834-8.778,5.834-14.05S392.156,245.676,388.425,241.951z'/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></button>"
    });

});
</script>
<?php endif;?>