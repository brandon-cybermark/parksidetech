<section class="gallery_2 section__wrapper">
	<span class="h6 section__title">Gallery 2</span>
	<div class="container">
		<div class="section__heading text-center">
			<?php the_sub_field('content_block');?>
		</div>
		<div class="section__container columns gallery_columns">
			<div class="row justify-content-center">
				<?php $images = get_sub_field('gallery_items');
				foreach( $images as $image_id ): ?>
				<div class="col-md-4">
					<div class="column gallery_2_column text-center">
						<div class="column-img">
							<a href="<?php echo wp_get_attachment_url($image_id); ?>" class="fancybox" rel="gallery2">

								<?php 
								$size = 'large';
								echo wp_get_attachment_image( $image_id, $size );?>
							</a>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fancybox").fancybox();
});
</script>