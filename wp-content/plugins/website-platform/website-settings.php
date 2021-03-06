<?php
/**
 * @package Elevative
 * @version 1.0.0
 */
/*
Plugin Name: Elevative Website Platform
Plugin URI:
Description:
Author: Elevative
Version: 1.0.0
Author URI: https://www.elevative.com
*/

function my_favicon() 
{ $favicon = get_field('favicon','option');
if($favicon){?>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $favicon;?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon;?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $favicon;?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon;?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $favicon;?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon;?>">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $favicon;?>">
<meta name="theme-color" content="#ffffff">
<?php }}
add_action('wp_head', 'my_favicon');



// Remove Un-used scripts
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


//Remove query strings
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
function remove_gutenberg_styles() {
     wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_gutenberg_styles', 100 );



//SVG Support
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/* Load custom testimonials area

*/

add_action( 'init', 'testimonials_post_type' );
function testimonials_post_type() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' =>  'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials in the trash',
        'parent_item_colon' => '',
    );

    register_post_type( 'testimonials', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        "rewrite" => array( "slug" => "testimonials", "with_front" => false ),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'   => 'dashicons-format-chat',
      'supports' => array('title', 'editor', 'thumbnail'),
    ) );
}


/* Load custom team area

*/

add_action( 'init', 'team_post_type' );
function team_post_type() {
    $labels = array(
        'name' => 'Team',
        'singular_name' => 'Team',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team Member',
        'edit_item' => 'Edit Team Member',
        'new_item' => 'New Team Member',
        'view_item' => 'View Team Members',
        'search_items' => 'Search Team Members',
        'not_found' =>  'No Team Members found',
        'not_found_in_trash' => 'No Team Members in the trash',
        'parent_item_colon' => '',
    );

    register_post_type( 'team', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        "rewrite" => array( "slug" => "team", "with_front" => false ),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'   => 'dashicons-businessperson',
      'supports' => array('title', 'editor', 'thumbnail'),
    ) );
}

// Creates Custom Options Page for Elevative Admin
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_sub_page(array(
    'page_title'  => 'Website Settings',
    'position' => 1,
    'menu_title'  => 'Website Settings',
    'menu_slug'   => 'website-settings',
    'parent_slug' => 'elevative_page',
    'capability'  => 'edit_posts',
    'icon_url' =>  plugins_url( 'images/burst.png', __FILE__),
    'redirect'    => false
  ));
  
}
//ACF For Custom Posts and Pages
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
  'key' => 'group_business_information',
  'title' => 'Business Information',
  'fields' => array(
    array(
      'key' => 'field_5c01538b2bf53',
      'label' => 'Business Information',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
      array(
        'key' => 'field_business_logo',
        'label' => 'Business Logo',
        'name' => 'business_logo',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
      array(
        'key' => 'field_business_favicon',
        'label' => 'Favicon',
        'name' => 'favicon',
        'type' => 'image',
        'instructions' => 'Please upload an image that is 192px X 192px',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
    array(
      'key' => 'field_5c0154212bf55',
      'label' => 'Business Name',
      'name' => 'business_name',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c01542e2bf56',
      'label' => 'Phone Number',
      'name' => 'phone_number',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c0154392bf57',
      'label' => 'Address',
      'name' => 'address',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c0154462bf58',
      'label' => 'City',
      'name' => 'city',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c01544f2bf59',
      'label' => 'State',
      'name' => 'state',
      'type' => 'text',
      'instructions' => 'Please use two digit state code only',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 2,
    ),
    array(
      'key' => 'field_5c0154842bf5a',
      'label' => 'Zip Code',
      'name' => 'zip_code',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c7d8e8f7fdb0',
      'label' => 'Business Hours',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5c7d8ef77fdb1',
      'label' => 'Hours Monday',
      'name' => 'hours_monday',
      'type' => 'text',
      'instructions' => 'Format like this: 8am - 6pm',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c7d8f317fdb2',
      'label' => 'Hours Tuesday',
      'name' => 'hours_tuesday',
      'type' => 'text',
      'instructions' => 'Format like this: 8am - 6pm',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c7d8f3b7fdb3',
      'label' => 'Hours Wednesday',
      'name' => 'hours_wednesday',
      'type' => 'text',
      'instructions' => 'Format like this: 8am - 6pm',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c7d8f4a7fdb4',
      'label' => 'Hours Thursday',
      'name' => 'hours_thursday',
      'type' => 'text',
      'instructions' => 'Format like this: 8am - 6pm',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c7d8f537fdb5',
      'label' => 'Hours Friday',
      'name' => 'hours_friday',
      'type' => 'text',
      'instructions' => 'Format like this: 8am - 6pm',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c7d8f5d7fdb6',
      'label' => 'Hours Saturday',
      'name' => 'hours_saturday',
      'type' => 'text',
      'instructions' => 'Format like this: 8am - 6pm',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5c7d8f697fdb7',
      'label' => 'Hours Sunday',
      'name' => 'hours_sunday',
      'type' => 'text',
      'instructions' => 'Format like this: 8am - 6pm',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '100',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),

    array(
      'key' => 'field_5c0154a92bf5d',
      'label' => 'Social Media',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5c0154b72bf5e',
      'label' => 'Facebook URL',
      'name' => 'facebook_url',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c0154bf2bf5f',
      'label' => 'Twitter URL',
      'name' => 'twitter_url',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_linkedin',
      'label' => 'Linkedin URL',
      'name' => 'linkedin_url',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c0154c82bf60',
      'label' => 'Instagram URL',
      'name' => 'instagram_url',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c0154c82bf602',
      'label' => 'Yelp URL',
      'name' => 'yelp_url',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c0154c82bf603',
      'label' => 'Pinterest URL',
      'name' => 'pinterest_url',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c0154c82bf603yt',
      'label' => 'You Tube URL',
      'name' => 'youtube_url',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5bbb942bcaa8a',
      'label' => 'Custom Scripts',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5afdb2e3a64fe',
      'label' => 'Google Tag Manager (head)',
      'name' => 'google_tag_manager_head',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
    ),
    array(
      'key' => 'field_5afdb2f6a64ff',
      'label' => 'Google Tag Manager (body)',
      'name' => 'google_tag_manager_body',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
    ),
    array(
      'key' => 'field_5afdb29de7c35',
      'label' => 'Header Scripts',
      'name' => 'header_scripts',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
    ),
    array(
      'key' => 'field_5afdb2aae7c36',
      'label' => 'Footer Scripts',
      'name' => 'footer_scripts',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
    ),
    
    array(
      'key' => 'field_602e9e071df71',
      'label' => 'Colors',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_602e9e141df72',
      'label' => 'Primary Color',
      'name' => 'primary_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e1e1df73',
      'label' => 'Secondary Color',
      'name' => 'secondary_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e2d1df74',
      'label' => 'Link Color',
      'name' => 'link_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e381df75',
      'label' => 'Link Hover Color',
      'name' => 'link_hover_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e4d1df76',
      'label' => 'Body Font Color',
      'name' => 'body_font_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e5c1df77',
      'label' => 'H1 Color',
      'name' => 'h1_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e6a1df78',
      'label' => 'H2 Color',
      'name' => 'h2_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e741df79',
      'label' => 'H3 Color',
      'name' => 'h3_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e7c1df7a',
      'label' => 'H4 Color',
      'name' => 'h4_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e841df7b',
      'label' => 'H5 Color',
      'name' => 'h5_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_602e9e8b1df7c',
      'label' => 'H6 Color',
      'name' => 'h6_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '33',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array(
      'key' => 'field_5bbb97987',
      'label' => 'Custom CSS',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5a7987',
      'label' => 'Custom CSS',
      'name' => 'custom_css',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '100',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
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
  'instruction_placement' => 'field',
  'hide_on_screen' => array(
    0 => 'permalink',
    1 => 'the_content',
    2 => 'excerpt',
    3 => 'discussion',
    4 => 'comments',
    5 => 'slug',
    6 => 'author',
    7 => 'format',
    8 => 'page_attributes',
    9 => 'featured_image',
    10 => 'categories',
    11 => 'tags',
    12 => 'send-trackbacks',
  ),
  'active' => true,
  'description' => '',
));

acf_add_local_field_group(array(
  'key' => 'group_5c211cb95db9f',
  'title' => 'Testimonials',
  'fields' => array(
    array(
      'key' => 'field_5c211cbe05a47',
      'label' => 'Customer\'s Name',
      'name' => 'customer_name',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c211cbe05a475645',
      'label' => 'More Details',
      'name' => 'more_Details',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c211dcd4b41f',
      'label' => 'Review Details',
      'name' => 'review_details',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 0,
      'delay' => 0,
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'testimonials',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
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
acf_add_local_field_group(array(
  'key' => 'group_5c211cb95db9f789',
  'title' => 'Team Member Details',
  'fields' => array(
      array(
        'key' => 'field_team_img',
        'label' => 'Profile Image',
        'name' => 'profile_image',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
    array(
      'key' => 'field_5c24354345',
      'label' => 'More Details',
      'name' => 'more_Details',
      'type' => 'text',
      'instructions' => '',
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
    array(
      'key' => 'field_5c21345345',
      'label' => 'Team Member Bio',
      'name' => 'team_member_bio',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 0,
      'delay' => 0,
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'team',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
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
acf_add_local_field_group(array(
  'key' => 'group_5b870a04810fa-2',
  'title' => 'Custom Scripts',
  'fields' => array(
    array(
      'key' => 'field_5b589c6e70409',
      'label' => 'Header Scripts',
      'name' => 'header_scripts',
      'type' => 'textarea',
      'instructions' => 'Use this area to display custom scripts for tracking in the head area of the page.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => 3,
      'new_lines' => '',
    ),
    array(
      'key' => 'field_5c7d902e2d7a6',
      'label' => 'Footer Scripts',
      'name' => 'footer_scripts',
      'type' => 'textarea',
      'instructions' => 'Use this area to display custom scripts for tracking in the footer area of the page.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => 3,
      'new_lines' => '',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
      ),
    ),
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'landing-pages',
      ),
    ),
  ),
  'menu_order' => 10,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array(
    0 => 'the_content',
    1 => 'excerpt',
    2 => 'discussion',
    3 => 'comments',
    4 => 'revisions',
    5 => 'slug',
    6 => 'author',
    7 => 'format',
    8 => 'featured_image',
    9 => 'categories',
    10 => 'tags',
    11 => 'send-trackbacks',
  ),
  'active' => true,
  'description' => '',
));


endif;

//Enable use of ACF Fields in Yoast

function business_name_function() {     
  $business_name = get_field('business_name', 'option');     // Get my setting
  return $business_name;
}
function city_function() {     
  $city = get_field('city', 'option');     // Get my setting
  return $city;
}
function state_function() {     
  $state = get_field('state', 'option');     // Get my setting
  return $state;
}
add_action( 'wpseo_register_extra_replacements', function() {     
     wpseo_register_var_replacement( '%%business_name%%', 'business_name_function', 'advanced', '' ); 
     wpseo_register_var_replacement( '%%city%%', 'city_function', 'advanced', '' ); 
     wpseo_register_var_replacement( '%%state%%', 'state_function', 'advanced', '' ); 
   } 
);




//Add scripts to WP Head of template
add_action( 'wp_head', 'wp_head_open' );
function wp_head_open() {
  $google_tag_manager_head = get_field('google_tag_manager_head', 'option');
  $site_header_scripts = get_field('header_scripts', 'option');
  $custom_css = get_field('custom_css', 'option');
  if($site_header_scripts){
    echo stripslashes($site_header_scripts);
  }
  if($google_tag_manager_head){
    echo stripslashes($google_tag_manager_head);
  }
  if($custom_css){
    echo '<style>';
    echo stripslashes($custom_css);
    echo '</style>';
  }
}

//Add scripts to opening body tag
add_action( 'wp_body_open', 'elevative_body_scripts' );
function elevative_body_scripts() {
  $gtm_body_script = get_field('google_tag_manager_body', 'option');
  if($gtm_body_script){
    echo stripslashes($gtm_body_script);
  }
}

//Add Page Header Scripts to Wp Head
add_action( 'wp_head', 'page_header_script' );
function page_header_script() {
  $page_header_scripts = get_field('header_scripts');
  if($page_header_scripts){
    echo stripslashes($page_header_scripts);
  }
}
//Add Page Footer Scripts to Wp Footer
function page_footer_script() {
  $page_footer_scripts = get_field('footer_scripts');
  $site_footer_scripts = get_field('footer_scripts', 'option');
  if($page_footer_scripts){
    echo stripslashes($page_footer_scripts);
  }
  if($site_footer_scripts){
    echo stripslashes($site_footer_scripts);
  }
}
add_action( 'wp_footer', 'page_footer_script' );



//Add theme options to stylesheet
function hook_css() {
    $primary_color = get_field('primary_color', 'option');
    $secondary_color= get_field('secondary_color', 'option');
      $link_color = get_field('link_color', 'option');
      $link_hover_color = get_field('link_hover_color', 'option');
      $body_font_color = get_field('body_font_color', 'option');
      $h1_color = get_field('h1_color', 'option');
      $h2_color = get_field('h2_color', 'option');
      $h3_color = get_field('h3_color', 'option');
      $h4_color = get_field('h4_color', 'option');
      $h5_color = get_field('h5_color', 'option');
      $h6_color = get_field('h6_color', 'option');
  ?>
            <style>
              :root{
                --primary-color: <?php echo $primary_color;?>;
            --secondary-color: <?php echo $secondary_color;?>;
            --link-color: <?php echo $link_color;?>;
            --link-hover-color: <?php echo $link_hover_color;?>;
            --body-font-color: <?php echo $body_font_color;?>;
            --h1-color: <?php echo $h1_color;?>;
            --h2-color: <?php echo $h2_color;?>;
            --h3-color: <?php echo $h3_color;?>;
            --h4-color: <?php echo $h4_color;?>;
            --h5-color: <?php echo $h5_color;?>;
            --h6-color: <?php echo $h6_color;?>;
          }
          a {color: <?php echo $link_color;?>;}
          a:hover {color: <?php echo $link_hover_color;?>;}
          body {color: <?php echo $body_font_color;?>;}
          h1 {color: <?php echo $h1_color;?>;}
          h2 {color: <?php echo $h2_color;?>;}
          h3 {color: <?php echo $h3_color;?>;}
          h4 {color: <?php echo $h4_color;?>;}
          h5 {color: <?php echo $h5_color;?>;}
          h6 {color: <?php echo $h6_color;?>;}
      </style>
      <?php
    }
    add_action('wp_head', 'hook_css');
