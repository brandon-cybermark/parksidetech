<?php 
$content_type = get_sub_field('content_type');
$content_block = get_sub_field('content_block');
$content_image = get_sub_field('content_image');
$content_position = get_sub_field('content_position');
$form_shortcode = get_sub_field('form_shortcode');
$button = get_sub_field('button');
$button_class = get_sub_field('button_class');
$button_position = get_sub_field('button_position');
		$block_id = get_sub_field('block_id');?>


<section class="<?php echo $content_type;?> section__wrapper" id="<?php echo $block_id;?>">
	<div class="container">
		<div class="row <?php if($content_position == 'right'):?>flex-row-reverse<?php endif;?>">
			<div class="<?php if($content_type == 'content_1'):?>col-md-12<?php else:?>col-md-6<?php endif;?>">
				<div class="section__container" data-aos="zoom-in-<?php if($content_position == 'right'):?>left<?php elseif($content_position == 'left'):?>right<?php else:?>center<?php endif;?>" data-aos-delay="500" data-aos-easing="linear">
					<div class="section__content <?php if($content_type == 'content_1'):?>text-center<?php endif;?>">
						<?php the_sub_field('content_block');?>
						<?php 
						if($button):
							$link_url = $button['url'];
						    $link_title = $button['title'];
						    $link_target = $button['target'] ? $button['target'] : '_self';?>
							<div class="section__button text-<?php echo $button_position;?>">
								<a class="btn <?php echo $button_class;?>-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<?php if($content_type != 'content_1'):?>
			<div class="col-md-6 mt-5 mt-md-0">
				<div class="section__img">
					<div class="section_img_wrapper">
						<?php $image = get_sub_field('image');
						$size = 'full';
						echo wp_get_attachment_image( $image, $size );?> 
					</div>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>