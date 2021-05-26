<?php
/**
 * Template Name: Home Page
 *
 */
$button = get_field('button');
$button_class = get_field('button_class');
$button_position = get_field('button_position');
?>
<?php get_header(); ?>
<div class="main-banner">
	<div class="main-banner__wrapper">
		<div class="main-banner__inner-wrapper">
			
			<div class="main-banner_content">
				<div class="container">
				<div class="col">
                          		<div class="heading-block tal">
                                	<span class="h h4"><?php the_field('heading_text');?></span>
                            	</div>
                            	<?php 
									if($button):
										$link_url = $button['url'];
									    $link_title = $button['title'];
									    $link_target = $button['target'] ? $button['target'] : '_self';?>
										<div class="section__button text-<?php echo $button_position;?>">
											<a class="btn <?php echo $button_class;?>-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
										</div>
									<?php endif;?>
              				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="wrap mt-5">
	<?php
	if (have_rows('page_builder')) :
	while (have_rows('page_builder')) :
		$label = get_field_object('page_builder');
		the_row();
		switch (get_row_layout()) {
			case 'intro_section':
				get_template_part('partials/intro');
				break;
			case 'content_section':
				get_template_part('partials/content');
				break;
			case 'gallery_section':
				get_template_part('partials/gallery');
				break;
			case 'features_section':
				get_template_part('partials/features');
				break;
			case 'team_section':
				get_template_part('partials/team');
				break;
			case 'pricing_section':
				get_template_part('partials/pricing');
				break;
			case 'testimonial_section':
				get_template_part('partials/testimonial');
				break;
			case 'contact_section':
				get_template_part('partials/contact');
				break;
			case 'blog_section':
				get_template_part('partials/blog');
				break;
			case 'pricing_tables':
				get_template_part('partials/pricing');
				break;
			case 'faq_section':
				get_template_part('partials/faq');
				break;
		} //end switch
	endwhile;
endif;
?>

</div><!-- .wrap -->
<?php get_footer(); ?>