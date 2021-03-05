<section class="contact_3 section__wrapper">
	<span class="h6 section__title">Contact 3</span>
	<div class="container">
		<div class="section__heading text-center">
			<?php the_sub_field('contact_block');?>
		</div>
		<div class="row align-items-center flex-row-reverse">
			<div class="col-md-6">
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
			</div>
			<div class="col-md-6">
				<div class="contact_3_form section__form">
					<div class="section__form_wrapper">
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49" ]');?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>