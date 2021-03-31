<?php
/**
 * Partial template for content in home page book
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<h1 class="entry-title"><?php echo get_field('book_title')

		//the_title( '<h1 class="entry-title">', '</h1>' ); 
		;?></h1>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<h2>by <?php echo get_field('authors')?></h3>
		<div class="book-description">
			<?php echo get_field('excerpt');?>
		</div>
		<?php the_content(); ?>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<?php echo chapter_lister();?>
			</div>
		</div>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
