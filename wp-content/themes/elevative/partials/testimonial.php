<?php 
$testimonial_type = get_sub_field('testimonial_type');
$content_block = get_sub_field('content_block');
		$block_id = get_sub_field('block_id');?>


<section class="<?php echo $testimonial_type;?> section__wrapper" id="<?php echo $block_id;?>">
	<div class="container">
		<?php if($content_block):?>
		<div class="section__heading text-center">
			<?php echo $content_block;?>
		</div>
	<?php endif;?>
		<?php
			$args = array(
			  'post_type'   => 'testimonials',
			  'post_status' => 'publish',	
			'order'				=> 'ASC'
			  
			 );
			 
			$testimonials = new WP_Query( $args );
		if($testimonial_type == 'testimonial_1'):?>

		<div class="testimonials">
			<div class="row justify-content-center">
				<?php
				while( $testimonials->have_posts() ) :
				    $testimonials->the_post();
					$review_details = get_field('review_details');
					$more_details = get_field('more_details');
					$clients_name = get_field('customer_name');?>
				<div class="col-md-4">
					<div class="column testimonial-column <?php echo $testimonial_type;?>-column text-center">
						<div class="testimonial">
							<div class="testimonial-author">
								<span class="h3 customer-title d-block"><?php echo $clients_name;?></span>
								<span class="h4 customer-details d-block"><?php echo $more_details;?></span>
							</div>
							<div class="testimonial-content">
								<?php echo $review_details;?>
							</div>	
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata();?>
			</div>
		</div>
		<?php elseif($testimonial_type == 'testimonial_2'):?>
		<div class="testimonial-container">
				<?php
			  while( $testimonials->have_posts() ) :
			    $testimonials->the_post();
				$review_details = get_field('review_details');
				$more_details = get_field('more_details');
				$clients_name = get_field('customer_name');?>
							<div class="testimonial-slide">
								<div class="testimonial-content">
									<blockquote><?php echo $review_details;?></blockquote>
								</div>	
								<div class="testimonial-author">
									<span class="h3 customer-title d-block"><?php echo $clients_name;?></span>
									<span class="h4 customer-details d-block"><?php echo $more_details;?></span>
								</div>
							</div>
			
					<?php
		      endwhile;
		      wp_reset_postdata();
		    ?>
		</div>
	<?php endif;?>
	</div>
</section>

<?php if($testimonial_type == 'testimonial_2'):?>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.testimonial-container').slick({
  slidesToShow: 1,
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