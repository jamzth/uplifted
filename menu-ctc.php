<?php if ( has_nav_menu( 'ctc-menu' ) ) {

	do_action( 'uplifted_before_ctc_menu' );

	wp_nav_menu(
		array(
			'theme_location'  => 'ctc-menu',
			'container'       => 'div',
			'container_id'    => 'menu-ctc',
			'container_class' => 'ctc',
			'menu_id'         => 'menu-ctc-items',
			'menu_class'      => 'menu-items',
			'depth'           => 1,
		)
	);

	do_action( 'uplifted_after_ctc_menu' );

} ?>