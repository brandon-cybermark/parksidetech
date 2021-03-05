<?php 

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
 
	// Load Bootstrap and Fontawesome
  	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', 0 );
  	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', 0 );
  	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/all.min.css', 0); 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', 99 );
}
