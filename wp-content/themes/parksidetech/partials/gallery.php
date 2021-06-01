<?php 
$gallery_type = get_sub_field('gallery_type');
$content_block = get_sub_field('content_block');
$gallery_column = get_sub_field('gallery_column');
$gallery_items = get_sub_field('gallery_items');
$button = get_sub_field('button');
$button_class = get_sub_field('button_class');
$button_position = get_sub_field('button_position');
		$block_id = get_sub_field('block_id');?>

<section class="<?php echo $gallery_type;?> section__wrapper section" id="<?php echo $block_id;?>" style="background-color: #FFF">
	<div class="container">
		<div class="section__container">
			<div class="section__content">
				<?php the_sub_field('content_block');?>
			</div>
		</div>
		<?php if($gallery_type == 'gallery_1'):
			if( have_rows('gallery_column') ):?>
			<div class="section__container columns gallery_columns mt-5">
				<div class="row justify-content-center">
					<?php while( have_rows('gallery_column') ) : the_row();
						$image = get_sub_field('image');
						$text = get_sub_field('text');?>
					<div class="col-md-4">
						<div class="column gallery_1_column text-center">
							<?php if($image):?>
							<div class="column-img gallery_img">
								<a href="<?php echo wp_get_attachment_url($image); ?>" class="fancybox" rel="gallery1">

									<?php 
									$size = 'large';
									echo wp_get_attachment_image( $image, $size );?>
								</a>
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
		<?php endif; 
		elseif($gallery_type == 'gallery_2'):?>
			<div class="gallery__slider mt-5">
				<?php 
				foreach( $gallery_items as $gallery_slide ): ?>
				<div class="gallery__item ml-1 mr-1">
					<div class="column <?php echo $gallery_type;?>_column mb-0">
						<div class="column-img mb-0 gallery_img">
							<a href="<?php echo wp_get_attachment_url($gallery_slide); ?>" class="fancybox" rel="<?php echo $gallery_type;?>">
								<img src="<?php echo esc_url($gallery_slide['url']); ?>" alt="<?php echo esc_attr($gallery_slide['alt']); ?>" />
							</a>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".fancybox img").fancybox();
					$('.gallery__slider').slick({
				  slidesToShow: 4,
				  slidesToScroll: 1,
				  autoplay: true,
				  autoplaySpeed: 5000,
				  arrows: true,
				  dots: false,
				  infinite: false,
				  prevArrow:"<button type='button' class='slick-prev pull-left'><svg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve'><g><g><path d='M123.6,270.1l236.8,236.2c7.8,7.7,20.3,7.7,28.1,0c7.7-7.8,7.7-20.3,0-28.1L165.7,256L388.4,33.9c7.8-7.7,7.8-20.3,0-28.1c-3.9-3.9-9-5.8-14.1-5.8c-5.1,0-10.1,1.9-14,5.8L123.6,242c-3.7,3.7-5.8,8.8-5.8,14.1C117.7,261.3,119.8,266.3,123.6,270.1z'/></g></g></svg></button>",
				  nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 512.002 512.002' style='enable-background:new 0 0 512.002 512.002;' xml:space='preserve'> <g> <g> <path d='M388.425,241.951L151.609,5.79c-7.759-7.733-20.321-7.72-28.067,0.04c-7.74,7.759-7.72,20.328,0.04,28.067l222.72,222.105 L123.574,478.106c-7.759,7.74-7.779,20.301-0.04,28.061c3.883,3.89,8.97,5.835,14.057,5.835c5.074,0,10.141-1.932,14.017-5.795 l236.817-236.155c3.737-3.718,5.834-8.778,5.834-14.05S392.156,245.676,388.425,241.951z'/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></button>",
				  responsive: [
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 1,
				      }
				    },
				    {
				      breakpoint: 480,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
				      }
				    }
				  ]
				    });
				});
				</script>
		<?php 
		elseif($gallery_type == 'gallery_3'):?>
			<div class="section__container columns gallery_columns mt-5">
				<div class="row justify-content-center">
					<?php 
					foreach( $gallery_items as $image_id ): ?>
					<div class="col-md-4 mb-3">
						<div class="column <?php echo $gallery_type;?>_column text-center">
							<div class="column-img gallery_img">
								<a href="<?php echo wp_get_attachment_url($image_id); ?>" class="fancybox" rel="<?php echo $gallery_type;?>">
										<img src="<?php echo esc_url($image_id['url']); ?>" alt="<?php echo esc_attr($image_id['alt']); ?>" />
								</a>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		<?php endif;?>
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
</section>