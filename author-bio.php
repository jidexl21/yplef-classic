<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage Yplef_Classic
 * @since Yplef Classic 1.0
 */
?>

<div class="author-info">
	<h2 class="author-heading"><?php _e( 'Published by', 'yplefclassic' ); ?></h2>
	<div class="author-avatar">
		<?php
		/**
		 * Filters the author bio avatar size.
		 *
		 * @since Yplef Classic 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'yplefclassic_author_bio_avatar_size', 56 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h3 class="author-title"><?php echo get_the_author(); ?></h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php
				/* translators: %s: Author display name. */
				printf( __( 'View all posts by %s', 'yplefclassic' ), get_the_author() );
				?>
			</a>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
