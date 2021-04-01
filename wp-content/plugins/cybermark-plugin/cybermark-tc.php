<?php
/**
 * @package CyberMark 
 * @version 1.0.0
 */
/*
Plugin Name: CyberMark Plugin
Plugin URI: 
Description: 
Author: CyberMark
Version: 1.0.0
Author URI: https://www.cybermark.com
*/

/*Create CyberMark custom login screen */
function my_custom_login() {
  wp_enqueue_style('cybermark-tc', plugins_url('/style.css', __FILE__));
}
add_action('login_head', 'my_custom_login');


//Update Footer Text with CyberMark Brand
function remove_footer_admin () {
    echo "CyberMark Website Platform";
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


// disable default network dashboard widgets
function disable_default_network_dashboard_widgets() {
  remove_meta_box('network_dashboard_right_now', 'dashboard-network', 'core');
  remove_meta_box('dashboard_primary', 'dashboard-network', 'core');
  remove_meta_box('dashboard_secondary', 'dashboard-network', 'core');
}
add_action('network_admin_menu', 'disable_default_network_dashboard_widgets');

/**
 * Remove the default welcome dashboard message and replace with CyberMark Dashboard
 *
 */
class Replace_WP_Dashboard {
    protected $capability = 'read';
    protected $title;
    final public function __construct() {
        if( is_admin() || is_network_admin()) {
            add_action( 'init', array( $this, 'init' ) );
        }
    }
    final public function init() {
        if( current_user_can( $this->capability ) ) {
            $this->set_title();
            add_filter( 'admin_title', array( $this, 'admin_title' ), 10, 2 );
            add_action( 'admin_menu', array( $this, 'admin_menu' ) );
            add_action( 'current_screen', array( $this, 'current_screen' ) );
        }
    }
    /**
     * Sets the page title for your custom dashboard
     */
    function set_title() {
        if( ! isset( $this->title ) ) {
            $this->title = __( 'CyberMark Dashboard' );
        }
    }
    /**
     * Output the content for your custom dashboard
     */
    function page_content() {
         include 'dashboard.php';
    }
    /**
     * Fixes the page title in the browser.
     *
     * @param string $admin_title
     * @param string $title
     * @return string $admin_title
     */
    final public function admin_title( $admin_title, $title ) {
        global $pagenow;
        if( 'admin.php' == $pagenow && isset( $_GET['page'] ) && 'cybermark' == $_GET['page'] ) {
            $admin_title = $this->title . $admin_title;
        }
        return $admin_title;
    }
    final public function admin_menu() {
        /**
         * Adds a custom page to WordPress
         */
        add_menu_page( $this->title, '', $this->capability, 'cybermark', array( $this, 'page_content' ) );
        /**
         * Remove the custom page from the admin menu
         */
        remove_menu_page('cybermark');
        /**
         * Make dashboard menu item the active item
         */
        global $parent_file, $submenu_file;
        $parent_file = 'index.php';
        $submenu_file = 'index.php';
        /**
         * Rename the dashboard menu item
         */
        global $menu;
        $menu[2][0] = $this->title;
        /**
         * Rename the dashboard submenu item
         */
        global $submenu;
        $submenu['index.php'][0][0] = 'Dashboard';
    }
    /**
     * Redirect users from the normal dashboard to your custom dashboard
     */
    final public function current_screen( $screen ) {
        if( 'dashboard' == $screen->id ) {
            wp_safe_redirect( admin_url('admin.php?page=cybermark') );
            exit;
        }
        // if( 'dashboard-network' == $screen->id ) {
        //     wp_safe_redirect( admin_url('admin.php?page=cybermark') );
        //     exit;
        // }
    }
}
new Replace_WP_Dashboard();
//Add CyberMark Smart Support Widget
function custom_admin_js() {
    $url = get_bloginfo('template_directory') . '/js/wp-admin.js';
echo '<script>window.fwSettings={"widget_id":48000000156};!function(){if("function"!=typeof window.FreshworksWidget){var n=function(){n.q.push(arguments)};n.q=[],window.FreshworksWidget=n}}() </script>';
echo '<script type="text/javascript" src="https://widget.freshworks.com/widgets/48000000156.js" async defer></script>';
}
add_action('admin_footer', 'custom_admin_js');

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

//ACF For CyberMark Integrations
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
  'key' => 'group_5d7a6e3d355a6',
  'title' => 'CyberMark Settings',
  'fields' => array(
    array(
      'key' => 'field_api_token',
      'label' => 'API Token',
      'name' => 'api_token',
      'type' => 'text',
      'instructions' => 'Please enter the What Converts API Token here.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
            'readonly' => '1',
    ),
    array(
      'key' => 'field_api_secret',
      'label' => 'API Secret',
      'name' => 'api_secret',
      'type' => 'text',
      'instructions' => 'Please enter the What Converts API Secret here.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
            'readonly' => '1',
    ),
    array(
      'key' => 'field_account_id',
      'label' => 'Account ID',
      'name' => 'account_id',
      'type' => 'text',
      'instructions' => 'Please enter the What Converts Account ID here',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
            'readonly' => '1',
    ),
    array(
      'key' => 'field_profile_id',
      'label' => 'Profile ID',
      'name' => 'profile_id',
      'type' => 'text',
      'instructions' => 'Please enter the What Converts Profile ID here (if available)',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'website-settings',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'acf_after_title',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array(
    0 => 'permalink',
    1 => 'the_content',
    2 => 'excerpt',
    3 => 'discussion',
    4 => 'comments',
    5 => 'revisions',
    6 => 'slug',
    7 => 'author',
    8 => 'format',
    9 => 'page_attributes',
    10 => 'featured_image',
    11 => 'categories',
    12 => 'tags',
    13 => 'send-trackbacks',
  ),
  'active' => true,
  'description' => '',
));
endif;

//Add New CyberMark Main Admin Menu
function cybermark_custom_menu_page(){
    add_menu_page( 
        __( 'CyberMark', 'cybermark' ),
        'Cybermark',
        'manage_options',
        'cybermark_page',
        'cm_custom_menu_page',
        plugins_url( 'images/burst.png', __FILE__) ,
        2
    ); 
}
add_action( 'admin_menu', 'cybermark_custom_menu_page' );
/**
 * Display a custom menu page
 */
function cm_custom_menu_page(){
    esc_html_e( 'Admin Page Test', 'cybermark' );  
}


//Add new CyberMark Lead Tracking Tool Admin menu item to dashboard. Built for Reporting Tool Integration into website
add_action('admin_menu', 'lead_tracking_create');
function lead_tracking_create() {
    $page_title = 'CyberMark Lead Tracking';
    $menu_title = 'CyberMark Lead Tracking';
    $capability = 'read';
    $menu_slug = 'lead_tracking';
    $function = 'lead_tracking_create_display';
    $position = 2;
    add_submenu_page( 'cybermark_page', $page_title, $menu_title, $capability, $menu_slug, $function, $position );
}
function lead_tracking_create_display() {
    include 'what-converts.php';
}
//Add new CyberMark Support Admin menu item to dashboard. Built for Reporting Tool Integration into website
add_action('admin_menu', 'cybermark_support_create');
function cybermark_support_create() {
    $page_title = 'SMART Support';
    $menu_title = 'SMART Support';
    $capability = 'read';
    $menu_slug = 'cybermark_support';
    $function = 'cybermark_support_create_display';
    $position = 2;
    add_submenu_page( 'cybermark_page', $page_title, $menu_title, $capability, $menu_slug, $function, $position );
}
function cybermark_support_create_display() {
    include 'cybermark-support.php';
}


//Add dashboard custom stylesheet
function cybermark_tc_css() {
  wp_enqueue_style('cybermark-tc', plugins_url('/style.css', __FILE__));
}
add_action('admin_enqueue_scripts','cybermark_tc_css');

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



$post_id = "options";
update_field( 'api_token', ''.wc_key.'', $post_id );
update_field( 'api_secret', ''.wc_secret.'', $post_id );
update_field( 'account_id', ''.account_id.'', $post_id );

//Add What Converts to WP Head
add_action( 'wp_head', 'cybermark_wc_script' );
function cybermark_wc_script() {
  $profile_id = get_field('profile_id', 'option');
  if($profile_id){?>
    <script src="//scripts.iconnode.com/<?php echo $profile_id; ?>.js"></script>
  <?php }
}
//Add Notice after save
add_action( 'network_admin_notices', 'cybermark_custom_notices' );
 
function cybermark_custom_notices(){
 
  if( isset($_GET['page']) && $_GET['page'] == 'cybermark-options' && isset( $_GET['updated'] )  ) {
    echo '<div id="message" class="updated notice is-dismissible"><p>Settings updated. You\'re the best!</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
  }
 
}

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
        'href'  => ''.admin_url().'admin.php?page=cybermark',
        'meta'  => array(
            'title' => __('Dashboard'),            
        ),
    ));
    if(current_user_can('administrator')) {
      $admin_bar->add_menu( array(
          'id'    => 'all-locations',
          'title' => 'All Websites',
          'href'  => ''.admin_url().'admin.php?page=all_locations',
          'meta'  => array(
              'title' => __('All Websites'),            
          ),
      ));
    }
    $admin_bar->add_menu( array(
        'id'    => 'leads',
        'title' => 'Leads',
        'href'  => ''.admin_url().'admin.php?page=lead_tracking',
        'meta'  => array(
            'title' => __('Support'),            
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'support',
        'title' => 'Smart Support',
        'href'  => ''.admin_url().'admin.php?page=cybermark_support',
        'meta'  => array(
            'title' => __('Support'),            
        ),
    ));
}
}