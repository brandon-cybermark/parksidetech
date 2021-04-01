<?php
/*
Template Name: Single Events Template
*/
get_header(); 

?>

<!-- SECTION WELCOME-->
<section class="section-welcome">
	<div class="banner-background-image-wrapper" 
		<?php $banner_image = get_field('event_image'); 
			if($banner_image){ 
				echo 'style="background-image: url('.$banner_image['url'].')"'; 
			}?>>
		
			<div class="wrapper" style="display: flex;justify-content: center;align-items: center;">

				<?php 
				$string = get_field('event_date');

				$arr = explode(' ', $string); 

									// get month and remove it from the array
				$month = $arr[0];
				$abbr = substr($month, 0, 3);

									// get the day from the date and remove it from the array
				$day =  $arr[1];

									// get the day from the date and remove it from the array
				$year =  $arr[2];


				?>
				<div class="home-event-date-wrapper">
					<div class="home-event-day">
						<div class="home-event-day"><?php echo str_replace(",","", $day);?></div>
					</div>
					<div class="divider home-event-date"></div>
					<div class="home-event-date" >
						<div class="home-event-month"><?php echo $abbr; ?></div>
						<div class="home-event-year"><?php echo $year; ?></div></div>
					</div>


					<h1 class="main-title "><?php the_title();?>
						<div class="wpv-tribe-events-meta">
							<div class="tribe-events-meta-group tribe-events-meta-group-details" >

								<dl>
									<dt class="tribe-events-start-date-label"> 
										<span class="fa fa-calendar"></span>
									</dt>
									<dd>
										<abbr class="tribe-events-abbr tribe-events-start-date published dtstart" title="<?php the_field('event_time'); ?>"> <?php if (get_field('event_date') ): the_field('event_date'); ?> - <?php endif; the_field('event_end_date'); ?></abbr>
									</dd>
									<?php if (the_field('event_time') ): ?>
									<dt class="tribe-events-start-time-label"> <span class="fas fa-clock"></span> </dt>
									<dd>
										<div class="tribe-events-abbr tribe-events-start-time published dtstart" title="<?php the_field('event_time'); ?>">

											<div class="tribe-recurring-event-time"><?php the_field('event_time'); ?></div> 
										</div>
									</dd>
									<?php endif; ?>
								</dl>
							</div>
						</div>
					</h1>
			</div>					
	</div>
</section>
<!-- SECTION WELCOME END-->


<div class="single events_wrap">
	<div class="bg-image" style="background-size:50%; background-image: url(<?php echo home_url();?>/wp-content/themes/images/section-location-bg.png )"></div>
	<div class="container"  style="padding:50px 0px">
		
        <div id="tribe-events-content" class="tribe-events-single">
        	
          	<div class="tribe-events-single-event-description tribe-events-content entry-content description">
      			<div class="row m-0 text-center">

					<?php echo the_content();  ?>
				</div>
			</div>
        </div>
        
	</div>
</div>
<?php
get_footer();
