<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>

		</div><!-- .site-content -->


<?php wp_footer(); ?>
<script type="text/javascript">

jQuery(document).ready(function($) {
$('.menubars').on('click', function(){
    if($('.mobile-menu').hasClass('active')) {
      closeMenu();
    } else {
      openMenu();
    }
   });
  
  function openMenu() {
    $('.mobile-menu').toggleClass('active');
    $('.menubackground').css('right', '0');
    $('.menubackground').css('top', '-810px');
    $('.top').css('top', '10px');
    $('.bottom').css('top', '10px');
    $('.mobile-menu ul').css('visibility','visible');
    $('.top').css('transform', 'rotate(45deg)');
    $('.bottom').css('transform', 'rotate(-45deg)');
    $('.middle').css('transform', 'rotate(45deg)');
  }
  
  function closeMenu() {
      $('.mobile-menu').toggleClass('active');
      $('.mobile-menu ul').css('visibility','hidden');
      $('.top').css('top', '0px');
      $('.bottom').css('top', '20px');
      $('.top').css('transform', 'rotate(0deg)');
      $('.middle').css('transform', 'rotate(0deg)');
      $('.bottom').css('transform', 'rotate(0deg)');
      $('.menubackground').css('right', '-2240px');
      $('.menubackground').css('top', '-2240px');
  }
$(window).scroll(function() {
      if ($(this).scrollTop() > 1){
      $('.header').addClass('sticky');
      }
      else{
      $('.header').removeClass('sticky');
      }

});
});
</script>
<?php if(get_field('footer_scripts')):?><?php the_field('footer_scripts');?><?php endif;?>
<?php if(get_field('footer_scripts', 'option')):?><?php the_field('footer_scripts', 'option');?><?php endif;?>
</body>
</html>
