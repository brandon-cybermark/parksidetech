<?php
/**
 * Template Name: Home Page
 *
 */
$button = get_field('button');
$button_class = get_field('button_class');
$button_position = get_field('button_position');
$heading_text = get_field('heading_text');
$subheading_text = get_field('subheading_text');
?>
<?php get_header(); ?>
<div class="main-banner background">
	<div class="content-wrapper">
		<div class="container">
	  		<div class="heading-block tal">
	        	<span class="h h1 d-block"><?php echo do_shortcode($heading_text);?></span>
	        	<div class="row">
	        		<div class="col-md-6 offset-md-3">
	        			<span class="h h3 d-block"><?php echo do_shortcode($subheading_text);?></span>
	        		</div>
	        	</div>
	    	</div>
	    	<?php 
				if($button):
					$link_url = $button['url'];
				    $link_title = $button['title'];
				    $link_target = $button['target'] ? $button['target'] : '_self';?>
					<div class="section__button text-<?php echo $button_position;?>">
						<a class="btn <?php echo $button_class;?>-btn round-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>				
					</div>
				<?php endif;?>
			</div>
	</div>
</div>
<div id="fullpage">
	<?php
	if (have_rows('home_page_builder')) :
	while (have_rows('home_page_builder')) :
		$label = get_field_object('home_page_builder');
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
			case 'partner_section':
				get_template_part('partials/partners');
				break;
		} //end switch
	endwhile;
endif;
?>
</div>

<?php get_footer(); ?>