<section class="features_1 section__wrapper">
	<span class="h6 section__title">Features 1</span>
	<div class="container">
		<div class="section__heading">
			<?php the_sub_field('content_block');?>
		</div>
		<?php
			if( have_rows('feature') ):?>
				<div class="row justify-content-center">
					<?php while( have_rows('feature') ) : the_row();
					$image = get_sub_field('image');
					$text = get_sub_field('text');?>

						<div class="col-md-6">
							<div class="column">
								<?php if($image):?>
								<div class="column-img">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</div>
								<?php endif;?>
								<?php if($text):?>
								<div class="column-text">
									<?php echo $text;?>
								</div>
								<?php endif;?>
							</div>
						</div>
						<?php endwhile;?>
				</div>
			<?php endif;?>
	</div>
</section>