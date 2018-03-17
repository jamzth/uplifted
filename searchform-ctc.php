<?php
/**
 * The template for displaying the header search form.
 *
 * @package Uplifted
 * @since 1.1.0
 */
?>
<li class="has-form">
	<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="row collapse">
			<div class="large-9 small-9 columns">
				<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search', 'uplifted' ); ?>">
    		</div>

			<div class="large-3 small-3 columns">
				<button type="submit" class="button expand"><span class="genericon genericon-search"></span><span class="screen-reader-text">Search</span></button>
			</div>
		</div>
	</form>
</li>