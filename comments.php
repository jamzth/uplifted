<?php
/**
 * List Comments and Form
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Show comments only on single posts and pages
if ( ! is_singular() || uplifted_loop_after_content_used() ) {
	return;
}

// If comments are closed and none have been made, hide the whole comment section
if ( ! have_comments() && ! comments_open() ) {
	return;
}

?>

<section id="comments" class="uplifted-content-block"><?php // #comments is hardcoded in WP core comments_popup_link(), so no uplifted- prefix ?>

	<?php
	// Show message if post is password protected
	if ( post_password_required() ) :
	?>

		<h1 id="uplifted-comments-title" class="uplifted-main-title">
			<?php _ex( 'Comments', 'password protected', 'uplifted' ); ?>
		</h1>

		<p>
			<?php _e( 'Enter the password above to view any comments.', 'uplifted' ); ?>
		</p>

	<?php
	// Show comments if not password protected
	else :
	?>

		<h1 id="uplifted-comments-title" class="uplifted-main-title">
			<?php
			printf(
				_n( 'One Comment', '%1$s Comments', get_comments_number(), 'uplifted' ), // title for 1 comment, title for 2+ comments
				number_format_i18n( get_comments_number() )
			);
			?>
		</h1>

		<?php
		// List comments
		if ( have_comments() ) :
		?>

			<ol class="uplifted-comments">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use _s_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define _s_comment() and that will be used instead.
					 * See _s_comment() in functions.php for more.
					 */
					wp_list_comments( array( 'callback' => 'uplifted_comment' ) );
				?>
			</ol>

			<?php
			// Comment navigation
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
				<nav class="uplifted-nav-left-right uplifted-clearfix" id="uplifted-comment-nav">
					<div class="uplifted-nav-left"><?php previous_comments_link( sprintf( __( ' %s Older Comments', 'uplifted' ) ) ); ?></div>
					<div class="uplifted-nav-right"><?php next_comments_link( sprintf( __( 'Newer Comments %s', 'uplifted' ) ) ); ?></div>
				</nav>
			<?php endif; ?>

		<?php endif; ?>

		<?php
		// Comments open
		if ( comments_open() ) : // show if comments not closed
		?>

			<?php
			// Show form
			comment_form( array(
				'title_reply'			=> _x( 'Add a Comment', 'comment form', 'uplifted' ),
				'title_reply_to'		=> __( 'Add a Reply to %s', 'uplifted' ),
				'cancel_reply_link'		=> _x( 'Cancel', 'comment form', 'uplifted' ),
				'label_submit'			=> _x( 'Add Comment', 'comment form', 'uplifted' )
			) );
			?>

		<?php
		// Comments closed
		else :
		?>

		<p id="uplifted-comments-closed">
			<?php _e( 'Commenting has been turned off.', 'uplifted' ); // Show message if comments closed ?>
		</p>

		<?php endif; ?>

	<?php endif; ?>

</section>
