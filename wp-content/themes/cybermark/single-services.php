<?php

get_header(); ?>

<div class="wrap">
	<?php
	get_template_part('template-parts/banner');
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
		} //end switch
	endwhile;
endif;?>

</div><!-- .wrap -->

<?php
get_footer();
