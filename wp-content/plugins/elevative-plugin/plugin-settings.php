<?php
/**
 * @package Elevative 
 * @version 1.0.0
 */
/*
Plugin Name: Elevative Plugin
Plugin URI: 
Description: 
Author: Elevative
Version: 1.0.0
Author URI: https://www.elevativedigital.com
*/

/*Create Elevative custom login screen */
function my_custom_login() {
  wp_enqueue_style('elevative-tc', plugins_url('/style.css', __FILE__));
}
add_action('login_head', 'my_custom_login');


//Update Footer Text with Elevative Brand
function remove_footer_admin () {
    echo "Elevative Website Platform";
} 
add_filter('admin_footer_text', 'remove_footer_admin');

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
  remove_meta_box('dashboard_right_now', 'dashboard', 'core');
  remove_meta_box('dashboard_activity', 'dashboard', 'core');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
  remove_meta_box('dashboard_plugins', 'dashboard', 'core');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
  remove_meta_box('dashboard_primary', 'dashboard', 'core');
  remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');



//Disable Help Tab
add_action('admin_head', 'mytheme_remove_help_tabs');
function mytheme_remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}
// remove toolbar items
function remove_from_admin_bar($wp_admin_bar) {
    /*
     * Placing items in here will only remove them from admin bar
     * when viewing the fronte end of the site
    */
        $wp_admin_bar->remove_node('si_menu');
 
        // WordPress Core Items (uncomment to remove)
        $wp_admin_bar->remove_node('updates');
        $wp_admin_bar->remove_node('comments');
        $wp_admin_bar->remove_node('new-content');
        $wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->remove_node('site-name');
        //$wp_admin_bar->remove_node('my-account');
        $wp_admin_bar->remove_node('search');
        $wp_admin_bar->remove_node('customize');
 
    /*
     * Items placed outside the if statement will remove it from both the frontend
     * and backend of the site
    */
    $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'remove_from_admin_bar', 999);

//Disable Admin Menubar for non-admins on front end of site
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
//Replace Howdy intro message on Wordpress admin menu
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );
 
function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$profile_url = get_edit_profile_url( $user_id );
 
if ( 0 != $user_id ) {
/* Add the "My Account" menu */
$avatar = get_avatar( $user_id, 28 );
$howdy = sprintf( __('Welcome, %1$s'), $current_user->display_name );
$class = empty( $avatar ) ? '' : 'with-avatar';
 
$wp_admin_bar->add_menu( array(
'id' => 'my-account',
'parent' => 'top-secondary',
'title' => $howdy . $avatar,
'href' => $profile_url,
'meta' => array(
'class' => $class,
),
) );
 
}
}


//Add New Elevative Main Admin Menu
function elevative_custom_menu_page(){
    add_menu_page( 
        __( 'Elevative', 'elevative' ),
        'Elevative',
        'manage_options',
        'elevative_page',
        'cm_custom_menu_page',
        plugins_url( 'images/logo.png', __FILE__) ,
        2
    ); 
}
add_action( 'admin_menu', 'elevative_custom_menu_page' );
/**
 * Display a custom menu page
 */
function cm_custom_menu_page(){
    esc_html_e( 'Admin Page', 'elevative' );  
}


//Add dashboard custom stylesheet
function elevative_tc_css() {
  wp_enqueue_style('elevative-tc', plugins_url('/style.css', __FILE__));
}
add_action('admin_enqueue_scripts','elevative_tc_css');

//enqueue the admin scripts for custom admin menu functionality
function enqueue_menu_scripts(){
  wp_enqueue_script('menu-admin-script', plugins_url( '/js/admin-menu-scripts.js', __FILE__ ));
}
add_action('admin_enqueue_scripts','enqueue_menu_scripts');

//Disable comments completely
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});


//Add menu items to Admin Menu
add_action('admin_bar_menu', 'add_toolbar_items', 100);
function add_toolbar_items($admin_bar){
  if (! is_network_admin() ) {
    $admin_bar->add_menu( array(
        'id'    => 'site_url',
        'title' => 'View Website',
        'href'  => ''.site_url().'/',
        'meta'  => array(
            'title' => __('View Website'),            
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'dashboard',
        'title' => 'Dashboard',
        'href'  => ''.admin_url().'admin.php?page=elevative',
        'meta'  => array(
            'title' => __('Dashboard'),            
        ),
    ));
}
}