<?php 
$banner = get_field('banner_image');
$heading1 = get_field('heading_1');
$heading2 = get_field('heading_2');?>
<section class="section page__banner mb-5" <?php if($banner):?>style="background-image: url('<?php echo $banner;?>');"<?php endif;?>>
	<div class="container">
		<div class="page__banner-inner">
			<?php if($heading1):?>
				<h1><?php echo $heading1;?></h1>
			<?php endif;
			if($heading2):?>
				<h2><?php echo $heading2;?></h2>
			<?php endif;?>
			<div class="section__button">
						<a class="btn primary-btn round-btn" href="<?php echo site_url();?>/offer/free-it-assessment/" target="_self"><span>Free IT Assessment</span></a>				
					</div>
		</div>
	</div>
</section>