<?php if ( has_nav_menu( 'top-right' ) ) {

    do_action( 'uplifted_before_top_right_menu' );

    wp_nav_menu(array(
        'theme_location'   => 'top-right',             // location for this menu
        'container'        => false,                   // remove nav container
        'container_class'  => 'menu',                  // class of container
        'menu_class'       => 'top-bar-menu right',    // adding custom nav class
        'depth'            => 5,                       // limit the depth of the nav
        'walker'           => new top_bar_walker()     // custom nav walker for Foundation topbar
    ));

    do_action( 'uplifted_after_top_right_menu' );

} ?>