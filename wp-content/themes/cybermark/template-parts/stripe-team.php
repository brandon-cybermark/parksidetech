<?php
	$args = array(
	  'post_type'   => 'team',
	  'post_status' => 'publish',	
	'order'				=> 'ASC'
	  
	 );
	 
	$team = new WP_Query( $args );
	if( $team->have_posts() ) :
	?>
<div class="our-team__wrapper">
	<div class="container">
		<div class="content-title text-center">
			<h2>Our Team</h2>
		</div>
		<div class="our-team__inner">
			<div class="row">
			<?php
			  while( $team->have_posts() ) :
			    $team->the_post();
			    ?>
			<?php 
				$employee_photo = get_field('employee_photo');
				$employee_position = get_field('employee_position');
				$about = wp_trim_words(get_field('about'), 10);
				$facebook_url = get_field('facebook_url');
				$twitter_url = get_field('twitter_url');
				$linkedin_url = get_field('linkedin_url');
				$instagram_url = get_field('instagram_url');?>
					<div class="col-lg-3">
						<div class="main-team__wrapper">
							
							<div class="team-member__header">
								<div class="team-member__header-inner">
									<div class="team-member-image">
										<?php if( get_field('employee_photo') ): ?>
										    <a href="<?php the_permalink();?>"><img src="<?php the_field('employee_photo'); ?>" alt="<?php the_title();?>" /></a>
										<?php endif; ?>
									</div>
									<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<h6><?php echo $employee_position;?></h6>
								</div>
							</div>
							<div class="team-member__content">
								<div class="team-member__content-inner">
									<?php echo $about;?>
								</div>
							</div>
							<div class="team-member__footer">
								<div class="team-member__footer-inner">
									<ul class="team-social-list">
							            <?php if(get_field('facebook_url')):?>
							              <li><a href="<?php the_field('facebook_url'); ?>" target="_blank" title="Facebook"><span class="fab fa-facebook-f"></span></a></li>
							            <?php endif;
							            if(get_field('twitter_url')):?>
							              <li><a href="<?php the_field('twitter_url'); ?>" target="_blank" title="Twitter"><span class="fab fa-twitter"></span></a></li>
							            <?php endif;
							            if(get_field('linkedin_url')):?>
							              <li><a href="<?php the_field('linkedin_url'); ?>" target="_blank" title="LinkedIn"><span class="fab fa-linkedin"></span></a></li>
							            <?php endif;
							            if(get_field('instagram_url')):?>
							              <li><a href="<?php the_field('instagram_url'); ?>" target="_blank" title="Instagram"><span class="fab fa-instagram"></span></a></li>
							            <?php endif;?>
							        </ul>
								</div>
							</div>
						</div>
					</div>
					<?php
		      endwhile;
		      wp_reset_postdata();
		    ?>
			</div>
		</div>
	</div>
</div>


<?php endif;?>