<?php 
$content_type = get_sub_field('content_type');
$content_block = get_sub_field('content_block');
$content_image = get_sub_field('content_image');
$content_position = get_sub_field('content_position');
$form_shortcode = get_sub_field('form_shortcode');
$button = get_sub_field('button');
$button_class = get_sub_field('button_class');

$button_2 = get_sub_field('button_2');
$button_class_2 = get_sub_field('button_class_2');

$block_id = get_sub_field('block_id');?>


<section class="section <?php echo $content_type;?> section__wrapper pp-scrollable" id="<?php echo $block_id;?>">
	<div class="content-wrapper h-100">
		<div class="container h-100 align-items-center">
			<div class="row <?php if($content_position == 'right'):?>flex-row-reverse<?php endif;?> h-100 align-items-center">
				<div class="<?php if($content_type == 'content_1'):?>col-md-12<?php else:?>col-md-6<?php endif;?>">
					<div class="section__container" data-aos="zoom-in-<?php if($content_position == 'right'):?>left<?php elseif($content_position == 'left'):?>right<?php else:?>center<?php endif;?>" data-aos-delay="500" data-aos-easing="linear">
						<div class="section__content">
							<?php the_sub_field('content_block');?>
								<div class="section__button ">
									<?php if($button):
										$link_url = $button['url'];
										$link_title = $button['title'];
										$link_target = $button['target'] ? $button['target'] : '_self';?>
									<a class="btn <?php echo $button_class;?>-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif;?>	
									<?php if($button_2):
										$link_url_2 = $button_2['url'];
										$link_title_2 = $button_2['title'];
										$link_target_2 = $button_2['target'] ? $button_2['target'] : '_self';?>
									<a class="btn <?php echo $button_class_2;?>-btn" href="<?php echo esc_url( $link_url_2 ); ?>" target="<?php echo esc_attr( $link_target_2 ); ?>"><?php echo esc_html( $link_title_2 ); ?></a>
									<?php endif;?>			
								</div>
						</div>
					</div>
				</div>
				<?php if($content_type != 'content_1'):?>
				<div class="col-md-6 mt-5 mt-md-0">
					<div class="section__img">
						<div class="section_img_wrapper">
							<?php $image = get_sub_field('image');
							$size = 'full';
							if($image){
								echo wp_get_attachment_image( $image, $size );
							};?>
						</div>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>