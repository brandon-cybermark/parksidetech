<section class="testimonials_1 section__wrapper">
	<span class="h6 section__title">Testimonial 1</span>
	<div class="container">
		<div class="section__heading text-center">
			<?php the_sub_field('content_block');?>
		</div>
		<?php
			$args = array(
			  'post_type'   => 'testimonials',
			  'post_status' => 'publish',	
			'order'				=> 'ASC'
			  
			 );
			 
			$testimonials = new WP_Query( $args );
			?>

		<div class="testimonials">
			<div class="row">
				<?php
				while( $testimonials->have_posts() ) :
				    $testimonials->the_post();
					$review_details = get_field('review_details');
					$more_details = get_field('more_Details');
					$clients_name = get_field('customer_name');?>
				<div class="col-md-4">
					<div class="column testimonial-column testimonial-1-column text-center">
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
	</div>
</section>
