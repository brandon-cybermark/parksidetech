<?php 
$intro_type = get_sub_field('intro_type');
$content_block = get_sub_field('content_block');
$content_position = get_sub_field('content_position');
$form_shortcode = get_sub_field('form_shortcode');
$background_image = get_sub_field('background_image');
$video_embed_url = get_sub_field('video_embed_url');
$button = get_sub_field('button');
$button_class = get_sub_field('button_class');
$button_position = get_sub_field('button_position');
		$block_id = get_sub_field('block_id');?>

<section class="mb-5 <?php echo $intro_type;?> section__wrapper" <?php if($intro_type == 'intro_3'):?>style="background-image: url(<?php echo $background_image;?>);"<?php endif;?> id="<?php echo $block_id;?>">
	<div class="container">
		<div class="row <?php if($content_position == 'right'):?>flex-row-reverse<?php endif;?>">
			<?php if($intro_type != 'intro_3'):?>
				<div class="<?php if($intro_type == 'intro_1' || $intro_type == 'intro_2'):?>col-md-6<?php else:?>col-md-12<?php endif;?>">
					<div class="section__container">
						<div class="section__content">
							<?php echo $content_block?>
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
			<?php endif;?>
			<?php if($intro_type == 'intro_2'):?>
				<div class="col-md-6">
					<div class="<?php echo $intro_type;?>_form section__form">
						<div class="section__form_wrapper">
							<?php echo do_shortcode($form_shortcode);?>
						</div>
					</div>
				</div>
			<?php endif;?>
			<?php if($intro_type == 'intro_3' && $video_embed_url):?>
				<div class="col-md-12">
					<div class="<?php echo $intro_type;?>-btn">
						<?php echo $content_block?>
						<div class="section__button text-<?php echo $button_position;?> play-btn-wrap">
							<a class="btn play-btn fancybox-media" href="<?php echo $video_embed_url; ?>" >
								<span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g> <g> <path d="M256,0C114.833,0,0,114.844,0,256s114.833,256,256,256s256-114.844,256-256S397.167,0,256,0z M256,490.667 C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333S490.667,126.604,490.667,256S385.396,490.667,256,490.667 z"/> <path d="M357.771,247.031l-149.333-96c-3.271-2.135-7.5-2.25-10.875-0.396C194.125,152.51,192,156.094,192,160v192 c0,3.906,2.125,7.49,5.563,9.365c1.583,0.865,3.354,1.302,5.104,1.302c2,0,4.021-0.563,5.771-1.698l149.333-96 c3.042-1.958,4.896-5.344,4.896-8.969S360.813,248.99,357.771,247.031z M213.333,332.458V179.542L332.271,256L213.333,332.458z" /> </g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></span>
							</a>				
						</div>
					</div>
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$('.fancybox-media').fancybox({
							openEffect  : 'fade',
							closeEffect : 'fade',
							helpers : {
								media : {}
							}
						});
					});
				</script>
			<?php endif;?>
		</div>
	</div>
</section>