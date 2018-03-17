<?php
/**
 * This loops to show one or multiple posts using content-*.php templates.
 *
 * It is used by index.php, uplifted_loop_after_content() and can be used elsewhere.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<?php do_action('uplifted_before_loop'); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php ctfw_get_content_template(); // load content-*.php according to post type and post format ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php do_action('uplifted_after_loop'); ?>
