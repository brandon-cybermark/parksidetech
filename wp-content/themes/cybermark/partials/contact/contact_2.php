<section class="contact_2 section__wrapper">
	<span class="h6 section__title">Contact 2</span>
	<div class="container">
		<div class="section__heading text-center">
			<?php the_sub_field('contact_block');?>
		</div>
		<div class="row align-items-center flex-row-reverse">
			<div class="col-md-6">
				<div class="contact__iframe map-responsive">
					<?php the_sub_field('map_embed_code');?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contact_2_form section__form">
					<div class="section__form_wrapper">
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49" ]');?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>