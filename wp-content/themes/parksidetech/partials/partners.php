<?php  
$content_block = get_sub_field('content_block');
		$block_id = get_sub_field('block_id');?>


<section class="section  section__wrapper background" id="<?php echo $block_id;?>">
	<div class="content-wrapper">
		<div class="container">
			<?php if($content_block):?>
			<div class="section__heading text-center">
				<?php echo $content_block;?>
			</div>
			<?php endif;?>

			<?php 
			$partner_logos = get_field('partner_logos', 'option');
			if( $partner_logos ): ?>
			<div class="row">
				<div class="col-md-8">
					<div class="partner__gallery">
						    <ul>
						        <?php foreach( $partner_logos as $image ): ?>
						            <li>
						               <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						            </li>
						        <?php endforeach; ?>
						    </ul>

					</div>
				</div>
			</div>
						<?php endif; ?>
		</div>
	</div>
</section>
