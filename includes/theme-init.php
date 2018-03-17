<?php
/**
 * WordPress Feature Support
 *
 * @package    Uplifted
 * @subpackage Includes
 * @copyright  Copyright (c) 2014, upthemes.com
 * @link       https://upthemes.com/themes/uplifted
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      1.0
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! isset( $content_width ) ){
	/**
	 * @param int $content_width The content width is used by WordPress to display various types of media at the proper size.
	 */
 	$content_width = 560;
}

// Remove Theme Options page to use Theme Customizer method instead
define('UPFW_NO_THEME_OPTIONS_PAGE',true);

/**
 * Automatic updater initialization
 *
 * Initialize our auto-update script and define constants.
 */
require_once trailingslashit( get_template_directory() ) . 'includes/UpThemes_Theme_Updater.php';

// Define variables for our theme updates
define('UPTHEMES_LICENSE_KEY','uplifted_theme');
define('UPTHEMES_ITEM_NAME', 'Uplifted Theme');
define('UPTHEMES_STORE_URL', 'https://upthemes.com');
define('UPTHEMES_DOWNLOAD_ID', 3599);
define('UPTHEMES_RENEWAL_URL', UPTHEMES_STORE_URL . '/checkout/?edd_action=add_to_cart&download_id=' . UPTHEMES_DOWNLOAD_ID);

/**
 * Check for available theme updates
 *
 */
function uplifted_theme_update_check(){

	$upthemes_license = trim( get_option( UPTHEMES_LICENSE_KEY ) );

	$edd_updater = new UpThemes_Theme_Updater(
		array(
			'remote_api_url'  => UPTHEMES_STORE_URL,  // Our store URL that is running EDD
			'license'         => $upthemes_license, // The license key (used get_option above to retrieve from DB)
			'item_name'       => UPTHEMES_ITEM_NAME,  // The name of this theme
			'author'          => 'UpThemes'
		)
	);
}
add_action('admin_init','uplifted_theme_update_check',1);

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function uplifted_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'uplifted_page_menu_args' );

/**
 * Register our nav menu locations
 *
 */
function uplifted_register_menus() {
	/**
	 * Register Menus
	 * http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
	 */
	register_nav_menus(array(
			'top-left' => 'Left Top Menu',
			'top-right' => 'Right Top Menu',
			'social'    => 'Social Menu',
	));
}

add_action('after_setup_theme','uplifted_register_menus');

/**
 * Enqueue required scripts and styles for theme
 *
 */
function uplifted_enqueue_scripts(){

	wp_enqueue_script( 'uplifted-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array('jquery') );
	wp_enqueue_script( 'uplifted-oembed', get_template_directory_uri() . '/assets/js/jquery.oembed.js', array('jquery'), false, true );
	wp_enqueue_script( 'uplifted-slidervids', get_template_directory_uri() . '/assets/js/jquery.sliderVids.js', array('jquery'), false, true );
	wp_enqueue_script( 'uplifted-init', get_template_directory_uri() . '/assets/js/init.js', array('uplifted-flexslider','uplifted-slidervids'), false, true );
	wp_enqueue_script( 'uplifted-foundation', get_template_directory_uri() . '/assets/js/foundation.js', array('jquery'), '5.0.0', true );
	wp_enqueue_script( 'uplifted-foundation-topbar', get_template_directory_uri() . '/assets/js/foundation.topbar.js', array('uplifted-foundation'), '5.0.0', true );

	wp_enqueue_style( 'uplifted-fonts', uplifted_fonts_url() );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/css/genericons.css' );
	wp_enqueue_style( 'uplifted-flexslider', get_template_directory_uri() . '/assets/css/flexslider-fonts.css' );

	wp_enqueue_style( 'uplifted-style', get_stylesheet_uri() );
	wp_style_add_data( 'uplifted-style', 'rtl', 'replace' );

}

add_action('wp_enqueue_scripts','uplifted_enqueue_scripts');

/**
 * Change map marker location from Church Theme Framework default.
 */
function uplifted_return_map_marker($map_icon_url){
	return get_template_directory_uri() . '/assets/images/map-icon.png';
}

add_filter('ctfw_maps_icon_color_file','uplifted_return_map_marker',999);
add_filter('ctfw_maps_icon_shadow_color_file','uplifted_return_map_marker',999);