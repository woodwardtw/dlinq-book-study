<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/acf.php',                          // Load ACF functions.
	'/cpt-tax.php',                          // Load custom post types and taxonomies functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once $understrap_inc_dir . $file;
}


//LIST THE CHAPTERS
function chapter_lister(){
// WP QUERY LOOP
 $args = array(
      'posts_per_page' => -1,
      'post_type'   => 'chapter', 
      'post_status' => 'publish', 
                    );
 $html = '';
  $the_query = new WP_Query( $args );
	    if( $the_query->have_posts() ): 
	      while ( $the_query->have_posts() ) : $the_query->the_post();
	       //DO YOUR THING
	      	$title = get_the_title();
	      	$link = get_the_permalink();
	        $html = "<li class='chapter-item'><a href='{$link}'>{$title}</a></li>" . $html ;
	         endwhile;
	        $html ="<ol class='chapter-list'>{$html}</ol>";
	  endif;
    wp_reset_query();  // Restore global post data stomped by the_post().
   return $html;
}                    

//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}
