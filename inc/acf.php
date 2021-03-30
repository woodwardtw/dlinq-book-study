<?php
/**
 * ACF specific 
 *
 * @package UnderStrap
 */


//CHAPTER SPECIFIC 
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

function chapter_experts(){
	$html = '';
	if(get_field('experts')){
		$experts = get_field('experts');
		foreach ($experts as $key => $expert) {
			# code...
			$name = chapter_expert_name($expert);
			$description = chapter_expert_description($expert);
			$html .= "<div class='expert col-md-6'>{$name}{$description}</div>";
		}
		return "<h2>Experts</h2><div class='row'>{$html}</div>";
	}
}

function chapter_expert_name($id){
	$first = '';
	$last = '';
	if(get_field('first_name', $id)){
		$first = get_field('first_name', $id);
	}
	if(get_field('last_name', $id)){
		$last = get_field('last_name', $id);
	}
	return "<h3>{$first} {$last}</h3>";
}

function chapter_expert_description($id){
	$description = '';
	if(get_field('description', $id)){
		$description = get_field('description', $id);
		return "<div class='expert-description'>{$description}</div>";
	}
}

function chapter_expert_link($id){

}


//EXPERT SPECIFIC 
//set the expert title to reflect first and last name fields
function expert_rename ($post_id){
  $type = get_post_type($post_id);
  $last = get_field('last_name');
  $first = get_field('first_name');

  if ($type === 'expert'){
    remove_action( 'save_post', 'expert_rename' );
   
    $my_post = array(
        'ID'           => $post_id,
        'post_title'   => $last . ', ' . $first,      
    );

  // Update the post into the database
    wp_update_post( $my_post );
  }
}
add_action( 'save_post', 'expert_rename' );





// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	//save acf json
		add_filter('acf/settings/save_json', 'dlinq_book_json_save_point');
		 
		function dlinq_book_json_save_point( $path ) {
		    
		    // update path
		    $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $path;
		    
		}


		// load acf json
		add_filter('acf/settings/load_json', 'dlinq_book_json_load_point');

		function dlinq_book_json_load_point( $paths ) {
		    
		    // remove original path (optional)
		    unset($paths[0]);
		    
		    
		    // append path
		    
		    $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $paths;
		    
		}