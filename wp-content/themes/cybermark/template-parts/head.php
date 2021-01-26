<?php if ( is_category()  || is_archive() || is_home() || is_single() || is_404()) : ?>
<title><?php wp_title(''); ?> | <?php get_bloginfo();?></title>	
<?php elseif (get_field('seo_title')):?>
<title><?php echo do_shortcode(get_field('seo_title')); ?></title>
<?php else:?>
	<title><?php wp_title(''); ?> | <?php get_bloginfo();?></title>	
<?php endif;?>
<?php if ( is_category()  || is_archive() || is_home()) : ?>
<meta name="description" content="">
<?php else:?>
<meta name="description" content="<?php echo do_shortcode(get_field('seo_description')); ?>">
<?php endif;?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7099932/794646/css/fonts.css" />

<?php the_field('cybermark_lead_tracking', 39); ?>	
<?php if(get_field('header_scripts')):?><?php the_field('header_scripts');?><?php endif;?>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "LocalBusiness",
"url": "<?php echo home_url();?>",
"image": "/wp-content/themes/cybermark/assets/images/logo.png",
"address": {
"@type": "PostalAddress",
"addressLocality": "<?php the_field('location_city', 39); ?>",
"addressRegion": "<?php the_field('location_state', 39); ?>",
"postalCode":"<?php the_field('location_zip_code', 39); ?>",
"streetAddress": "<?php the_field('location_address', 39); ?>"
},
"description": "<?php the_field('about_bio', 39); ?>",
"name": "<?php the_field('location_name', 39); ?>",
"telephone": "<?php the_field('location_phone_number', 39); ?>",
"openingHours": "",
"sameAs" : [ <?php if(get_field('facebook_url', 39)):?>"<?php the_field('facebook_url', 39); ?>"<?php endif;?><?php if(get_field('instagram_url', 39)):?>, "<?php the_field('instagram_url', 39); ?>"<?php endif;?><?php if(get_field('twitter_url', 39)):?>, "<?php the_field('twitter_url', 39); ?>"<?php endif;?><?php if(get_field('you_tube_url', 39)):?>, "<?php the_field('you_tube_url', 39); ?>"<?php endif;?>]
}
</script>