<?php 

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 99);

function theme_enqueue_styles() 
{
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
}
