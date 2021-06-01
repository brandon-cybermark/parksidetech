<?php 
$testimonial_type = get_sub_field('testimonial_type');
$content_block = get_sub_field('content_block');
		$block_id = get_sub_field('block_id');?>


<section class="section <?php echo $testimonial_type;?> section__wrapper pp-scrollable" id="<?php echo $block_id;?>">
	<div class="content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="section__content ">
							<p class="subhead">Testimonials</p>
							<h2>What our clients have to say</h2>
					</div>
				</div>
			</div>
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
			    <div class="nav-arrows"></div>
		<?php endif;?>
		</div>
	</div>
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
  appendArrows: '.nav-arrows',
  prevArrow:"<button type='button' class='slick-prev pull-left'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve'><style type='text/css'>.st0{fill:#072539}</style><g> <g> <path class='st0' d='M3.1,263.5l160,160c2.1,2.1,4.8,3.1,7.5,3.1s5.5-1,7.5-3.1c4.2-4.2,4.2-10.9,0-15.1L36.4,266.7h464.9 c5.9,0,10.7-4.8,10.7-10.7s-4.8-10.7-10.7-10.7H36.4l141.8-141.8c4.2-4.2,4.2-10.9,0-15.1c-4.2-4.2-10.9-4.2-15.1,0l-160,160 C-1,252.6-1,259.4,3.1,263.5z'/> </g> </g> </svg></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve'><style type='text/css'>.st0{fill:#072539}</style><g> <g> <path class='st0' d='M508.9,248.5l-160-160c-4.2-4.2-10.9-4.2-15.1,0c-4.2,4.2-4.2,10.9,0,15.1l141.8,141.8H10.7 C4.8,245.3,0,250.1,0,256s4.8,10.7,10.7,10.7h464.9L333.8,408.5c-4.2,4.2-4.2,10.9,0,15.1c2.1,2.1,4.8,3.1,7.5,3.1s5.5-1,7.5-3.1 l160-160C513,259.4,513,252.6,508.9,248.5z'/> </g> </g> </svg></button>"
  });
});
</script>
<?php endif;?>
</section>

