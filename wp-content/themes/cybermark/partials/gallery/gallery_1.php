<section class="gallery_1 section__wrapper">
	<span class="h6 section__title">Gallery 1</span>
	<div class="container">
		<div class="section__heading text-center">
			<?php the_sub_field('content_block');?>
		</div>
		<?php
		if( have_rows('gallery_column') ):?>

		<div class="section__container columns feature_columns">
			<div class="row justify-content-center">
				<?php while( have_rows('gallery_column') ) : the_row();
					$image = get_sub_field('image');
					$text = get_sub_field('text');?>
				<div class="col-md-4">
					<div class="column gallery_1_column text-center">
						<?php if($image):?>
						<div class="column-img">
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
		<?php endif;?>
	</div>
</section>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fancybox").fancybox();
});
</script>