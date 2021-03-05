<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage CyberMark
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php
	get_template_part('template-parts/banner');
if (have_rows('page_builder')) :
	while (have_rows('page_builder')) :
		$label = get_field_object('page_builder');
		the_row();
		switch (get_row_layout()) {
			case 'intro_1':
				get_template_part('partials/intro/intro_1');
				break;
			case 'intro_2':
				get_template_part('partials/intro/intro_2');
				break;
			case 'intro_3':
				get_template_part('partials/intro/intro_3');
				break;
			case 'intro_4':
				get_template_part('partials/intro/intro_4');
				break;
			case 'intro_5':
				get_template_part('partials/intro/intro_5');
				break;
			case 'content_1':
				get_template_part('partials/content/content_1');
				break;
			case 'content_2':
				get_template_part('partials/content/content_2');
				break;
			case 'content_3':
				get_template_part('partials/content/content_3');
				break;
			case 'gallery_1':
				get_template_part('partials/gallery/gallery_1');
				break;
			case 'gallery_2':
				get_template_part('partials/gallery/gallery_2');
				break;
			case 'gallery_3':
				get_template_part('partials/gallery/gallery_3');
				break;
			case 'features_1':
				get_template_part('partials/features/features_1');
				break;
			case 'features_2':
				get_template_part('partials/features/features_2');
				break;
			case 'features_3':
				get_template_part('partials/features/features_3');
				break;
			case 'features_4':
				get_template_part('partials/features/features_4');
				break;
			case 'team_1':
				get_template_part('partials/team/team_1');
				break;
			case 'team_2':
				get_template_part('partials/team/team_2');
				break;
			case 'team_3':
				get_template_part('partials/team/team_3');
				break;
			case 'team_4':
				get_template_part('partials/team/team_4');
				break;
			case 'pricing_1':
				get_template_part('partials/pricing/pricing_1');
				break;
			case 'pricing_2':
				get_template_part('partials/pricing/pricing_2');
				break;
			case 'pricing_3':
				get_template_part('partials/pricing/pricing_3');
				break;
			case 'pricing_4':
				get_template_part('partials/pricing/pricing_4');
				break;
			case 'testimonial_1':
				get_template_part('partials/testimonial/testimonial_1');
				break;
			case 'testimonial_2':
				get_template_part('partials/testimonial/testimonial_2');
				break;
			case 'contact_1':
				get_template_part('partials/contact/contact_1');
				break;
			case 'contact_2':
				get_template_part('partials/contact/contact_2');
				break;
			case 'contact_3':
				get_template_part('partials/contact/contact_3');
				break;
			case 'contact_4':
				get_template_part('partials/contact/contact_4');
				break;

		} //end switch
	endwhile;
endif;?>

</div><!-- .wrap -->

<?php
get_footer();
