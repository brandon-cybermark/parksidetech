<?php $footer = get_field('footer_type','option');?>
<footer class="site-footer" id="<?php echo $footer;?>">
  <div class="container-fluid">
    <div class="footer__3-wrapper">
        <div class="footer-branding">
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
        <nav class="footer-navigation">
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'footer',
                'menu_class'     => 'primary-menu',
              )
            );
          ?>
        </nav><!-- .main-navigation -->
        <div class="footer-social">
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
	</div><!-- .site-footer -->
<div class="copyright">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-9">
          <p>&copy; <?php echo date('Y');?> All Rights Reserved. <a href="<?php echo site_url();?>/" rel="home"><?php the_field( 'business_name', 'option' ); ?></a>. </p>
      </div>
      <div class="col-md-3">
          <a href="https://www.cybermark.com/" rel="noreferrer" target="_blank" class="cybermark">Built By CyberMark</a>
      </div>
    </div>
  </div>
</div>
</footer>