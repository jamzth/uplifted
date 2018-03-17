<?php if ( has_nav_menu( 'top-left' ) ) {

    do_action( 'uplifted_before_top_left_menu' );

    wp_nav_menu(array(
        'theme_location'  => 'top-left',
        'container' => false,                           // remove nav container
        'container_class' => 'menu',           		    // class of container
        'menu_class' => 'top-bar-menu left',         	// adding custom nav class
        'before' => '',                                 // before each link <a>
        'after' => '',                                  // after each link </a>
        'link_before' => '',                            // before each link text
        'link_after' => '',                             // after each link text
        'depth' => 5,                                   // limit the depth of the nav
        'fallback_cb' => false,                         // fallback function (see below)
        'walker' => new top_bar_walker()
    ));

    do_action( 'uplifted_after_top_left_menu' );

} ?>