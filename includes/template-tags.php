<?php
/**
 * Template Tags
 *
 * These output common elements for different post types. Use in content-*.php templates.
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

/********************************
 * TITLE
 ********************************/

/**
 * Post title for full or short
 *
 * If short/multiple view (not singular), title is linked.
 *
 * @since 1.0
 * @return string Post title with page number or linked
 */
function uplifted_post_title() {

	// Full/Single - Not Linked
	if ( is_singular( get_post_type() ) ) {
		$title = uplifted_title_paged( false, 'return' ); // show with (Page #) if multipage
	}

	// Short/Multiple - Linked
	else {
		$title = '<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( the_title_attribute( array( 'echo' => false ) ) ) . '">' . get_the_title() . '</a>';
	}

	echo apply_filters( 'uplifted_post_title', $title );

}

/**
 * Adds a class to the body if the page has a sidebar or not.
 *
 * @param 	$body_classes All body classes for current template/page.
 * @uses 	uplifted_sidebar_enabled()
 * @return 	array Full list of body classes.
 */
function uplifted_sidebar_body_class($body_classes){
	$body_classes[] = uplifted_sidebar_enabled() ? 'uplifted-has-sidebar' : 'uplifted-no-sidebar';

	return $body_classes;
}

add_filter('body_class','uplifted_sidebar_body_class');

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Asap by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since 1.0
 * @return string Font stylesheet or empty string if disabled.
 */
function uplifted_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Asap or Oswald, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$asap = _x( 'on', 'Asap font: on or off', 'uplifted' );

	$oswald = _x( 'on', 'Oswald font: on or off', 'uplifted' );

	if ( 'off' !== $asap && 'off' !== $oswald ) {
		$font_families = array();

		if ( 'off' !== $asap )
			$font_families[] = 'Asap:400,700';

		if ( 'off' !== $oswald )
			$font_families[] = 'Oswald:300,400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}


/**
 * Output page title with "(Page #)" as needed
 *
 * @since 1.0
 * @param string $title Title of page
 * @param bool $return Return or echo title with page number
 * @return string Page title woth number if not echoing
 */
function uplifted_title_paged( $title = '', $return = false ) {

	// Default title if none passed in
	if ( empty( $title ) ) {
		$title = get_the_title();
	}

	// Get page number
	$show_number = ctfw_page_num();

	// Title format if on page 2 or greater
	/* translators: %s is page title, %d is page number */
	if ( $show_number > 1 ) {
		$title_paged = sprintf( __( '%s <span>(Page %d)</span>', 'uplifted' ), $title, $show_number );
	}

	// Default title for Page 1 (or no number found)
	else {
		$title_paged = $title;
	}

	// Make filterable
	$output = apply_filters( 'uplifted_title_paged', $title_paged, $title );

	// Echo or return
	if ( $return ) {
		return $output;
	} else {
		echo $output;
	}

}

/********************************
 * BREADCRUMBS
 ********************************/

/**
 * Output breadcrumb path
 *
 * @since 1.0
 * @param string $location $location is either content or banner
 */
function uplifted_breadcrumbs( $location ) {

	$upfw_options = upfw_get_options();

	$breadcrumbs = '';

	// Breadcrumbs are enabled
	if ( $upfw_options->show_breadcrumbs == 'enabled' ) {

		$breadcrumbs = new CTFW_Breadcrumbs();

	}

	// Return filtered
	echo apply_filters( 'uplifted_breadcrumbs', $breadcrumbs, $location );

}

/********************************
 * CONTENT
 ********************************/

/**
 * Post featured image for full or short
 *
 * If short/multiple view (not singular), image is linked.
 *
 * @since 1.0
 * @return string Featured image HTML
 */
function uplifted_post_image() {

	// Featured image
	$image = get_the_post_thumbnail( null, apply_filters('uplifted_post_image_size', 'uplifted-post-header'), array('class' => 'uplifted-image' ) );

	// Link if short / multiple
	if ( ! is_singular( get_post_type() ) ) {
		$image = '<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( the_title_attribute( array( 'echo' => false ) ) ) . '">' . $image . '</a>';
	}

	echo apply_filters( 'uplifted_post_image', $image );

}

/**
 * Comments showing?
 *
 * Useful for checking if comments link should be shown.
 *
 * @since 1.0
 * @return bool True if comments are to be shown
 */
function uplifted_show_comments() {

	$show = false;

	// True if comments open or closed but already have comments; hide if password protected
	if ( ( comments_open() || get_comments_number() > 0 ) && ! post_password_required() ) {
		$show = true;
	}

	return apply_filters( 'uplifted_show_comments', $show );

}

if ( ! function_exists( 'uplifted_comments_link' ) ) : // pluggable since not filterable
/**
 * Comments link
 *
 * @since 1.0
 */
function uplifted_comments_link() {

	// Show if comments open or closed but already have comments; hide if password protected
	if ( uplifted_show_comments() ) {

		$scroll_class = is_singular() ? 'uplifted-scroll-to-comments' : ''; // full post only

		comments_popup_link(
			__( '0 Comments', 'uplifted' ),
			__( '1 Comment', 'uplifted' ),
			__( '% Comments', 'uplifted' ),
			$scroll_class,
			'' // show nothing when comments off
		);

	}

}
endif;

if ( ! function_exists( 'uplifted_short_content' ) ) : // pluggable since not filterable
/**
 * Output excerpt or post content up until <!--more--> quicktag
 *
 * @since 1.0
 * @global object Post object
 */
function uplifted_short_content() {

	global $post;

	$post_format = get_post_format();

	// Author used <!--more--> quicktag
	if ( ctfw_has_more_tag() ) {

		// Make it work in pages / "loop after content"
		// See this: http://codex.wordpress.org/Customizing_the_Read_More#How_to_use_Read_More_in_Pages
		global $more;
		$more = 0;

		the_content( '' ); // no automatic "more" link; use footer template's link

	}

	// Show excerpt only
	else {
		the_excerpt();
	}

}
endif;

if ( ! function_exists( 'uplifted_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own uplifted_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function uplifted_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'uplifted' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'uplifted' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo '<div class="avatar-wrap">' . get_avatar( $comment, $avatar_size ) . '</div>';
					?>

					<?php edit_comment_link( __( 'Edit', 'uplifted' ), '<div class="edit-link">', '</div>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'uplifted' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content">
				<div class="author-name">
				<?php
				/* translators: 1: comment author, 2: date and time */
				printf( __( '%1$s <span class="says">says:</span>', 'uplifted' ),
					sprintf( '<span class="fn">%s</span>', get_comment_author_link() ));

				?>
			</div>
				<?php

				comment_text();

				printf( __( '%1$s', 'uplifted' ),
					sprintf( '<a class="comment-date" href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'uplifted' ), get_comment_date(), get_comment_time() )
					));

				?>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<span>&#171;</span> Reply', 'uplifted' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for uplifted_comment()
