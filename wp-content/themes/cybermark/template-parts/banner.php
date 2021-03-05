<?php $banner = get_field('banner_image');
$heading1 = get_field('heading_1');
$heading2 = get_field('heading_2');?>
<section class="page__banner" <?php if($banner):?>style="background-image: url('<?php echo $banner;?>');"<?php endif;?>>
	<div class="container">
		<div class="page__banner-inner">
			<?php if($heading1):?>
				<h1><?php echo $heading1;?></h1>
			<?php endif;
			if($heading2):?>
				<h2><?php echo $heading2;?></h2>
			<?php endif;?>
		</div>
	</div>
</section>