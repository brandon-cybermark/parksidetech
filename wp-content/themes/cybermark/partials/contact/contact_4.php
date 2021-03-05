<section class="contact_4 section__wrapper">
	<span class="h6 section__title">Contact 4</span>
	<div class="container">
		<div class="section__heading text-center">
			<?php the_sub_field('contact_block');?>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="contact_3_form section__form">
					<div class="section__form_wrapper">
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49" ]');?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>