<?php
/**
 * The template for displaying the search form.
 *
 * Used to display a search form for most situations.
 *
 * @package Uplifted
 * @since 1.0.0
 */
?>

<?php do_action( 'uplifted_before_search_box' ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="row collapse">
		<div class="small-9 columns">
		  <input type="search" name="s" class="s" placeholder="<?php esc_attr_e("Search",'uplifted'); ?>" value="<?php the_search_query(); ?>"/>
		</div>
		<div class="small-3 columns">
			<button type="submit" class="prefix submit-image"><span class="genericon genericon-search"></span></button>
		</div>
	</div>
</form>

<?php do_action( 'uplifted_after_search_box' ); ?>
