<section class="content_3 section__wrapper">
	<span class="h6 section__title">Content 3</span>
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-md-6">
				<div class="section__container">
					<div class="section__content">
						<?php the_sub_field('content_block');?>
						<?php $button = get_sub_field('button');
						if($button):
							$link_url = $button['url'];
						    $link_title = $button['title'];
						    $link_target = $button['target'] ? $button['target'] : '_self';?>
							<div class="section__button ">
								<a class="btn primary-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="section__img">
					<div class="section_img_wrapper">
						<?php $image = get_sub_field('image');?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>