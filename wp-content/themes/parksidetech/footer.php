<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>

<footer class="site-footer section">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="footer-widget">
          <div class="footer-head">
            <p class="subhead">Let's make it happen</p>
            <span class="h3 lrg-h">Contact Us</span>
          </div>
          <div class="footer-content">
            <p>301 W Deer Valley Rd. Ste 2<br/>
              Phoenix, AZ 85027</p>

            <p>Office: (480) 757-8350<br/>
            Support: (480) 535-2209</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="footer-widget">
          <div class="footer-head">
            <p class="subhead">Chat with us</p>
            <span class="h3 lrg-h">Support</span>
          </div>
          <div class="footer-content">
            <ul class="footer-menu">
              <li><a href="<?php echo site_url();?>/">Login</a></li>
              <li><a href="<?php echo site_url();?>/">Live Chat</a></li>
              <li><a href="<?php echo site_url();?>/">Submit a ticket</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="footer-widget">
          <div class="footer-head">
            <p class="subhead">Follow Us</p>
            <span class="h3 lrg-h">Connect</span>
          </div>
          <div class="footer-content">
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
  </div><!-- .site-footer -->
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <p>&copy; <?php echo date('Y');?> All Rights Reserved. <a href="<?php echo site_url();?>/" rel="home"><?php the_field( 'business_name', 'option' ); ?></a>. </p>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="terms-menu">
            <ul class="footer-menu">
              <li><a href="<?php echo site_url();?>/">Terms of Use</a></li>
              <li><a href="<?php echo site_url();?>/">Privacy Policy</a></li>
              <li><a href="<?php echo site_url();?>/">Affiliates</a></li>
              <li><a href="<?php echo site_url();?>/">Partnerships</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center">
            
            <a href="https://www.elevativedigital.com/" rel="noreferrer" target="_blank" class="elevative">Built By Elevative Digital Marketing</a>

    </div>
  </div>
</footer>
    </div><!-- .site-content -->
<?php wp_footer(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/jquery.pagepiling.css" />
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/jquery.pagepiling.js"></script>
<script>

jQuery(document).ready(function($) {
  AOS.init({
    disable: true, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  });
  $('#pagepiling').pagepiling({
      menu: null,
        direction: 'vertical',
        verticalCentered: true,
        sectionsColor: [],
        anchors: [],
        scrollingSpeed: 700,
        easing: 'swing',
        loopBottom: false,
        loopTop: false,
        css3: true,
        navigation: {
            'textColor': '#fff',
            'bulletsColor': '#000',
            'position': 'right',
            'tooltips': false
        },
        normalScrollElements: null,
        normalScrollElementTouchThreshold: 5,
        touchSensitivity: 5,
        keyboardScrolling: true,
        sectionSelector: '.section',
        animateAnchor: false,

    //events
    onLeave: function(index, nextIndex, direction){},
    afterLoad: function(anchorLink, index){
      $('.header').addClass('sticky');
    },
    afterRender: function(){},
  });
  $('#home-services .row.justify-content-center').slick({
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow:"<button type='button' class='slick-prev pull-left'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve'><style type='text/css'>.st0{fill:#072539}</style><g> <g> <path class='st0' d='M3.1,263.5l160,160c2.1,2.1,4.8,3.1,7.5,3.1s5.5-1,7.5-3.1c4.2-4.2,4.2-10.9,0-15.1L36.4,266.7h464.9 c5.9,0,10.7-4.8,10.7-10.7s-4.8-10.7-10.7-10.7H36.4l141.8-141.8c4.2-4.2,4.2-10.9,0-15.1c-4.2-4.2-10.9-4.2-15.1,0l-160,160 C-1,252.6-1,259.4,3.1,263.5z'/> </g> </g> </svg></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve'><style type='text/css'>.st0{fill:#072539}</style><g> <g> <path class='st0' d='M508.9,248.5l-160-160c-4.2-4.2-10.9-4.2-15.1,0c-4.2,4.2-4.2,10.9,0,15.1l141.8,141.8H10.7 C4.8,245.3,0,250.1,0,256s4.8,10.7,10.7,10.7h464.9L333.8,408.5c-4.2,4.2-4.2,10.9,0,15.1c2.1,2.1,4.8,3.1,7.5,3.1s5.5-1,7.5-3.1 l160-160C513,259.4,513,252.6,508.9,248.5z'/> </g> </g> </svg></button>",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});
</script>
</body>
</html>
