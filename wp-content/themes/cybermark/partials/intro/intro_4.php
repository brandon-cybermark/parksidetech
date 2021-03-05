<?php $banner = get_sub_field('image');?>
<section class="intro_4 section__wrapper">
	<span class="h6 section__title">Intro 4</span>
	<div class="intro_4_hero" <?php if($banner):?>style="background-image: url('<?php echo $banner;?>');"<?php endif;?>>
		<div class="container">
			<div class="intro_4_inner section__container text-center">
				<div class="section__content">
					<?php the_sub_field('content_block');?>
				</div>
			</div>
		</div>
	</div>
</section>