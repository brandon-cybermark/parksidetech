<section class="features_2 section__wrapper">
	<span class="h6 section__title">Features 2</span>
	<div class="container">
		<div class="section__heading text-center">
			<?php the_sub_field('content_block');?>
		</div>
		<?php
		if( have_rows('feature') ):?>

		<div class="section__container columns feature_columns">
			<div class="row justify-content-center">
				<?php while( have_rows('feature') ) : the_row();
					$image = get_sub_field('image');
					$text = get_sub_field('text');?>
				<div class="col-md-4">
					<div class="column features_2_column">
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
		</div>
		<?php endif;?>
	</div>
</section>