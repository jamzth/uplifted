<?php
/**
 * Theme Options
 *
 * Contains arrays and functions utilized by our theme for customizations.
 *
 * @package    Uplifted
 * @subpackage Includes
 * @copyright  Copyright (c) 2014, upthemes.com
 * @link       https://upthemes.com/themes/uplifted
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      1.0
 */

$appearance = array(
	"name" => "appearance",
	"title" => __("Appearance",'uplifted'),
	'sections' => array(
		'colors' => array(
			'name' => 'colors',
			'title' => __( 'Colors', 'uplifted' ),
			'description' => __( 'Custom colors for this theme.','uplifted' )
		)
	)
);

register_theme_option_tab($appearance);

/**
 * Custom color option array.
 */
$color_options = array(
	"enable_custom_styles" => array(
		"tab" => "appearance",
		"name" => "enable_custom_styles",
		"title" => "Enable Custom Styles",
		"description" => __( "Do you want to enable custom styles?", 'uplifted' ),
		"section" => "colors",
		"since" => "1.0",
		"id" => "colors",
		"type" => "select",
		"default" => "no",
		"valid_options" => array(
			"yes" => array(
				"name" => "yes",
				"title" => __( "Yes", 'uplifted' )
			),
			"no" => array(
				"name" => "no",
				"title" => __( "No", 'uplifted' )
			),
		),
	),
	"color_scheme_toggle" => array(
		"tab" => "appearance",
		"name" => "color_scheme_toggle",
		"title" => "Custom Color Type",
		"description" => __( "Do you want to select a pre-defined color scheme or define your own colors?", 'uplifted' ),
		"section" => "colors",
		"since" => "1.0",
		"id" => "colors",
		"type" => "radio",
		"default" => "scheme",
		"valid_options" => array(
			"scheme" => array(
				"name" => "scheme",
				"title" => __( "Pre-defined color schemes", 'uplifted' )
			),
			"hex" => array(
				"name" => "hex",
				"title" => __( "My own colors", 'uplifted' )
			),
		),
	),
);

/**
 * Register our custom color options in the UpThemes Framework.
 */
register_theme_options($color_options);


/**
 * Custom color option array.
 */
$custom_styles = array(
	"color_schemes" => array(
		"tab" => "appearance",
		"name" => "color_schemes",
		"title" => "Color Schemes",
		"description" => __( "Select the color scheme you want to use.", 'uplifted' ),
		"section" => "colors",
		"since" => "1.0",
		"id" => "colors",
		"type" => "colors",
		"default" => "scheme_1",
		"valid_options" => array(
			"scheme_1" => array(
				"name" => "scheme_1",
				"title" => __( "Color Scheme #1", 'uplifted' ),
				"colors" => array(
					"primary"	=> '#0fcfc5',
					"secondary"	=> '#e8665a',
					"panel"	=> '#ffffff',
					"background"	=> '#f8f9fb',
				)
			),
			"scheme_2" => array(
				"name" => "scheme_2",
				"title" => __( "Color Scheme #2", 'uplifted' ),
				"colors" => array(
					"primary"	=> '#acbb70',
					"secondary"	=> '#c3d47f',
					"panel"	=> '#555555',
					"background"	=> '#333333',
				)
			),
			"scheme_3" => array(
				"name" => "scheme_3",
				"title" => __( "Color Scheme #3", 'uplifted' ),
				"colors" => array(
					"primary"	=> '#97e2b1',
					"secondary"	=> '#e55b2c',
					"panel"	=> '#fbfbfb',
					"background"	=> '#232e2e',
				)
			),
			"scheme_4" => array(
				"name" => "scheme_4",
				"title" => __( "Color Scheme #4", 'uplifted' ),
				"colors" => array(
					"primary"	=> '#4e526a',
					"secondary"	=> '#d97159',
					"panel"	=> '#ebe9e7',
					"background"	=> '#f7f6f5',
				)
			),
			"scheme_5" => array(
				"name" => "scheme_5",
				"title" => __( "Color Scheme #5", 'uplifted' ),
				"colors" => array(
					"primary"	=> '#e65e2d',
					"secondary"	=> '#ae956b',
					"panel"	=> '#efefef',
					"background"	=> '#e1dfe0',
				)
			)
		)
	)
);

register_theme_options($custom_styles);

/**
 * Custom color option array.
 */
$custom_hex_colors = array(
	"primary_color" => array(
		"tab" => "appearance",
		"name" => "primary_color",
		"title" => "Primary Color",
		"description" => __( "The primary color will be used for link and button highlights, accents, and active states.", 'uplifted' ),
		"section" => "colors",
		"since" => "1.0",
		"id" => "colors",
		"type" => "color",
		"default" => "0fcfc5",
	),
	"secondary_color" => array(
		"tab" => "appearance",
		"name" => "secondary_color",
		"title" => "Secondary Color",
		"description" => __( "The secondary color will be used to signify clickable items like links, headings, and buttons.", 'uplifted' ),
		"section" => "colors",
		"since" => "1.0",
		"id" => "colors",
		"type" => "color",
		"default" => "e8665a",
	),
	"panel_color" => array(
		"tab" => "appearance",
		"name" => "panel_color",
		"title" => "Panel Color",
		"description" => __( "The panel color is the background color of the navigation bar, widgets, and the main content area. If the Panel color is set to a light color the text inside will be dark, if the Panel color is set to a darker color the text inside will be white.", 'uplifted' ),
		"section" => "colors",
		"since" => "1.0",
		"id" => "colors",
		"type" => "color",
		"default" => "ffffff",
	),
	"background_color" => array(
		"tab" => "appearance",
		"name" => "background_color",
		"title" => "Background Color",
		"description" => __( "Select your background color for this site.", 'uplifted' ),
		"section" => "colors",
		"since" => "1.0",
		"id" => "colors",
		"type" => "color",
		"default" => "f8f9fb",
	),
);

register_theme_options($custom_hex_colors);

$options = array(
	"layout" => array(
		"tab" => "general",
		"name" => "layout",
		"title" => "Theme Layout",
		"description" => __( "Select the layout you want to use.", 'uplifted' ),
		"section" => "appearance",
		"since" => "1.0",
		"id" => "appearance",
		"type" => "radio_image",
		"default" => "default",
		"valid_options" => array(
			"default" => array(
				"name" => "default",
				"image" => upfw_get_theme_options_directory_uri() . "images/layouts/right_sidebar.gif",
				"title" => __( "Sidebar on the Right", 'uplifted' )
			),
			"reversed" => array(
				"name" => "reversed",
				"image" => upfw_get_theme_options_directory_uri() . "images/layouts/left_sidebar.gif",
				"title" => __( "Sidebar on the Left", 'uplifted' )
			)
		)
	),
	'favicon' => array(
		'tab' => 'general',
		"name" => "favicon",
		"title" => "Favicon",
		'description' => __( 'Select a 16x16 favicon for your site.', 'uplifted' ),
		'section' => 'appearance',
		'since' => '1.0',
		"id" => "appearance",
		"type" => "upload"
	),
	"show_breadcrumbs" => array(
		"tab" => "general",
		"name" => "show_breadcrumbs",
		"title" => "Show Breadcrumbs?",
		"description" => __( "Do you want to enable breadcrumbs?", 'uplifted' ),
		"section" => "appearance",
		"since" => "1.0",
		"id" => "appearance",
		"type" => "select",
		"default" => 'enabled',
		"valid_options" => array(
			"enabled" => array(
				"name" => "enabled",
				"title" => __( "Enabled", 'uplifted' )
			),
			"disabled" => array(
				"name" => "disabled",
				"title" => __( "Disabled", 'uplifted' )
			)
		)
	),
	"sticky_navbar" => array(
		"tab" => "general",
		"name" => "sticky_navbar",
		"title" => "Sticky Navbar",
		"description" => __( "Toggle this option to enable or disable the sticky navbar.", 'uplifted' ),
		"section" => "appearance",
		"since" => "1.0",
		"id" => "appearance",
		"type" => "select",
		"default" => 'enabled',
		"valid_options" => array(
			"enabled" => array(
				"name" => "enabled",
				"title" => __( "Enabled", 'uplifted' )
			),
			"disabled" => array(
				"name" => "disabled",
				"title" => __( "Disabled", 'uplifted' )
			)
		)
	),
);

register_theme_options($options);

$general = array(
	"name" => "general",
	"title" => __("General",'uplifted'),
	'sections' => array(
		'appearance' => array(
			'name' => 'appearance',
			'title' => __( 'Appearance', 'uplifted' ),
			'description' => __( 'Modify the visual appearance of the theme.','uplifted' )
		),
		'text' => array(
			'name' => 'text',
			'title' => __( 'Text', 'uplifted' ),
			'description' => __( 'Modify text parts displayed within the theme.','uplifted' )
		)
	)
);

register_theme_option_tab($general);

$options = array(

	"footertext" => array(
		"tab" => "general",
		"name" => "footertext",
		"title" => "Footer Text",
		"description" => __( "Text to be displayed in the footer.", 'uplifted' ),
		"section" => "text",
		"since" => "1.0",
		"id" => "text",
		"type" => "textarea",
		"default" => "Copyright ".date('Y')." ".get_bloginfo('name').". All Rights Reserved."
	),
	"ctc_message" => array(
		"tab" => "general",
		"name" => "ctc_message",
		"title" => "Header Text Message",
		"description" => __( "Text displayed in the header.", 'uplifted' ),
		"section" => "text",
		"since" => "1.0",
		"id" => "text",
		"type" => "textarea",
		"default" => "Join us for service at 9AM and 10:30AM this Sunday."
	),
	"slider_format" => array(
		"tab" => "general",
		"name" => "slider_format",
		"title" => "Slider Format",
		"description" => __( "Choose between a full-width or fixed-width (boxed) layout for the homepage slider.", 'uplifted' ),
		"section" => "appearance",
		"since" => "1.0",
		"id" => "appearance",
		"type" => "select",
		"default" => 'full_width',
		"valid_options" => array(
			"full_width" => array(
				"name" => "full_width",
				"title" => __( "Full Width", 'uplifted' )
			),
			"boxed" => array(
				"name" => "boxed",
				"title" => __( "Boxed", 'uplifted' )
			)
		)
	),
	"show_search" => array(
		"tab" => "general",
		"name" => "show_search",
		"title" => "Show Search Box?",
		"description" => __( "Choose where to display a search box or hide it completely.", 'uplifted' ),
		"section" => "appearance",
		"since" => "1.0",
		"id" => "appearance",
		"type" => "select",
		"default" => 'full_width',
		"valid_options" => array(
			"none" => array(
				"name" => "none",
				"title" => __( "None", 'uplifted' )
			),
			"top-left" => array(
				"name" => "top-left",
				"title" => __( "In Top Left Menu", 'uplifted' )
			),
			"top-right" => array(
				"name" => "top-right",
				"title" => __( "In Top Right Menu", 'uplifted' )
			),
			"ctc-menu" => array(
				"name" => "ctc-menu",
				"title" => __( "In Secondary Menu", 'uplifted' )
			)

		)
	),


);

register_theme_options($options);

/**
 * Adds a theme layout based on selected admin option
 *
 * @param 	array $body_class Body classes for current page/template.
 * @uses 	function upfw_get_options() Gets current array of options as a stdobj.
 * @return 	array $body_class Body classes for current page/template.
 */
function uplifted_set_layout($body_class){

	$up_options = upfw_get_options();

	if( isset($up_options->layout) && $up_options->layout ){

		$body_class[] = "layout_" . esc_attr($up_options->layout);

	}

	return $body_class;

}

add_filter('body_class','uplifted_set_layout');

/**
 * Outputs theme footer option text.
 *
 */
function uplifted_theme_footer() {

	$up_options = upfw_get_options();

	echo apply_filters('footertext',$up_options->footertext);

}

/**
 * Adds a class of "fixed" to the navbar.
 *
 * @global	array $up_options Array of theme options.
 */
function uplifted_sticky_navbar(){
	global $up_options;

	if( $up_options->sticky_navbar == 'enabled' ){
		echo ' fixed';
	}
}

/**
 * Add customizer options for header image and text on mobile
 */

function uplifted_header_image_text_mobile( $wp_customize ) {

	/**
	 * Option to Display Header Text on Mobile
	 */

	$wp_customize->add_setting( 'header_text_mobile' , array(
		    'default'     => '1',
		    'sanitize_callback' => 'ctfw_customize_sanitize_checkbox'
		) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_text_mobile', array(
		'label'        => __( 'Display Header Text on Mobile', 'uplifted' ),
		'section'    => 'title_tagline',
		'settings'   => 'header_text_mobile',
		'type'			 => 'checkbox'
	) ) );

	/**
	 * Option to Display Header Image on Mobile
	 */

	$wp_customize->add_setting( 'header_image_mobile' , array(
	    'default'     => '1',
	    'sanitize_callback' => 'ctfw_customize_sanitize_checkbox'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_image_mobile', array(
		'label'        => __( 'Display Header Image on Mobile', 'uplifted' ),
		'section'    => 'header_image',
		'settings'   => 'header_image_mobile',
		'type'			 => 'checkbox'
	) ) );
}

add_action( 'customize_register', 'uplifted_header_image_text_mobile' );