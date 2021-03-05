<section class="features_2 section__wrapper">
	<span class="h6 section__title">Features 3</span>
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
					$text = get_sub_field('text');
					?>
				<div class="col-md-4">
					<div class="column features_3_column">
						<?php if($image):?>
						<div class="column-img">
						<?php 
						$size = 'full';
						echo wp_get_attachment_image( $image, $size );?> 
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
		<?php $button = get_sub_field('button');
		if($button):
			$link_url = $button['url'];
		    $link_title = $button['title'];
		    $link_target = $button['target'] ? $button['target'] : '_self';?>
			<div class="section__button text-center">
				<a class="btn primary-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
			</div>
		<?php endif;?>
	</div>
</section>