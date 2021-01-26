<?php
	$args = array(
	  'post_type'   => 'testimonials',
	  'post_status' => 'publish',	
	'order'				=> 'ASC'
	  
	 );
	 
	$testimonials = new WP_Query( $args );
	if( $testimonials->have_posts() ) :
	?>
<div class="testimonials">
	<div class="container">
		<div class="content-title text-center">
			<h2>What our guests say about us</h2>
		</div>
			
			<div class="testimonial-container">
				<?php
			  while( $testimonials->have_posts() ) :
			    $testimonials->the_post();
			    ?>
			<?php 
				$review_details = get_field('review_details');
				$clients_name = get_field('customer_name');?>
							<div class="testimonial">
								<div class="testimonial-content">
									<blockquote><?php echo $review_details;?></blockquote>
								</div>	
								<div class="testimonial-author">
									<?php echo $clients_name;?>
								</div>
							</div>
			
					<?php
		      endwhile;
		      wp_reset_postdata();
		    ?></div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
$('.testimonial-container').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: false,
  dots: true,
});
});
</script>
<?php endif;?>