<?php
/**
Template Name: Landing Page 2
Template Post Type: landing-pages
 */

get_header(); ?>

<div class="page_banner page_banner_4 mb-5" style="background-image: url(<?php if(get_field('banner_image')):?><?php the_field('banner_image');?><?php else:?><?php echo get_template_directory_uri(); ?>/images/banner.jpg<?php endif;?>); background-size:cover; background-position: center center; background-attachment: fixed">
	<div class="container">
        <div class="row align-items-center">
		    <div class="col-lg-6 col-md-6" >
                <div class="lp-banner4">
                    <h1 class=""><?php echo do_shortcode(get_field('banner_h1'));?></h1>              
                    <p><?php echo do_shortcode(get_field('supporting_statement_header'));?></p>
                </div>
            </div>
            <div id="3" class="col-md-6 col-sm-12" >
                <div class="form_one ">
                    <span class="h5 form_4_title"><?php the_field('form_heading');?></span>
                    <p><strong><?php the_field('form_subheading');?></strong></p>
                       <?php echo do_shortcode(get_field('form_shortcode'));?>
                        
                    
                    
                </div>
            </div>
        </div>
	</div>
</div>


<div class="wrap">
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
endif;?>

</div><!-- .wrap -->

<?php
get_footer();