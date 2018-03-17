<?php
/**
 * The following code enables us to recommend some plugins that work well or are
 * required for this theme to be more awesome.
 *
 * @author     Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'uplifted_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function uplifted_register_required_plugins() {

	/**
	 * Array of plugin arrays.
	 */
	$plugins = array(

		array(
			'name'    		=> 'MP Stacks',
			'slug'    		=> 'mp-stacks',
			'source' 		=> 'http://moveplugins.com/repo/mp-stacks/?downloadfile=true',
			'required'  	=> false,
			'external_url'	=> 'https://github.com/moveplugins/mp-stacks',
		),

		array(
			'name'    		=> 'The Events Calendar',
			'slug'    		=> 'the-events-calendar',
			'required'  	=> false,
		),

		array(
			'name'    		=> 'Live Composer',
			'slug'    		=> 'ds-live-composer',
			'source' 		=> 'https://upthemes.com/wp-content/uploads/edd/2014/05/ds-live-composer.zip',
			'required'  	=> false,
		),

	);

	$theme_text_domain = 'uplifted';

	$config = array(
		'domain'            => $theme_text_domain,
		'parent_menu_slug'  => 'themes.php',
		'parent_url_slug'   => 'themes.php',
		'menu'              => 'install-required-plugins',
		'has_notices'       => true,
		'is_automatic'      => false,
		'message'           => __('We recommend installing the following plugins that work with this theme to enhance your WordPress website.', $theme_text_domain ),
		'strings'           => array(
			'page_title'                            => __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                            => __( 'Install Plugins', $theme_text_domain ),
			'installing'                            => __( 'Installing Plugin: %s', $theme_text_domain ),
			'oops'                                  => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'           => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
			'notice_can_install_recommended'        => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
			'notice_cannot_install'                 => _n_noop( 'This theme works well with the %s plugin, however, you do not have the correct permissions to install it. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
			'notice_can_activate_required'          => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
			'notice_can_activate_recommended'       => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
			'notice_cannot_activate'                => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
			'notice_ask_to_update'                  => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
			'notice_cannot_update'                  => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
			'install_link'                          => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                         => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                                => __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                      => __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete'                              => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'                              => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
