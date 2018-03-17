<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 *
 * @package Uplifted
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @uses uplifted_header_style()
 * @uses uplifted_admin_header_style()
 * @uses uplifted_admin_header_image()
 *
 */
function uplifted_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '222222',
		'width'                  => 300,
		'height'                 => 100,
		'flex-width'             => true,
		'flex-height'            => true,
		'admin-preview-callback' => 'uplifted_admin_header_image',
	);

	$args = apply_filters( 'uplifted_custom_header_args', $args );

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'uplifted_custom_header_setup' );

/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @return stdClass All properties represent attributes of the curent header image.
 */

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}

if ( ! function_exists( 'uplifted_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see uplifted_custom_header_setup().
 */
function uplifted_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	.title-area{
		overflow: hidden;
		height: 80px;
		line-height: 80px;
		position: relative;
		background: white;
		margin-bottom: 0;
		box-shadow: 0 0 1px 0 rgba(0, 0, 0, 0.2);
		font-size: 1em;
		margin: 0;
	}
	.title-area li{
		margin: 0;
		height: 80px;
		line-height: 80px;
	}
	.title-area #title{
		line-height: 80px;
		height: 80px;
		font-size: 1.0625em;
		margin: 0;
		padding: 0;
		font-family: "Asap", Verdana, Geneva, sans-serif;
	}
	.title-area #title a{
		padding: 0 26.66667px;
		color: #555555;
		font-size: 16px;
		font-weight: 100;
		text-decoration: none;
	}
	.title-area img{
		max-height: 65px;
		margin-left: 10px;
		vertical-align: middle;
	}
	</style>
<?php
}
endif; // uplifted_admin_header_style

/**
 * Enqueue fonts for custom header
 *
 */
function uplifted_admin_fonts($hook_suffix) {
    wp_enqueue_style( 'uplifted-fonts', uplifted_fonts_url() );
}
add_action('admin_print_styles-appearance_page_custom-header', 'uplifted_admin_fonts');


if ( ! function_exists( 'uplifted_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see uplifted_custom_header_setup().
 *
 */
function uplifted_admin_header_image() {

	$header_textcolor = get_header_textcolor();

	if( $header_textcolor != 'blank' || ! empty( $header_textcolor ) ){
	  echo "<style type='text/css' id='custom-header-textcolor'>.title-area #title a{ color: #$header_textcolor; } </style>";
	}

	?>

	<ul class="title-area">
		<li class="name">
			<h1 id="title">
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
			<?php endif; ?>
			<?php if( display_header_text() ): ?>
				<a class="title" href="#"><?php bloginfo('name'); ?></a>
			<?php endif; ?>
			</h1>
		</li>
	</ul>

<?php }
endif; // uplifted_admin_header_image