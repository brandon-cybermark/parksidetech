<?php

/*

 * Template Name: Service Page

 */

?>

<?php get_header(); 
get_template_part('template-parts/banner')?>


<?php if(get_field('callout_text') || get_field('content_block')):?>
<section class="content_area section pp-scrollable">

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="callout__section">
					<?php if(get_field('callout_text')):?>
						<span class="h2 callout-text"><?php the_field('callout_text');?></span>
					<?php endif;?>
			    	<?php 
			    		$button = get_field('cta');
						if($button):
							$link_url = $button['url'];
						    $link_title = $button['title'];
						    $link_target = $button['target'] ? $button['target'] : '_self';?>
							<div class="section__button ">
								<a class="btn primary-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>				
							</div>
						<?php endif;?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="content__section">
					<?php the_field('content_block');?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>
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
if(!is_page('thank-you')){
	get_template_part('template-parts/contact');
}
get_template_part('partials/partners');
get_footer(); ?>