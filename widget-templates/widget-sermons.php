<?php
/**
 * Sermons Widget Template
 *
 * Produces output for appropriate widget class in framework.
 * $this, $instance (sanitized field values) and $args are available.
 *
 * $this->ctfw_get_posts() can be used to produce a query according to widget field values.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// HTML Before
echo $args['before_widget'];

// Title
$title = apply_filters( 'widget_title', $instance['title'] );
if ( ! empty( $title ) ) {
	echo $args['before_title'] . $title . $args['after_title'];
}

// Get posts
$posts = $this->ctfw_get_posts(); // widget's default query according to field values

// Loop Posts
$i = 0;
foreach ( $posts as $post ) : setup_postdata( $post ); $i++;

	// Get sermon meta data
	// $has_full_text		True if full text of sermon was provided as post content
	// $video_player		Embed code generated from uploaded file, URL for file on other site, page on oEmbed-supported site such as YouTube, or manual embed code (HTML or shortcode)
	// $video_download_url 	URL for download link (available only for local files, "Save As" will be forced)
	// $audio_player		Same as video
	// $audio_download_url 	Same as video
	// $pdf_download_url 	URL for download link (local or externally hosted, but "Save As" forced only if local)
	extract( ctfw_sermon_data() );

?>

	<article <?php post_class( 'uplifted-widget-entry uplifted-sermons-widget-entry uplifted-clearfix' . ( 1 == $i ? ' uplifted-widget-entry-first' : '' ) ); ?>>

		<header class="uplifted-clearfix">

			<?php if ( $instance['show_image'] && has_post_thumbnail() ) : ?>
				<div class="uplifted-widget-entry-thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'uplifted-thumb-small', array( 'class' => 'uplifted-image' ) ); ?></a>
				</div>
			<?php endif; ?>

			<h1 class="uplifted-widget-entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

			<ul class="uplifted-widget-entry-meta uplifted-clearfix">

				<?php if ( $instance['show_date'] ) : ?>
					<li class="uplifted-widget-entry-date uplifted-sermons-widget-entry-date">
						<time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php ctfw_post_date(); ?></time>
					</li>
				<?php endif; ?>

				<?php if ( $instance['show_speaker'] && $speakers = get_the_term_list( $post->ID, 'ctc_sermon_speaker', '', __( ', ', 'uplifted' ) ) ) : ?>
					<li class="uplifted-widget-entry-byline uplifted-sermons-widget-entry-speakers">
						<?php printf( _x( 'by %s', 'widget', 'uplifted' ), $speakers ); ?>
					</li>
				<?php endif; ?>

				<?php if ( $instance['show_topic'] && $topics = get_the_term_list( $post->ID, 'ctc_sermon_topic', '', __( ', ', 'uplifted' ) ) ) : ?>
					<li class="uplifted-sermons-widget-entry-topics">
						<?php echo $topics; ?>
					</li>
				<?php endif; ?>

				<?php if ( $instance['show_book'] && $books = get_the_term_list( $post->ID, 'ctc_sermon_book', '', __( ', ', 'uplifted' ) ) ) : ?>
					<li class="uplifted-sermons-widget-entry-books">
						<?php echo $books; ?>
					</li>
				<?php endif; ?>

				<?php if ( $instance['show_series'] && $series = get_the_term_list( $post->ID, 'ctc_sermon_series', '', __( ', ', 'uplifted' ) ) ) : ?>
					<li class="uplifted-sermons-widget-entry-series">
						<?php echo $series; ?>
					</li>
				<?php endif; ?>

			</ul>

		</header>

		<?php if ( get_the_excerpt() && ! empty( $instance['show_excerpt'] )): ?>
			<div class="uplifted-widget-entry-content">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>

	</article>

<?php

// End Loop
endforeach;

// No items found
if ( empty( $posts ) ) {

	?>
	<div>
		<?php _ex( 'There are no sermons to show.', 'sermons widget', 'uplifted' ); ?>
	</div>
	<?php

}

// HTML After
echo $args['after_widget'];
