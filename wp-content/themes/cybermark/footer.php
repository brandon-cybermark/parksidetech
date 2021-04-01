<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>

		</div><!-- .site-content -->
<?php $footer = get_field('footer_type','option');
  if($footer == 'footer_1'){
    get_template_part('template-parts/footer/footer-1');
  }
  elseif($footer == 'footer_2'){
    get_template_part('template-parts/footer/footer-2');
  }
  elseif($footer == 'footer_3'){
    get_template_part('template-parts/footer/footer-3');
  }
?>

<?php wp_footer(); ?>
</body>
</html>
