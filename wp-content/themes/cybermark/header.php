<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */

?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<?php if(get_field('google_tag_manager_head', 'option')):?><?php the_field('google_tag_manager_head', 'option');?><?php endif;?>
	<?php if(get_field('header_scripts', 'option')):?><?php the_field('header_scripts', 'option');?><?php endif;?>
	<?php if(get_field('profile_id', 'option')):?><script src="//scripts.iconnode.com/<?php the_field('profile_id', 'option');?>.js"></script><?php endif;?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(get_field('google_tag_manager_body', 'option')):?><?php the_field('google_tag_manager_body', 'option');?><?php endif;?>
<?php $header = get_field('header_type','option');
	if($header == 'header_1'){
		get_template_part('template-parts/header/header-1');
	}
	elseif($header == 'header_2'){
		get_template_part('template-parts/header/header-2');
	}
	if($header == 'header_3'){
		get_template_part('template-parts/header/header-3');
	}
	if($header == 'header_4'){
		get_template_part('template-parts/header/header-4');
	}
?>
		<div id="content" class="main-content">
