<?php $header = get_field('header_type','option');?>
<header class="header" id="<?php echo $header;?>">
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
						<div class="header-button">
							<a href="<?php echo site_url();?>/contact-us/" class="btn primary-btn">
								<?php the_field('header_btn_text','option');?>
							</a>
							<a href="tel://<?php the_field('phone_number','option');?>" class="btn primary-btn clear-btn">
								<?php the_field('phone_number','option');?>
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