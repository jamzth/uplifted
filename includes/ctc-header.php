<?php

/**
 * Church Theme Content header
 *
 * @package    Uplifted
 * @subpackage Includes
 * @copyright  Copyright (c) 2014, upthemes.com
 * @link       https://upthemes.com/themes/uplifted
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      1.0
 */

function uplifted_display_ctc_header_bar(){
	get_template_part( 'header', 'ctc' );
}

add_action( 'uplifted_before_topbar', 'uplifted_display_ctc_header_bar' );

/**
 * Register CTC nav menu location
 */
function uplifted_register_ctc_menu(){
	register_nav_menu( 'ctc-menu', 'Secondary Menu' );
}

add_action( 'after_setup_theme', 'uplifted_register_ctc_menu' );

/**
 * Add search form to CTC menu.
 */
function uplifted_add_search_to_ctc_menu( $items, $args ) {
	$up_options = upfw_get_options();

	if( $up_options->show_search === 'none' ){

		return $items;

	} elseif( $up_options->show_search === $args->theme_location ) {

		ob_start();
		get_template_part( 'searchform', 'ctc' );
		$search_form = ob_get_clean();

		$items = $search_form . $items;

	}

	return $items;

}

function uplifted_attach_search_box(){
	$up_options = upfw_get_options();

	if( $up_options->show_search !== 'none' ){
		add_filter( 'wp_nav_menu_items', 'uplifted_add_search_to_ctc_menu', 10 , 2 );
	}
}

add_action( 'after_setup_theme', 'uplifted_attach_search_box' );

/**
 * Add search form to CTC menu.
 */
function uplifted_add_message_to_ctc_menu( $items, $args ) {

	if( 'ctc-menu' === $args->theme_location ) {
		ob_start();
		get_template_part( 'ctc', 'message' );
		$message = ob_get_clean();

		$items .= $message;
	}

	return $items;

}

add_filter( 'wp_nav_menu_items', 'uplifted_add_message_to_ctc_menu', 10 , 2 );

