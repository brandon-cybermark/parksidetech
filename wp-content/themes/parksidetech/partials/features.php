<?php 
$feature_type = get_sub_field('feature_type');
$content_block = get_sub_field('content_block');
$button = get_sub_field('button');
$button_class = get_sub_field('button_class');
$button_position = get_sub_field('button_position');
		$block_id = get_sub_field('block_id');?>


<section class="section <?php echo $feature_type;?> section__wrapper pp-scrollable" id="<?php echo $block_id;?>">
	<div class="content-wrapper">
		<div class="container h-100 align-items-center">
			<div class="row  h-100 align-items-center">
				<div class="<?php if($feature_type == 'feature_1'):?>col-md-6<?php else:?>col-md-12<?php endif;?>">
					<div class="section__container" data-aos="zoom-in-center" data-aos-delay="500" data-aos-easing="linear">
						<div class="section__content <?php if($feature_type == 'content_1'):?>text-center<?php endif;?>">
							<?php the_sub_field('content_block');?>
							<?php 
							if($button && $feature_type == 'feature_1'):
								$link_url = $button['url'];
							    $link_title = $button['title'];
							    $link_target = $button['target'] ? $button['target'] : '_self';?>
								<div class="section__button text-<?php echo $button_position;?>">
									<a class="btn <?php echo $button_class;?>-btn round-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
								</div>
							<?php endif;?>
						</div>
					</div>
				</div>
				<div class="<?php if($feature_type == 'feature_1'):?>col-md-6<?php else:?>col-md-12 mt-5<?php endif;?>">
					<?php
						if( have_rows('feature') ):?>
							<div class="row justify-content-center">
								<?php while( have_rows('feature') ) : the_row();
								$image = get_sub_field('image');
								$text = get_sub_field('text');?>

									<div class="<?php if($feature_type == 'feature_1'):?>col-md-6<?php else:?>col-md-4<?php endif;?>" data-aos="zoom-in-center" data-aos-delay="500" data-aos-easing="linear">
										<div class="column">
											<div class="column-text">
												<?php if($image):?>
												<div class="column-img">
													<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
												</div>
												<?php endif;?>
												<?php echo $text;?>
											</div>
										</div>
									</div>
									<?php endwhile;?>
							</div>
						<?php endif;?>
				</div>
			</div>
				<?php 
					if($button && $feature_type != 'feature_1'):
						$link_url = $button['url'];
					    $link_title = $button['title'];
					    $link_target = $button['target'] ? $button['target'] : '_self';?>
					    <div class="text-center">
							<div class="section__button text-<?php echo $button_position;?>">
								<a class="btn <?php echo $button_class;?>-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
							</div>
						</div>
					<?php endif;?>
		</div>
	</div>
</section>