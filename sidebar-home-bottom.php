<?php
/**
 * Homepage Bottom Widgets "Sidebar"
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<?php if ( is_active_sidebar( 'ctcom-home-bottom' ) ) : ?>

    <?php do_action( 'uplifted_before_home_bottom_widgets' ); ?>

	<div id="uplifted-home-bottom-widgets">

		<div class="row">

			<?php dynamic_sidebar( 'ctcom-home-bottom' ); ?>

		</div>

	</div>

    <?php do_action( 'uplifted_after_home_bottom_widgets' ); ?>

<?php endif; ?>