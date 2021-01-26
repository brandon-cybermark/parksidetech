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
<header class="header">
	<div class="container-fluid">
		<div class="site-header-main">
			<div class="site-branding">
				<div class="main-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php 
							$business_logo = get_field('business_logo', 'option');
							if( !empty( $business_logo ) ): ?>
			              <img src="<?php echo esc_url($business_logo['url']); ?>" alt="<?php echo esc_attr($business_logo['alt']); ?>" />
			            <?php else:?>
			              <h1><?php the_field('business_name', 'option'); ?></h1>
			            <?php endif;?>
					</a>
				</div>
			</div><!-- .site-branding -->

				<div id="site-header-menu" class="site-header-menu">
					<div class="menu-wrapper">
						<nav id="site-navigation" class="main-navigation" >
							<?php wp_nav_menu( array(
							    'theme_location' => 'main-nav',
								'menu_class' => 'primary-menu',
							    'menu_id' => 'menu-main-menu',
							    'container_class' => 'primary-menu'
							    )
								);
							?>
						</nav>
						<div class="location-button">
							<a href="<?php echo site_url();?>/contact-us/" class="btn loc-btn">
								Button
							</a>
						</div>
					</div>
					<div class="mobile-menu">
						<div class="menubars">
						  <div class="menubar top"></div>
						  <div class="menubar middle"></div>
						  <div class="menubar bottom"></div>
						</div>
						<div class="menubackground">
						</div>
						<?php wp_nav_menu( array(
						    'theme_location' => 'main-nav',
						    'items_wrap'      => '<ul class="menulinks" style="visibility: hidden;">%3$s</ul>',
						    'container_class' => 'mobile-nav-menu' ) );
						?>
					</div>
				</div><!-- .site-header-menu -->
		</div><!-- .site-header-main -->
	</div>
</header><!-- .header -->

		<div id="content" class="main-content">
