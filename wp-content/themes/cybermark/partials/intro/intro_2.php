<section class="intro_2 section__wrapper">
	<span class="h6 section__title">Intro 2</span>
	<div class="container">
		<div class="row align-items-center flex-row-reverse">
			<div class="col-md-6">
				<div class="intro_2_form section__form">
					<div class="section__form_wrapper">
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49" ]');?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="section__container">
					<div class="section__content">
						<?php the_sub_field('content_block');?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>