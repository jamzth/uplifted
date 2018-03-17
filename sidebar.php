<?php
/**
 * Load the appropriate sidebar for content being shown.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Show if exists, has widgets and is not disabled via post/page Layout Options
if ( uplifted_sidebar_enabled() ) : ?>

	<div id="uplifted-sidebar-right" role="complementary">

		<?php do_action( 'uplifted_before_sidebar_widgets' ); ?>

		<?php dynamic_sidebar( uplifted_sidebar_id() ); ?>

		<?php do_action( 'uplifted_after_sidebar_widgets' ); ?>

	</div>

<?php endif; ?>