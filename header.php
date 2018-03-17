<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Uplifted
 * @since 1.0.0
 */

$up_options = upfw_get_options();

//get_current_template(true);

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

<?php if( isset( $up_options->favicon ) && $up_options->favicon ): ?>
<link rel="icon" type="image/png" href="<?php echo $up_options->favicon; ?>">
<?php endif; ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div id="wrapper">

	<?php do_action('uplifted_before_header'); ?>

	<header id="masthead">

		<?php do_action('uplifted_before_topbar_container'); ?>

		<div class="top-bar-container<?php uplifted_sticky_navbar(); ?>">

				<?php do_action('uplifted_before_topbar'); ?>

				<nav class="top-bar">

					<?php do_action('uplifted_before_site_title'); ?>

					<ul class="title-area">
						<li class="name">
							<h1 id="title">
								<a class="title" href="<?php echo esc_attr( home_url('/') ); ?>">
								<?php $header_image = get_header_image();
								if ( ! empty( $header_image ) ) : ?>
									<img src="<?php echo esc_attr( $header_image ); ?>" alt="" class="<?php if ( '1' != get_theme_mod( 'header_image_mobile', true ) ) { echo "hide-on-mobile"; } ?>" />
								<?php endif; ?>
								<?php if( display_header_text() ): ?>
									<span class="<?php if ( ! get_theme_mod( 'header_text_mobile' ) ) { echo "hide-on-mobile"; } ?>"><?php bloginfo('name');?></span>
								<?php endif; ?>
								</a>
							</h1>
						</li>
						<li class="toggle-topbar menu-icon"><a href="#"><span><?php _e('Menu','uplifted'); ?></span></a></li>
					</ul>

					<?php do_action('uplifted_after_site_title'); ?>

					<section class="top-bar-section uplifted-nav-menu">
						<?php do_action('uplifted_before_topleft_menu'); ?>
						<?php get_template_part('menu','topleft'); ?>
						<?php do_action('uplifted_after_topleft_menu'); ?>

						<?php do_action('uplifted_before_topright_menu'); ?>
						<?php get_template_part('menu','topright'); ?>
						<?php do_action('uplifted_afte_topright_menu'); ?>
					</section>
				</nav>

				<?php do_action('uplifted_after_topbar'); ?>

		</div>

		<?php do_action('uplifted_after_topbar_container'); ?>

	</header>

	<?php do_action('uplifted_after_header'); ?>

	<?php uplifted_breadcrumbs( 'content' ); ?>

	<div id="container">