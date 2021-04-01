<?php 
		$team_type = get_sub_field('team_type');
		$content_block = get_sub_field('content_block');
		$block_id = get_sub_field('block_id');
		$args = array(
		  'post_type'   => 'team',
		  'post_status' => 'publish',	
		  'order'				=> 'ASC'
		 );
		 
		$team = new WP_Query( $args );?>

<section class="<?php echo $team_type;?> section__wrapper" id="<?php echo $block_id;?>">
	<div class="container">
		<div class="row">
			<div class="col-12 mb-5">
				<div class="section__container">
					<div class="section__content ">
						<?php the_sub_field('content_block');?>
					</div>
				</div>
			</div>
			<div class="col-12">
				<?php if($team_type == 'team_2'):?>
					<div class="team__wrapper team__slider">
						<?php
						  while( $team->have_posts() ) :
						    $team->the_post();
							$employee_photo = get_field('profile_image');
							$about = get_field('team_member_bio');
							$employee_position = get_field('more_details');?>
									<div class="team-slide team-column team-2-column">
										<div class="team-img">
											<div class="profile-img">
										    	<img src="<?php echo esc_url($employee_photo['url']); ?>" alt="<?php the_title();?>" />
											</div>
										</div>
										<div class="team-bio-content">
											<span class="h3 emp-title d-block"><?php the_title();?></span>
											<span class="h4 emp-position d-block"><?php echo $employee_position;?></span>
											<?php echo $about;?>
											<ul class="column_social team_social <?php echo $team_type;?>_social">
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
									            <?php endif;
									            if(get_field('youtube_url')):?>
									              <li><a href="<?php the_field('youtube_url'); ?>" target="_blank" title="You Tube"><span class="fab fa-youtube"></span></a></li>
									            <?php endif;
									            if(get_field('yelp_url')):?>
									              <li><a href="<?php the_field('yelp_url'); ?>" target="_blank" title="Yelp"><span class="fab fa-yelp"></span></a></li>
									            <?php endif;
									            if(get_field('pinterest_url')):?>
									              <li><a href="<?php the_field('pinterest_url'); ?>" target="_blank" title="Pinterest"><span class="fab fa-pinterest"></span></a></li>
									            <?php endif;?>
											</ul>
										</div>
									</div>
								<?php
					      endwhile;
					      wp_reset_postdata();
					    ?>
					</div>
				<?php else:?>
				<div class="team__wrapper">
					<div class="row justify-content-center">
					<?php
						$count=0;
					    while( $team->have_posts() ) :
					    $team->the_post();
					    $count++;
							$employee_photo = get_field('profile_image');
							$about = get_field('team_member_bio');
							$employee_position = get_field('more_details');?>
							<div class="col-md-4">
								<div class="column team-column <?php echo $team_type;?>-column text-center">
									<div class="team-img">
										<div class="profile-img">
										    <img src="<?php echo esc_url($employee_photo['url']); ?>" alt="<?php the_title();?>" />
										  </div>
									</div>
									<div class="team-bio-content <?php if($team_type == 'team_4'):?>hidden-content<?php endif;?>">
										<span class="h3 emp-title d-block"><?php the_title();?></span>
										<span class="h4 emp-position d-block"><?php echo $employee_position;?></span>
											<?php if($team_type != 'team_4'){
												echo $about;
											} ?>
											<ul class="column_social team_social <?php echo $team_type;?>_social">
												<?php if(get_field('facebook_url')):?>
									              <li><a href="<?php the_field('facebook_url'); ?>" target="_blank" title="Facebook" rel="nofollow"><span class="fab fa-facebook-f"></span></a></li>
									            <?php endif;
									            if(get_field('twitter_url')):?>
									              <li><a href="<?php the_field('twitter_url'); ?>" target="_blank" title="Twitter" rel="nofollow"><span class="fab fa-twitter"></span></a></li>
									            <?php endif;
									            if(get_field('linkedin_url')):?>
									              <li><a href="<?php the_field('linkedin_url'); ?>" target="_blank" title="LinkedIn" rel="nofollow"><span class="fab fa-linkedin"></span></a></li>
									            <?php endif;
									            if(get_field('instagram_url')):?>
									              <li><a href="<?php the_field('instagram_url'); ?>" target="_blank" title="Instagram" rel="nofollow"><span class="fab fa-instagram"></span></a></li>
									            <?php endif;
									            if(get_field('youtube_url')):?>
									              <li><a href="<?php the_field('youtube_url'); ?>" target="_blank" title="You Tube" rel="nofollow"><span class="fab fa-youtube"></span></a></li>
									            <?php endif;
									            if(get_field('yelp_url')):?>
									              <li><a href="<?php the_field('yelp_url'); ?>" target="_blank" title="Yelp" rel="nofollow"><span class="fab fa-yelp"></span></a></li>
									            <?php endif;
									            if(get_field('pinterest_url')):?>
									              <li><a href="<?php the_field('pinterest_url'); ?>" target="_blank" title="Pinterest" rel="nofollow"><span class="fab fa-pinterest"></span></a></li>
									            <?php endif;?>
											</ul>
											<?php if($team_type == 'team_4'):?>
												<a href="<?php the_permalink();?>" class="btn more-btn" data-toggle="modal" data-target="#employee-<?php echo $count ?>">About Me</a>
											<?php endif;?>
									</div>
								</div>
							</div>
							<?php if($team_type == 'team_4'):?>
							<div class="modal" id="employee-<?php echo $count ?>" tabindex="-1" role="dialog" aria-labelledby="employeeLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								         		<span aria-hidden="true">&times;</span>
								        	</button>
								      	</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-lg-6 mb-lg-0 mb-5">
													<div class="team_4_popupimage">
														<img src="<?php echo esc_url($employee_photo['url']); ?>" alt="<?php the_title();?>" />
													</div>
												</div>
												<div class="col-lg-6">
													<div class="team_4_popupheader">
														<span class="h3 emp-title d-block"><?php the_title();?></span>
														<span class="h4 emp-position d-block"><?php echo $employee_position;?></span>
													</div>
													<ul class="team_social <?php echo $team_type;?>_social">
														<?php if(get_field('facebook_url')):?>
											              <li><a href="<?php the_field('facebook_url'); ?>" target="_blank" title="Facebook" rel="nofollow"><span class="fab fa-facebook-f"></span></a></li>
											            <?php endif;
											            if(get_field('twitter_url')):?>
											              <li><a href="<?php the_field('twitter_url'); ?>" target="_blank" title="Twitter" rel="nofollow"><span class="fab fa-twitter"></span></a></li>
											            <?php endif;
											            if(get_field('linkedin_url')):?>
											              <li><a href="<?php the_field('linkedin_url'); ?>" target="_blank" title="LinkedIn" rel="nofollow"><span class="fab fa-linkedin"></span></a></li>
											            <?php endif;
											            if(get_field('instagram_url')):?>
											              <li><a href="<?php the_field('instagram_url'); ?>" target="_blank" title="Instagram" rel="nofollow"><span class="fab fa-instagram"></span></a></li>
											            <?php endif;
											            if(get_field('youtube_url')):?>
											              <li><a href="<?php the_field('youtube_url'); ?>" target="_blank" title="You Tube" rel="nofollow"><span class="fab fa-youtube"></span></a></li>
											            <?php endif;
											            if(get_field('yelp_url')):?>
											              <li><a href="<?php the_field('yelp_url'); ?>" target="_blank" title="Yelp" rel="nofollow"><span class="fab fa-yelp"></span></a></li>
											            <?php endif;
											            if(get_field('pinterest_url')):?>
											              <li><a href="<?php the_field('pinterest_url'); ?>" target="_blank" title="Pinterest" rel="nofollow"><span class="fab fa-pinterest"></span></a></li>
											            <?php endif;?>
													</ul>
													<div class="team_4_popupcontent">
														<?php echo $about;?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif;
				      endwhile;
				      wp_reset_postdata();
				    ?>
				</div>
				<?php endif;?>
			</div>
		</div>
		
	</div>
</section>
<?php if($team_type == 'team_2'):?>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.team__slider').slick({
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
