<section class="features_4 section__wrapper">
	<span class="h6 section__title">Features 4</span>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="section__container">
					<div class="section__content">
						<?php the_sub_field('content_block');?>
						<?php $button = get_sub_field('button');
						if($button):
							$link_url = $button['url'];
						    $link_title = $button['title'];
						    $link_target = $button['target'] ? $button['target'] : '_self';?>
							<div class="section__button">
								<a class="btn primary-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row justify-content-center">
					<?php
					if( have_rows('feature') ):
					while( have_rows('feature') ) : the_row();
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
						<?php endwhile;
					endif;?>

				</div>
			</div>
		</div>
	</div>
</section>