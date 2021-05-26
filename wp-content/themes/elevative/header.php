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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head();?> 
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
		<?php $header = get_field('header_type','option');
			if($header == 'header_1'){
				get_template_part('template-parts/header/header-1');
			}
			elseif($header == 'header_2'){
				get_template_part('template-parts/header/header-2');
			}
			elseif($header == 'header_3'){
				get_template_part('template-parts/header/header-3');
			}
			elseif($header == 'header_4'){
				get_template_part('template-parts/header/header-4');
			}?>
		<div id="content" class="main-content">
