<?php
/**
 * CyberMark functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage CyberMark
 * @since 1.0
 */
/**
 * CyberMark only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cybermark_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/cybermark
	 * If you're building a theme based on CyberMark, use a find and replace
	 * to change 'cybermark' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cybermark' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'cybermark-thumbnail-avatar', 100, 100, true );
	// Set the default content width.
	$GLOBALS['content_width'] = 1170;
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'cybermark' ),
			'main-nav' => __( 'Main Menu', 'cybermark' ),
			'footer' => __( 'Footer Menu', 'cybermark' ),
		)
	);
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);
	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'cybermark_setup' );
/**
 * Register custom fonts.
 */
function cybermark_fonts_url() {
	$fonts_url = '';
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'cybermark' );
	if ( 'off' !== $libre_franklin ) {
		$font_families = array();
		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cybermark_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'cybermark' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cybermark' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cybermark_widgets_init' );
/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since CyberMark 1.0
 */
function cybermark_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'cybermark_javascript_detection', 0 );
/**
 * Enqueues scripts and styles.
 */
function cybermark_scripts() {
	// Load Bootstrap and Fontawesome
  	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css');
  	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
  	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/all.min.css'); 
	wp_enqueue_style( 'cybermark-style', get_template_directory_uri() . '/style.css' , 99 );
	wp_enqueue_style( 'corporate-style', get_stylesheet_uri(), 99 );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'cybermark-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	$cybermark_l10n = array(
		'quote' => cybermark_get_svg( array( 'icon' => 'quote-right' ) ),
	);
	if ( has_nav_menu( 'top' ) ) {
		//wp_enqueue_script( 'cybermark-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$cybermark_l10n['expand']   = __( 'Expand child menu', 'cybermark' );
		$cybermark_l10n['collapse'] = __( 'Collapse child menu', 'cybermark' );
		$cybermark_l10n['icon']     = cybermark_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}
	wp_localize_script( 'cybermark-skip-link-focus-fix', 'cybermarkScreenReaderText', $cybermark_l10n );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cybermark_scripts' );
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since CyberMark 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function cybermark_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];
	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}
	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}
	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'cybermark_content_image_sizes_attr', 10, 2 );
/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since CyberMark 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function cybermark_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'cybermark_header_image_tag', 10, 3 );
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since CyberMark 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function cybermark_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'cybermark_post_thumbnail_sizes_attr', 10, 3 );
/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );
/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );
/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );
/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );
/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );
//CyberMark Custom Functions
// Load Bootstrap JS and Slick Slider JS
function themebs_enqueue_scripts() {
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'aos', get_template_directory_uri(). '/assets/js/aos.js', array( 'jquery' ));
  wp_enqueue_script( 'fancybox-js', get_template_directory_uri(). '/assets/js/jquery.fancybox.pack.js', array( 'jquery' ));
  wp_enqueue_script( 'fancybox-media', get_template_directory_uri(). '/assets/js/jquery.fancybox-media.js', array( 'jquery' ));
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_enqueue_script( 'main', get_theme_file_uri( '/assets/js/main.js' ), array(), '1.0.0' );
}
add_action( 'wp_footer', 'themebs_enqueue_scripts');

//Add theme options to stylesheet
function schema_markup() {?>
    <script type="application/ld+json">
	{
	"@context": "https://schema.org",
	"@type": "Website",
	"name": "<?php the_field('business_name','option');?>",
	"image": "<?php 
				$business_logo = get_field('business_logo', 'option'); 
				echo esc_url($business_logo['url']); ?>",
	"@id": "<?php echo site_url();?>",
	"url": "<?php echo site_url();?>",
	"telephone": "<?php the_field('phone_number','option');?>",
	"priceRange": "$$",
	"address": {
	"@type": "PostalAddress",
	"streetAddress": "<?php the_field('address','option');?>",
	"addressLocality": "<?php the_field('city','option');?>",
	"addressRegion": "<?php the_field('state','option');?>",
	"postalCode":"<?php the_field('zip_code','option');?>",
	"addressCountry": "US"
	},
	"geo": {
	"@type": "GeoCoordinates",
	"latitude": <?php the_field('latitude','option');?>,
	"longitude": <?php the_field('longitude','option');?>},
	"openingHours":["<?php the_field('hours_monday','option');?>,<?php the_field('hours_tuesday','option');?>,<?php the_field('hours_wednesday','option');?>,<?php the_field('hours_thursday','option');?>,<?php the_field('hours_friday','option');?>,<?php the_field('hours_saturday','option');?>,<?php the_field('hours_sunday','option');?>"],
	"sameAs" : [ <?php if(get_field('facebook_url', 'option')):?>"<?php the_field('facebook_url', 'option'); ?>"<?php endif;?><?php if(get_field('instagram_url', 'option')):?>, "<?php the_field('instagram_url', 'option'); ?>"<?php endif;?><?php if(get_field('twitter_url', 'option')):?>, "<?php the_field('twitter_url', 'option'); ?>"<?php endif;?><?php if(get_field('you_tube_url', 'option')):?>, "<?php the_field('you_tube_url', 'option'); ?>"<?php endif;?>]
	    }
	</script>
    	<?php
    }
    add_action('wp_head', 'schema_markup');

//Add jquery to header
function add_jquery() {
       wp_enqueue_script( 'jquery' );
    }    

    add_action('init', 'add_jquery');

//Page Builder ACF
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_603e9d785c1a8',
	'title' => 'Page Banner',
	'fields' => array(
		array(
			'key' => 'field_603e9d893bcf5',
			'label' => 'Banner Image',
			'name' => 'banner_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
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
			'key' => 'field_603e9d9d3bcf6',
			'label' => 'Heading 1',
			'name' => 'heading_1',
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
			'key' => 'field_603e9da33bcf7',
			'label' => 'Heading 2',
			'name' => 'heading_2',
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
				'value' => 'services',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'discussion',
		3 => 'comments',
		4 => 'slug',
		5 => 'author',
		6 => 'format',
		7 => 'featured_image',
		8 => 'categories',
		9 => 'tags',
		10 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_605a3f5e6c30d',
	'title' => 'Page Options',
	'fields' => array(
		array(
			'key' => 'field_605a3f5e76c03',
			'label' => 'Page Builder',
			'name' => 'page_builder',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => array(
				'layout_603e96fe2ede6' => array(
					'key' => 'layout_603e96fe2ede6',
					'name' => 'intro_section',
					'label' => 'Intro Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a4143e7fcc',
							'label' => 'Intro Type',
							'name' => 'intro_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'intro_1' => 'Intro 1 <img src="'.get_template_directory_uri().'/assets/images/Intro/intro-0.png">',
								'intro_2' => 'Intro 2 <img src="'.get_template_directory_uri().'/assets/images/Intro/intro-1.png">',
								'intro_3' => 'Intro 3 <img src="'.get_template_directory_uri().'/assets/images/Intro/intro-3.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_607987',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a3f5e7e49a',
							'label' => 'Content Block',
							'name' => 'content_block',
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
						array(
							'key' => 'field_605a4170e7fcd',
							'label' => 'Content Position',
							'name' => 'content_position',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4143e7fcc',
										'operator' => '!=',
										'value' => 'intro_3',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'left' => 'Left',
								'right' => 'Right',
							),
							'default_value' => false,
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'return_format' => 'value',
							'ajax' => 0,
							'placeholder' => '',
						),
						array(
							'key' => 'field_605a41b2e7fce43543',
							'label' => 'Video Embed URL',
							'name' => 'video_embed_url',
							'type' => 'text',
							'instructions' => 'Enter the URL of the video only',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4143e7fcc',
										'operator' => '==',
										'value' => 'intro_3',
									),
								),
							),
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
							'key' => 'field_605a41b2e7fce',
							'label' => 'Form Shortcode',
							'name' => 'form_shortcode',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4143e7fcc',
										'operator' => '==',
										'value' => 'intro_2',
									),
								),
							),
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
							'key' => 'field_605a41d4e7fd0',
							'label' => 'Background Image',
							'name' => 'background_image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4143e7fcc',
										'operator' => '==',
										'value' => 'intro_3',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'url',
							'preview_size' => 'medium',
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
							'key' => 'field_605a3f5e81edc',
							'label' => 'Button',
							'name' => 'button',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4143e7fcc',
										'operator' => '!=',
										'value' => 'intro_3',
									),
								),
							),
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
						array(
							'key' => 'field_605a3f5e8589e',
							'label' => 'Button Class',
							'name' => 'button_class',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4143e7fcc',
										'operator' => '!=',
										'value' => 'intro_3',
									),
								),
							),
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'primary' => 'Primary',
								'secondary' => 'Secondary',
							),
							'default_value' => 'primary',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_605a3f5e8534534',
							'label' => 'Button Position',
							'name' => 'button_position',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4143e7fcc',
										'operator' => '!=',
										'value' => 'intro_3',
									),
								),
							),
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'left' => 'Left',
								'right' => 'Right',
								'center' => 'Center',
							),
							'default_value' => 'left',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_603e98812c9dd' => array(
					'key' => 'layout_603e98812c9dd',
					'name' => 'content_section',
					'label' => 'Content Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a4346c587c',
							'label' => 'Content Type',
							'name' => 'content_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'content_1' => 'Content 1 <img src="'.get_template_directory_uri().'/assets/images/Content/content-1.png">',
								'content_2' => 'Content 2 <img src="'.get_template_directory_uri().'/assets/images/Content/content-2.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_6079878',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a3f5eaa85d',
							'label' => 'Content Block',
							'name' => 'content_block',
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
						array(
							'key' => 'field_605a431cc587a',
							'label' => 'Content Position',
							'name' => 'content_position',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4346c587c',
										'operator' => '!=',
										'value' => 'content_1',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'left' => 'Left',
								'right' => 'Right',
							),
							'default_value' => false,
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'return_format' => 'value',
							'ajax' => 0,
							'placeholder' => '',
						),
						array(
							'key' => 'field_605a3f5eae2ca',
							'label' => 'Image',
							'name' => 'image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4346c587c',
										'operator' => '!=',
										'value' => 'content_1',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => '',
							'preview_size' => 'medium',
							'library' => '',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array(
							'key' => 'field_605a3f5eb2034',
							'label' => 'Button',
							'name' => 'button',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
						array(
							'key' => 'field_605a4329c587b',
							'label' => 'Button Class',
							'name' => 'button_class',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'primary' => 'Primary',
								'secondary' => 'Secondary',
							),
							'default_value' => 'primary',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_605a3f5456494',
							'label' => 'Button Position',
							'name' => 'button_position',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'left' => 'Left',
								'right' => 'Right',
								'center' => 'Center',
							),
							'default_value' => 'left',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_603e98b02c9e3' => array(
					'key' => 'layout_603e98b02c9e3',
					'name' => 'gallery_section',
					'label' => 'Gallery Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a4cc0c587d',
							'label' => 'Gallery Type',
							'name' => 'gallery_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'gallery_1' => 'Gallery 1 <img src="'.get_template_directory_uri().'/assets/images/Gallery/gallery-2.png">',
								'gallery_2' => 'Gallery 2 <img src="'.get_template_directory_uri().'/assets/images/Gallery/gallery-1.png">',
								'gallery_3' => 'Gallery 3 <img src="'.get_template_directory_uri().'/assets/images/Gallery/gallery-3.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_607987798',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a3f5ec09f4',
							'label' => 'Content Block',
							'name' => 'content_block',
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
							'media_upload' => 1,
							'delay' => 0,
						),
						array(
							'key' => 'field_605a3f5ec444a',
							'label' => 'Gallery Column',
							'name' => 'gallery_column',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4cc0c587d',
										'operator' => '==',
										'value' => 'gallery_1',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => 'field_603e98d32c9e6',
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => 'Add Gallery Item',
							'sub_fields' => array(
								array(
									'key' => 'field_605a3f5fa076c',
									'label' => 'Image',
									'name' => 'image',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => '',
									'preview_size' => 'medium',
									'library' => '',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array(
									'key' => 'field_605a3f5fa4127',
									'label' => 'Text',
									'name' => 'text',
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
						),
						array(
							'key' => 'field_605a3f5ecbb5f',
							'label' => 'Gallery Items',
							'name' => 'gallery_items',
							'type' => 'gallery',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a4cc0c587d',
										'operator' => '==',
										'value' => 'gallery_2',
									),
								),
								array(
									array(
										'field' => 'field_605a4cc0c587d',
										'operator' => '==',
										'value' => 'gallery_3',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'preview_size' => 'medium',
							'insert' => 'append',
							'library' => 'all',
							'min' => '',
							'max' => '',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array(
							'key' => 'field_605a53bdc5881',
							'label' => 'Button',
							'name' => 'button',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
						array(
							'key' => 'field_605a53c7c5882',
							'label' => 'Button Class',
							'name' => 'button_class',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'primary' => 'Primary',
								'secondary' => 'Secondary',
							),
							'default_value' => 'primary',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_605a3f5e8545634',
							'label' => 'Button Position',
							'name' => 'button_position',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'left' => 'Left',
								'right' => 'Right',
								'center' => 'Center',
							),
							'default_value' => 'left',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_603e99732c9f1' => array(
					'key' => 'layout_603e99732c9f1',
					'name' => 'features_section',
					'label' => 'Features Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a534dc587f',
							'label' => 'Feature Type',
							'name' => 'feature_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'feature_1' => 'Feature 1 <img src="'.get_template_directory_uri().'/assets/images/Features/features-1.png">',
								'feature_2' => 'Feature 2 <img src="'.get_template_directory_uri().'/assets/images/Features/features-2.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_60798746',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a3f5ed31e6',
							'label' => 'Content Block',
							'name' => 'content_block',
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
						array(
							'key' => 'field_605a3f5ede29e',
							'label' => 'Feature',
							'name' => 'feature',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => 'Add Feature',
							'sub_fields' => array(
								array(
									'key' => 'field_605a3f5fdc7b2',
									'label' => 'Image',
									'name' => 'image',
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
									'preview_size' => 'medium',
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
									'key' => 'field_605a3f5fe02ec',
									'label' => 'Text',
									'name' => 'text',
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
						),
						array(
							'key' => 'field_605a53d2c5883',
							'label' => 'Button',
							'name' => 'button',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
						array(
							'key' => 'field_605a53d9c5884',
							'label' => 'Button Class',
							'name' => 'button_class',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'primary' => 'Primary',
								'secondary' => 'Secondary',
							),
							'default_value' => 'primary',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_605a3f589794',
							'label' => 'Button Position',
							'name' => 'button_position',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'left' => 'Left',
								'right' => 'Right',
								'center' => 'Center',
							),
							'default_value' => 'left',
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 1,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_603e99ef2ca06' => array(
					'key' => 'layout_603e99ef2ca06',
					'name' => 'team_section',
					'label' => 'Team Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a542bc5885',
							'label' => 'Team Type',
							'name' => 'team_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'team_1' => 'Team 1 <img src="'.get_template_directory_uri().'/assets/images/Team/team-0.png">',
								'team_2' => 'Team 2 <img src="'.get_template_directory_uri().'/assets/images/Team/team-1.png">',
								'team_3' => 'Team 3 <img src="'.get_template_directory_uri().'/assets/images/Team/team-2.png">',
								'team_4' => 'Team 4 <img src="'.get_template_directory_uri().'/assets/images/Team/team-3.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_607987465',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a3f5f03e75',
							'label' => 'Content Block',
							'name' => 'content_block',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a542bc5885',
										'operator' => '==',
										'value' => 'team_1',
									),
								),
								array(
									array(
										'field' => 'field_605a542bc5885',
										'operator' => '==',
										'value' => 'team_4',
									),
								),
							),
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
					'min' => '',
					'max' => '',
				),
				'layout_603e9b362ca31' => array(
					'key' => 'layout_603e9b362ca31',
					'name' => 'testimonial_section',
					'label' => 'Testimonial Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a5514c5888',
							'label' => 'Testimonial Type',
							'name' => 'testimonial_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'testimonial_1' => 'Testimonial 1 <img src="'.get_template_directory_uri().'/assets/images/Testimonials/testimonial-2.png">',
								'testimonial_2' => 'Testimonial 2 <img src="'.get_template_directory_uri().'/assets/images/Testimonials/testimonial-1.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_60798741686',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a3f5f28670',
							'label' => 'Content Block',
							'name' => 'content_block',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a5514c5888',
										'operator' => '==',
										'value' => 'testimonial_1',
									),
								),
							),
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
					'min' => '',
					'max' => '',
				),
				'layout_603e9b572ca35' => array(
					'key' => 'layout_603e9b572ca35',
					'name' => 'contact_section',
					'label' => 'Contact Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a554ec5889',
							'label' => 'Contact Type',
							'name' => 'contact_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'contact_1' => 'Contact 1 <img src="'.get_template_directory_uri().'/assets/images/Contact/contact-1.png">',
								'contact_2' => 'Contact 2 <img src="'.get_template_directory_uri().'/assets/images/Contact/contact-2.png">',
								'contact_3' => 'Contact 3 <img src="'.get_template_directory_uri().'/assets/images/Contact/contact-3.png">',
								'contact_4' => 'Contact 4 <img src="'.get_template_directory_uri().'/assets/images/Contact/contact-4.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_60798713256',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a3f5f2c07d',
							'label' => 'Contact Block',
							'name' => 'contact_block',
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
						array(
							'key' => 'field_605a3f5f2fb15',
							'label' => 'Map Embed Code',
							'name' => 'map_embed_code',
							'type' => 'text',
							'instructions' => 'Paste your Google map embed code here',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_605a554ec5889',
										'operator' => '==',
										'value' => 'contact_1',
									),
								),
								array(
									array(
										'field' => 'field_605a554ec5889',
										'operator' => '==',
										'value' => 'contact_2',
									),
								),
							),
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
							'key' => 'field_605a5576c588a',
							'label' => 'Contact Form Shortcode',
							'name' => 'contact_form_shortcode',
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
					),
					'min' => '',
					'max' => '',
				),
				'layout_603e9b362ca366' => array(
					'key' => 'layout_603e9b3798',
					'name' => 'blog_section',
					'label' => 'Blog Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_6079878794',
							'label' => 'Block Id',
							'name' => 'block_id',
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
							'key' => 'field_605a899864967',
							'label' => 'Blog Heading',
							'name' => 'blog_heading',
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
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 0,
							'delay' => 0,
						),
						array(
							'key' => 'field_605a8978979',
							'label' => 'Blog Subheading',
							'name' => 'blog_subheading',
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
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 0,
							'delay' => 0,
						),
						array(
							'key' => 'field_605a3f7987',
							'label' => 'Content Block',
							'name' => 'content_block',
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
					'min' => '',
					'max' => '',
				),
				'layout_6064e6a51d471' => array(
					'key' => 'layout_6064e6a51d471',
					'name' => 'pricing_tables',
					'label' => 'Pricing Tables',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a3f53546',
							'label' => 'Content Block',
							'name' => 'content_block',
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
						array(
							'key' => 'field_6064e6ac44363',
							'label' => 'Pricing Type',
							'name' => 'pricing_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => 'img_options',
								'id' => '',
							),
							'choices' => array(
								'pricing_1' => 'Pricing 1 <img src="'.get_template_directory_uri().'/assets/images/Pricing/pricing-1.png">',
								'pricing_2' => 'Pricing 2 <img src="'.get_template_directory_uri().'/assets/images/Pricing/pricing-2.png">',
								'pricing_3' => 'Pricing 3 <img src="'.get_template_directory_uri().'/assets/images/Pricing/pricing-3.png">',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_6064e76544364',
							'label' => 'Pricing Options',
							'name' => 'pricing_options',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'row',
							'button_label' => '',
							'sub_fields' => array(
								array(
									'key' => 'field_6064e75654',
									'label' => 'Block Id',
									'name' => 'block_id',
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
									'key' => 'field_6064e77644365',
									'label' => 'Title',
									'name' => 'title',
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
									'key' => 'field_6064e77b44366',
									'label' => 'Price',
									'name' => 'price',
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
									'key' => 'field_6064e78144367',
									'label' => 'Details',
									'name' => 'details',
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
									'key' => 'field_6064e79244368',
									'label' => 'Button',
									'name' => 'button',
									'type' => 'link',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'array',
								),
								array(
									'key' => 'field_6064e7ab44369',
									'label' => 'Button Class',
									'name' => 'button_class',
									'type' => 'select',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'choices' => array(
										'primary' => 'Primary',
										'secondary' => 'Secondary',
									),
									'default_value' => false,
									'allow_null' => 0,
									'multiple' => 0,
									'ui' => 0,
									'return_format' => 'value',
									'ajax' => 0,
									'placeholder' => '',
								),
								array(
									'key' => 'field_6064e7c24436a',
									'label' => 'Icon',
									'name' => 'icon',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => array(
										array(
											array(
												'field' => 'field_6064e6ac44363',
												'operator' => '!=',
												'value' => 'pricing_2',
											),
										),
									),
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'url',
									'preview_size' => 'medium',
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
									'key' => 'field_6064edd3951bd',
									'label' => 'Add options',
									'name' => 'add_options',
									'type' => 'repeater',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'collapsed' => '',
									'min' => 0,
									'max' => 0,
									'layout' => 'table',
									'button_label' => '',
									'sub_fields' => array(
										array(
											'key' => 'field_6064ede8951be',
											'label' => 'Option',
											'name' => 'option',
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
									),
								),
							),
						),
					),

					'min' => '',
					'max' => '',
				),
				'layout_6064f5e98a948' => array(
					'key' => 'layout_6064f5e98a948',
					'name' => 'faq_section',
					'label' => 'Faq Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_605a3f5ert',
							'label' => 'Content Block',
							'name' => 'content_block',
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
						array(
							'key' => 'field_6064f6048a94b',
							'label' => 'FAQ',
							'name' => 'faq_option',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => 'field_6064f60f8a94c',
							'min' => 0,
							'max' => 0,
							'layout' => 'row',
							'button_label' => 'Add question',
							'sub_fields' => array(
								array(
									'key' => 'field_6064f60f8a94c',
									'label' => 'Question',
									'name' => 'faq_question',
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
									'key' => 'field_6064f6148a94d',
									'label' => 'Answer',
									'name' => 'faq_answer',
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
							),
						),
					),
				),
			),
			'button_label' => 'Add Content',
			'min' => '',
			'max' => '',
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
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'discussion',
		3 => 'comments',
		4 => 'slug',
		5 => 'author',
		6 => 'format',
		7 => 'featured_image',
		8 => 'categories',
		9 => 'tags',
		10 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
));


endif;



//Trim excerpt length
function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 100);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.'';
return $excerpt;
}

//Home Page Options
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60660845d14a1',
	'title' => 'Home Page - Main Hero',
	'fields' => array(
		array(
			'key' => 'field_6066084fc9c84',
			'label' => 'Heading Text',
			'name' => 'heading_text',
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
			'key' => 'field_6066086bc9c85',
			'label' => 'Subheading Text',
			'name' => 'subheading_text',
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
			'key' => 'field_60660871c9c86',
			'label' => 'Button',
			'name' => 'button',
			'type' => 'link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_6066087bc9c87',
			'label' => 'Button Class',
			'name' => 'button_class',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'primary' => 'Primary',
				'secondary' => 'Secondary',
				'clear' => 'Clear',
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_6066089cc9c88',
			'label' => 'Button Position',
			'name' => 'button_position',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center',
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-home.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'discussion',
		3 => 'comments',
		4 => 'slug',
		5 => 'author',
		6 => 'format',
		7 => 'featured_image',
		8 => 'categories',
		9 => 'tags',
		10 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
));

endif;

//CyberMark Landing Page custom post
function cpts_landing_page() {
    $labels = array(
        "name" => __( "Landing Page", "cybermark" ),
        "singular_name" => __( "Landing Page", "cybermark" ),
        "menu_name" => __( "Landing Pages", "cybermark" ),
        "all_items" => __( "All Landing Pages", "cybermark" ),
        "add_new" => __( "Add Landing Page", "cybermark" ),
        "add_new_item" => __( "Add New Landing Page", "cybermark" ),
        "edit_item" => __( "Edit Landing Page", "cybermark" ),
        "new_item" => __( "New Landing Page", "cybermark" ),
        "view_item" => __( "View Landing Page", "cybermark" ),
        "view_items" => __( "View Landing Pages", "cybermark" ),
        "search_items" => __( "Search Landing Pages", "cybermark" ),
        "not_found" => __( "No Landing Pages Found", "cybermark" ),
    );
    $args = array(
        "label" => __( "Landing Page", "cybermark" ),
        "labels" => $labels,
        "description" => "Display your Landing Pages",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => false,
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "offer", "with_front" => false ),
        "menu_position" => 0,
        'menu_icon'   => 'dashicons-align-left',
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail"),
    );
    register_post_type( "landing-pages", $args );
}
add_action( 'init', 'cpts_landing_page' );

//Landing Page Options
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
  'key' => 'group_5f5ba06ef35e0',
  'title' => 'Landing Page Theme 1',
  'fields' => array(
    array(
      'key' => 'field_5f5ba0dd321ac',
      'label' => 'Banner Image',
      'name' => 'banner_image',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
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
      'key' => 'field_5f5ba22f321ad',
      'label' => 'Banner H1',
      'name' => 'banner_h1',
      'type' => 'text',
      'instructions' => 'Enter the H1 Heading here',
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
      'key' => 'field_5f5ba261321ae',
      'label' => 'Banner H2',
      'name' => 'banner_h2',
      'type' => 'text',
      'instructions' => 'Enter the H2 Heading here',
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
      'key' => 'field_5f5bfgfdsg21ae',
      'label' => 'Form Shortcode',
      'name' => 'form_shortcode',
      'type' => 'text',
      'instructions' => 'Paste form shortcode here',
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
      'key' => 'field_5f54543g21ae',
      'label' => 'Map Iframe',
      'name' => 'map_iframe',
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
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_template',
        'operator' => '==',
        'value' => 'post-templates/single-landing-pages.php',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'top',
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


acf_add_local_field_group(array(
  'key' => 'group_5f627e2195f13',
  'title' => 'Landing Page Theme 2',
  'fields' => array(
    array(
      'key' => 'field_5f627e21a203c',
      'label' => 'Banner Image',
      'name' => 'banner_image',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
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
      'key' => 'field_5f627e21a9a77',
      'label' => 'Banner H1',
      'name' => 'banner_h1',
      'type' => 'text',
      'instructions' => 'Enter the H1 Heading here',
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
      'key' => 'field_5f627e21b145c',
      'label' => 'Supporting Statement Header',
      'name' => 'supporting_statement_header',
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
      'key' => 'field_5f627e21b5147',
      'label' => 'Supporting Statement Footer',
      'name' => 'supporting_statement_footer',
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
      'key' => 'field_5f62453',
      'label' => 'Form Heading',
      'name' => 'form_heading',
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
      'key' => 'field_5f62235245',
      'label' => 'Form Subheading',
      'name' => 'form_subheading',
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
      'key' => 'field_5f798465',
      'label' => 'Form Shortcode',
      'name' => 'form_shortcode',
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
      'key' => 'field_5f627e21bcadc',
      'label' => 'Footer H3',
      'name' => 'footer_h3',
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
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_template',
        'operator' => '==',
        'value' => 'post-templates/single-landing-page-four.php',
      ),
    ),
  ),
  'menu_order' => 0,
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

acf_add_local_field_group(array(
  'key' => 'group_5f627e21798141',
  'title' => 'Custom CSS',
  'fields' => array(
    array(
      'key' => 'field_5f627e745647',
      'label' => 'Custom CSS',
      'name' => 'custom_lp_css',
      'type' => 'textarea',
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
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'landing-pages',
      ),
    ),
  ),
  'menu_order' => 0,
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

add_action( 'wp_head', 'lp_css' );
function lp_css() {
  $custom_lp_css = get_field('custom_lp_css');
  if($custom_lp_css){
    echo '<style>';
    echo stripslashes($custom_lp_css);
    echo '</style>';
  }
}