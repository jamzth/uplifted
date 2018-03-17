<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #container and #wrapper div elements.
 *
 * @package WordPress
 * @subpackage Uplifted
 * @since 1.0.0
 */
?>
	</div><!-- /#container -->
	<div id="footer">
		<div class="row">

			<div class="small-12 large-4 columns">
			<?php get_template_part('sidebar-footer1'); ?>
			</div>

			<div class="small-12 large-4 columns">
			<?php get_template_part('sidebar-footer2'); ?>
			</div>

			<div class="small-12 large-4 columns">
			<?php get_template_part('sidebar-footer3'); ?>
			</div>

		</div><!-- /.row-->

	</div><!-- /#footer-->

	<div id="footer-meta">
		<div class="row">
			<div class="large-12 columns">
				<?php uplifted_theme_footer(); ?>
				<?php get_template_part('menu','social'); ?>
			</div>
		</div>
	</div><!-- /#footer-meta-->

</div><!-- /#wrapper -->

<?php wp_footer(); ?>

<script>
jQuery(document).foundation();
</script>

</body>
</html>