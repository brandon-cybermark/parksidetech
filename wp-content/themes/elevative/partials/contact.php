<?php 
$contact_type = get_sub_field('contact_type');
$content_block = get_sub_field('contact_block');
$map_embed_code = get_sub_field('map_embed_code');
$contact_form_shortcode = get_sub_field('contact_form_shortcode');
		$block_id = get_sub_field('block_id');
?>
<section class="<?php echo $contact_type;?> section__wrapper" id="<?php echo $block_id;?>">
	<div class="container">
		<?php if($contact_type != 'contact_1'):?>
		<div class="row mb-3">
			<div class="col-12">
				<div class="section__container">
					<div class="section__content">
						<?php echo $content_block;?>
					</div>
				</div>
			</div>
		</div>
		<?php endif;?>
		<div class="row flex-row-reverse">
			<?php if($contact_type != 'contact_4'):?>
			<div class="col-md-6">
				<?php if($contact_type == 'contact_3'):?>
				<div class="contact__details">
					<?php 
					$address = get_field('address','option');
					$city = get_field('city','option');
					$state = get_field('state','option');
					$zip_code = get_field('zip_code','option');
					$phone_number = get_field('phone_number','option');?>
					<span class="h3 d-block">Address</span>
					<span class="details d-block"><?php echo $address;?><br/><?php echo $city;?>, <?php echo $state;?>. <?php echo $zip_code;?></span>
					<span class="mt-3 h3 d-block">Phone</span>
					<span class="details d-block"><?php echo $phone_number;?></span>
				</div>
				<?php elseif($contact_type == 'contact_2' || $contact_type == 'contact_1'):?>
				<div class="contact__iframe map-responsive">
					<?php echo $map_embed_code;?>
				</div>
				<?php endif;?>
			</div>
			<?php endif;?>
			<div class="<?php if($contact_type == 'contact_4'):?>col-12 <?php else:?>col-md-6<?php endif;?>">
				<div class="section__container">
					<?php if($contact_type == 'contact_1'):?>
						<div class="section__content">
							<?php echo $content_block;?>
						</div>
					<?php endif;?>
					<div class="<?php echo $contact_type;?>_form section__form">
						<div class="section__form_wrapper">
							<?php echo do_shortcode(''.$contact_form_shortcode.'');?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>