<?php $header = get_field('header_type','option');?>
<header class="header" id="<?php echo $header;?>">
	<div class="top__bar">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-6">
					<?php $phone_number = get_field('phone_number', 'option');
							if( $phone_number ): ?>
					<div class="top__phone">
						<a href="tel://<?php the_field('phone_number','option');?>" >
							<?php the_field('phone_number','option');?>
						</a>
					</div>
				<?php endif;?>
				</div>
				<div class="col-md-6 text-right">
					<div class="top__bar-social">
			          <ul class="social-list">
			            <?php if(get_field('facebook_url', 'option')):?>
			              <li><a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank" title="Facebook"><span class="fab fa-facebook-f"></span></a></li>
			            <?php endif;
			            if(get_field('twitter_url', 'option')):?>
			              <li><a href="<?php the_field('twitter_url', 'option'); ?>" target="_blank" title="Twitter"><span class="fab fa-twitter"></span></a></li>
			            <?php endif;
			            if(get_field('linkedin_url', 'option')):?>
			              <li><a href="<?php the_field('linkedin_url', 'option'); ?>" target="_blank" title="LinkedIn"><span class="fab fa-linkedin"></span></a></li>
			            <?php endif;
			            if(get_field('instagram_url', 'option')):?>
			              <li><a href="<?php the_field('instagram_url', 'option'); ?>" target="_blank" title="Instagram"><span class="fab fa-instagram"></span></a></li>
			            <?php endif;
			            if(get_field('youtube_url', 'option')):?>
			              <li><a href="<?php the_field('youtube_url', 'option'); ?>" target="_blank" title="You Tube"><span class="fab fa-youtube"></span></a></li>
			            <?php endif;
			            if(get_field('yelp_url', 'option')):?>
			              <li><a href="<?php the_field('yelp_url', 'option'); ?>" target="_blank" title="Yelp"><span class="fab fa-yelp"></span></a></li>
			            <?php endif;
			            if(get_field('pinterest_url', 'option')):?>
			              <li><a href="<?php the_field('pinterest_url', 'option'); ?>" target="_blank" title="Pinterest"><span class="fab fa-pinterest"></span></a></li>
			            <?php endif;?>
			            
			          </ul>
			        </div>
				</div>
			</div>
		</div>
	</div>
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
					</div>
				</div><!-- .site-header-menu -->
					<div class="mobile-menu" style="display: block; width: 100px">
						<a href="#search" class="toggle-search-box"><span class="fas fa-search"></span></a>
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
		</div><!-- .site-header-main -->
	</div>
</header><!-- .header -->
<div id="ult-fs-search">
        <button type="button" class="close">×</button>
        <form role="search" class="form-search" method="get" id="searchform" action="<?php echo home_url( '/' );?>" >
            <input type="text" value="" name="s" placeholder="Type Your Keywords Here" />
            <button type="submit" class="btn primary-btn clear-btn">Search</button>
        </form>
    </div>