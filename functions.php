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


function chapter_summary(){
	if( get_field('summary')){
		$summary =  get_field('summary');
		return "<div class='summary'><h2 id='summary-title'>Summary</h2>{$summary}</div>";
	}
}

function chapter_provocation(){
	if( get_field('provocations')){
		$provocations =  get_field('provocations');
		return "<div class='provocations'><h2 id='provocation-title'>Provocations</h2>{$provocations}</div>";
	}
}


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

function chapter_register_widget() {
	register_widget( 'chapter_widget' );
	}
add_action( 'widgets_init', 'chapter_register_widget' );
class chapter_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// widget ID
		'chapter_widget',
		// widget name
		__('Chapter', 'chapter_widget_domain'),
		// widget description
		array( 'description' => __( 'Chapter List', 'chapter_widget_domain' ), )
		);
	}
public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	echo $args['before_widget'];
	//if title is present
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	//output
	//echo __( 'Chapters', 'chapter_widget_domain' );
	echo chapter_lister();
	echo $args['after_widget'];
}
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
	else
		$title = __( 'Chapters', 'chapter_widget_domain' );
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
}

                  


