<?php  
$content_block = get_sub_field('content_block');
		$block_id = get_sub_field('block_id');?>


<section class="section  section__wrapper partners__section" id="<?php echo $block_id;?>">
	<div class="content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="section__content ">
						<?php if($content_block){
							echo $content_block;
						}
						else {
							echo '<h2>Our Partners</h2>';
							echo '<p>Building and earning trust as a managed IT solutions provider means partnering with companies that offer “best-in-class” products and services.</p>';
						}?>
					</div>
				</div>
			</div>
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
