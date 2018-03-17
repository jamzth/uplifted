<?php
/**
 * The sidebar containing the first footer widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package Uplifted
 * @since 1.0
 */
?>

<?php if ( is_active_sidebar( 'uplifted-footer-column-two' ) ) : ?>

    <?php do_action( 'uplifted_before_footer_column_two' ); ?>

	<?php dynamic_sidebar( 'uplifted-footer-column-two' ); ?>

    <?php do_action( 'uplifted_after_footer_column_two' ); ?>

<?php endif; ?>