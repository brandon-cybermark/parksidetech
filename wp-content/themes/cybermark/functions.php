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
  	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', 0 );
  	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', 0 );
  	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/all.min.css', 0); 
	// Theme stylesheet.
	wp_enqueue_style( 'cybermark-style', get_stylesheet_uri() );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'cybermark-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	$cybermark_l10n = array(
		'quote' => cybermark_get_svg( array( 'icon' => 'quote-right' ) ),
	);
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'cybermark-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
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
  wp_enqueue_script( 'fancybox-js', get_template_directory_uri(). '/assets/js/jquery.fancybox.pack.js', array( 'jquery' ));
  wp_enqueue_script( 'fancybox-media', get_template_directory_uri(). '/assets/js/jquery.fancybox-media.js', array( 'jquery' ));
}
add_action( 'wp_footer', 'themebs_enqueue_scripts');
/* TGM Plugin activation */
// Add CyberMark approved custom plugins for website development
require_once get_template_directory() . '/inc/tgm_pa.php';


