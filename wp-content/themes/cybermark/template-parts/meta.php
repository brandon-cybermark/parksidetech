<?php if (!get_field('seo_title')) : ?>
	<title><?php the_title(''); ?> | <?php bloginfo( 'name' ); ?></title>	
<?php else:?>
	<title><?php echo do_shortcode(get_field('seo_title')); ?></title>
<?php endif;?>
<?php if (! get_field('seo_description')) : ?>
	<meta name="description" content="<?php bloginfo( 'name' ); ?>" />
<?php else:?>
	<meta name="description" content="<?php echo do_shortcode(get_field('seo_description')); ?>" />
<?php endif;?>
<?php if(get_field('profile_id', 'option')):?><script src="//scripts.iconnode.com/<?php the_field('profile_id', 'option');?>.js"></script><?php endif;?>
<?php if(get_field('header_scripts')):?><?php the_field('header_scripts');?><?php endif;?>