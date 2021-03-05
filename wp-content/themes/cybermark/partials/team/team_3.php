<section class="team_3 section__wrapper">
	<span class="h6 section__title">Team 3</span>
	<div class="container">
		<?php
		$args = array(
		  'post_type'   => 'team',
		  'post_status' => 'publish',	
		  'order'				=> 'ASC'
		 );
		 
		$team = new WP_Query( $args );
		?>
		<div class="team__wrapper">
			<div class="row justify-content-center">
			<?php
			  while( $team->have_posts() ) :
			    $team->the_post();
				$profile_image = get_field('profile_image');
				$more_details = get_field('more_Details');
				$bio = get_field('team_member_bio');?>
					<div class="col-md-4">
						<div class="column team-column team-3-column text-center">
							<div class="team-img">
								<div class="profile-img-sq">
								    <img src="<?php echo esc_url($profile_image['url']); ?>" alt="<?php echo esc_attr($profile_image['alt']); ?>" />
								  </div>
							</div>
							<div class="team-bio-content">
								<span class="h3 emp-title d-block"><?php the_title();?></span>
								<span class="h4 emp-position d-block"><?php echo $more_details;?></span>
								<?php echo $bio;?>
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
</section>