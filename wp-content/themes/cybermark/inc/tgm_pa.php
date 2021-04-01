<?php
/**
 *
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Cybermark
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'cybermark_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function cybermark_register_required_plugins() {

	$plugins = array(
		array(
			'name'               => 'Franchise Platform', 
			'slug'               => 'franchise-platform', 
			'source'             => get_template_directory() . '/lib/plugins/franchise-platform.zip', 
			'required'           => true, 
			'version'            => '2.0.0', 
			'force_activation'   => true, 
			'force_deactivation' => true, 
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'CyberMark Plugin', // The plugin name.
			'slug'               => 'cybermark-plugin', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/cybermark-plugin.zip', // The plugin source.
			'required'           => true, 
			'version'            => '2.0.0', 
			'force_activation'   => true, 
			'force_deactivation' => true, 
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'My Sites Search', 
			'slug'               => 'my-sites-search-master', 
			'source'             => get_template_directory() . '/lib/plugins/my-sites-search-master.zip', 
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'Admin Menu Editor Pro', // The plugin name.
			'slug'               => 'admin-menu-editor-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/admin-menu-editor-pro.zip', // The plugin source.
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'Advanced Custom Fields PRO', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'Gravity Forms Pro', 
			'slug'               => 'gravityforms', 
			'source'             => get_template_directory() . '/lib/plugins/gravityforms.zip', 
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'Smush Pro', 
			'slug'               => 'wp-smush-pro', 
			'source'             => get_template_directory() . '/lib/plugins/wp-smush-pro.zip',
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'WP Defender', 
			'slug'               => 'wp-defender', 
			'source'             => get_template_directory() . '/lib/plugins/wp-defender.zip', 
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'Beehive', 
			'slug'               => 'google-analytics-async', 
			'source'             => get_template_directory() . '/lib/plugins/google-analytics-async.zip', 
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'               => 'AME Branding Add On', 
			'slug'               => 'ame-branding-add-on', 
			'source'             => get_template_directory() . '/lib/plugins/ame-branding-add-on.zip', 
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => true,
		),
		array(
			'name'      => 'NS Cloner – Site Copier',
			'slug'      => 'ns-cloner-site-copier',
			'required'  => true,
		),
		array(
			'name'      => 'WordPress Importer',
			'slug'      => 'wordpress-importer',
			'required'  => true,
		),

		array(
			'name'      => 'ACF Content Analysis for Yoast SEO ',
			'slug'      => 'acf-content-analysis-for-yoast-seo',
			'required'  => true,
		),


	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'cybermark',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}
