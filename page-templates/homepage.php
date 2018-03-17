<?php
/* Template Name: Homepage */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

$up_options = upfw_get_options();

// Header
get_header();

// Start loop
while ( have_posts() ) : the_post();

?>

<div id="uplifted-home-content"<?php // adding classes to home content container allows layout to be adjusted via stylesheet

	$home_classes = array();

	// Any slides?
	if ( ! is_active_sidebar( 'ctcom-home-slider' )  ) { // no slides used
		$no_slider = true;
		$home_classes[] = 'uplifted-no-slider';
	}

	// Any highlights?
	if ( ! is_active_sidebar( 'ctcom-home-highlights' )  ) { // no highlights used
		$no_highlights = true;
		$home_classes[] = 'uplifted-no-highlights';
	}

	// Any intro content?
	if ( ! ctfw_has_content() && ! ctfw_has_title() ) { // no home intro used
		$no_intro = true;
		$home_classes[] = 'uplifted-no-intro';
	}

	// Add classes to content container
	if ( ! empty( $home_classes ) ) { // output class attribute and values
		echo ' class="' . implode( ' ', $home_classes ) . '"';
	}

?>>

	<?php if ( empty( $no_slider ) || empty( $no_highlights ) ) : ?>

		<div id="uplifted-slider-boxes" class="uplifted-clearfix">

			<?php if ( empty( $no_slider ) ) : ?>

				<?php if( isset( $up_options->slider_format ) && $up_options->slider_format == 'boxed' ): ?>
					<div class="uplifted-boxed-slider">
						<div class="uplifted-boxed-slider-inner">
				<?php endif; ?>

				<?php get_sidebar( 'home-slider' ); ?>

				<?php if( isset( $up_options->slider_format ) && $up_options->slider_format == 'boxed' ): ?>
						</div><!--.uplifted-boxed-sider-inner-->
					</div><!--.uplifted-boxed-sider-->
				<?php endif; ?>

			<?php endif; ?>

			<?php if ( empty( $no_highlights ) ) : ?>
			<?php get_sidebar( 'home-highlights' ); ?>
			<?php endif; ?>

		</div>

	<?php endif; ?>

	<?php if ( empty( $no_intro ) ) : ?>

		<div class="uplifted-intro-wrapper">

			<section id="uplifted-intro"<?php if ( get_the_title() ) : ?> class="uplifted-intro-has-heading"<?php endif; ?>>

				<div id="uplifted-intro-inner">

					<div class="panel">

						<?php if ( ctfw_has_title() ) : ?>
						<h1 id="uplifted-intro-heading"><?php the_title(); ?></h1>
						<?php endif; ?>

						<?php if ( ctfw_has_content() ) : ?>
						<div id="uplifted-intro-content">
							<?php the_content(); ?>
						</div>
						<?php endif; ?>

					</div>

				</div>

			</section>

		</div><!-- /uplifted-intro-wrapper -->

	<?php endif; ?>

	<?php get_sidebar( 'home-bottom' ); ?>

</div>

<?php

// End loop
endwhile;

// Footer
get_footer();