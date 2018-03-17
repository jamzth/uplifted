<?php
/**
 * Image Functions
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

/***********************************************
 * IMAGE SIZES
 ***********************************************/

/**
 * Add image sizes
 *
 * @since 1.0
 */
function uplifted_image_sizes() {

	/*********************************
	 * THUMBNAILS
	 *********************************/

	// Default Thumbnail (post-thumbnail)
	// Shown by post title on short, full and widget entries
	// (large enough for spanning width of screen on phones; shown at 180x180 on desktop)
	set_post_thumbnail_size( 400, 400, true ); // crop for exact size

	// Small Thumbnail
	// Used in widgets (400x400 to 55x55 too much for browser scaling)
	// 100x100 looks good on both Retina and standard displays
	add_image_size( 'uplifted-thumb-small', 100, 100, true ); // crop for exact size

	/*********************************
	 * HEADER IMAGES
	 *********************************/

	// Slider Image (Widget)
	add_image_size( 'uplifted-slide', 1400, 600, true ); // crop for exact size

	// Custom Post Header Size
	add_image_size( 'uplifted-post-header', 1090, 639, true ); // crop for exact size

	/*********************************
	 * RECTANGULAR IMAGES
	 *********************************/

	// Large Thumbnail (Highlight Widget, Gallery Widget - Large)
	// Just wide enough for one widget per row while responsive
	add_image_size( 'uplifted-rect-large', 600, 410, true ); // crop for exact size

	// Medium Thumbnail (Gallery Widget - Medium)
	add_image_size( 'uplifted-rect-medium', 320, 218, true ); // crop for exact size

	// Small Thumbnail (Gallery Widget - Small)
	add_image_size( 'uplifted-rect-small', 220, 150, true ); // crop for exact size

}

add_action( 'after_setup_theme', 'uplifted_image_sizes', 9 ); // before uplifted_add_theme_support_framework() so it can use ctfw_image_size_dimensions()

/**
 * Set content width
 *
 * This affect maximum embed and image sizes.
 * On front end CSS handles most of this but content editor also uses.
 *
 * Keep an eye on this for possible future add_theme_support() implementation:
 * http://core.trac.wordpress.org/ticket/21256
 *
 * @since 1.0
 * @global int $content_width
 */
function uplifted_set_content_width() {

	global $content_width;

	if ( ! isset( $content_width ) ) {

		// Full page content
		$content_width = 1120;

		// Sideabar is used
		if ( uplifted_sidebar_enabled() ) {
			$content_width = 717;
		}

	}

}

add_action( 'wp', 'uplifted_set_content_width' );

/**
 * Set content width
 *
 * This affect maximum embed and image sizes.
 * On front end CSS handles most of this but content editor also uses.
 *
 * Keep an eye on this for possible future add_theme_support() implementation:
 * http://core.trac.wordpress.org/ticket/21256
 *
 * @since 1.0
 * @global int $content_width
 */
function uplifted_modify_post_image_size($image_size){
	global $post;

	if( is_archive() && get_post_type($post) == 'ctc_person' ){
		return $image_size;
	} else {
		return 'uplifted-post-header';
	}

}

add_filter('uplifted_post_image_size', 'uplifted_modify_post_image_size');