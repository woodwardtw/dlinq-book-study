<?php
/**
 * Single chapter partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<?php
			echo chapter_summary();
			echo chapter_provocation();
			echo chapter_experts();
			echo chapter_resources();
		;?>
		<?php the_content(); ?>
		<div class="row content-creation">
			<div class="col-md-6">
				<h2>Add <?php echo book_get_resource_name();?></h2>
				<?php 
					$logged = book_get_login_status();
					if($logged === 'open'){
						resource_form_creation();
					} else if ($logged === 'closed' && is_user_logged_in()){
						resource_form_creation();
					} else {
						echo "Please login to add content.";
					}
				?>
			</div>
			<div class="col-md-6">
				<h2>Add <?php echo book_get_human_name();?></h2>
				<?php 
					$logged = book_get_login_status();
					if($logged === 'open'){
						person_form_creation();
					} else if ($logged === 'closed' && is_user_logged_in()){
						person_form_creation();
					} else {
						echo "Please login to add content.";
					}

					?>
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

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
