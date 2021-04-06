<?php
/**
Template Name: Landing Page 1
Template Post Type: landing-pages
 */

get_header(); ?>

<div class="page_banner1" style="background-image: url(<?php if(get_field('banner_image')):?><?php the_field('banner_image');?><?php else:?><?php echo get_template_directory_uri(); ?>/images/banner.jpg<?php endif;?>); ">
	<div class="container">
		<div class="page-banner-heading-1">
			<h1 id="4" class=""><?php echo do_shortcode(get_field('banner_h1'));?></h1>
            <?php if(get_field('banner_h2')):?><h2><?php echo do_shortcode(get_field('banner_h2'));?></h2><?php endif;?>
            <div class="form_one" >
                <?php echo do_shortcode(get_field('form_shortcode'));?>
            </div>
		</div>
	</div>
</div>

<div class="section__wrapper" style="position: relative;">
    <div class="container" style="position: relative;">
        <div class="row">
            <div class="col-lg-6 pt-3 pb-3">
                <div class="row ">
                    <div class="col-sm-6">
                        <span class="h2"><?php the_field('business_name','option');?></span>
                        <div class="contact__details">
                            <?php 
                            $address = get_field('address','option');
                            $city = get_field('city','option');
                            $state = get_field('state','option');
                            $zip_code = get_field('zip_code','option');
                            $phone_number = get_field('phone_number','option');?>
                            <span class="details d-block"><?php echo $address;?><br/><?php echo $city;?>, <?php echo $state;?>. <?php echo $zip_code;?></span>
                            <span class="details d-block"><?php echo $phone_number;?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <span class="h2">Hours</span>
                        <span class="hours">
                            <?php if(get_field('hours_monday','options')):?><span>Monday: <?php the_field('hours_monday','options');?></span><?php endif;?>
                            <?php if(get_field('hours_tuesday','options')):?><span>Tuesday: <?php the_field('hours_tuesday','options');?></span><?php endif;?>
                            <?php if(get_field('hours_wednesday','options')):?><span>Wednesday: <?php the_field('hours_wednesday','options');?></span><?php endif;?>
                            <?php if(get_field('hours_thursday','options')):?><span>Thursday: <?php the_field('hours_thursday','options');?></span><?php endif;?>
                            <?php if(get_field('hours_friday','options')):?><span>Friday: <?php the_field('hours_friday','options');?></span><?php endif;?>
                            <?php if(get_field('hours_saturday','options')):?><span>Saturday: <?php the_field('hours_saturday','options');?></span><?php endif;?>
                            <?php if(get_field('hours_sunday','options')):?><span>Sunday: <?php the_field('hours_sunday','options');?></span><?php endif;?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="map-wrapper">
                    <div>
                        <?php the_field('map_iframe');?>
                    </div>
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







