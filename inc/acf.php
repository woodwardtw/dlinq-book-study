<?php
/**
 * ACF specific 
 *
 * @package UnderStrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//CHAPTER SPECIFIC 
function chapter_summary(){
	if(get_field('summary_title', 'option')){
		$summary_title = get_field('summary_title', 'option');
	} else {
		$summary_title = 'Summary';
	}
	if( get_field('summary')){
		$summary =  get_field('summary');
		return "<div class='summary'><h2 id='summary-title'>{$summary_title}</h2>{$summary}</div>";
	}
}

function chapter_provocation(){
	if(get_field('provocation_title', 'option')){
		$provoke_title = get_field('provocation_title', 'option');
	} else {
		$provoke_title = 'Provocations';
	}
	if( get_field('provocations')){
		$provocations =  get_field('provocations');
		return "<div class='provocations'><h2 id='provocation-title'>{$provoke_title}</h2>{$provocations}</div>";
	}
}

function chapter_experts(){
	$html = '';
	if(get_field('people_title', 'option')){
		$expert_title = get_field('people_title', 'option');
	} else {
		$expert_title = 'Experts';
	}
	if(get_field('experts')){
		$experts = get_field('experts');
		foreach ($experts as $key => $expert) {
			# code...
			$name = chapter_expert_name($expert);
			$description = chapter_expert_description($expert);
			$html .= "<div class='expert col-md-6'>{$name}{$description}</div>";
		}
		return "<div class='row expert-row'><div class='col-md-12'><h2 id='experts'>{$expert_title}</h2></div>{$html}</div>";
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
	if(get_field('link', $id)){
		$link = get_field('link', $id);
		$name = "<a href='{$link}'><h3>{$first} {$last}</h3></a>";
		return $name;
	} else {
		return "<h3>{$first} {$last}</h3>";
	}
}

function chapter_expert_description($id){
	$description = '';
	if(get_field('description', $id)){
		$description = get_field('description', $id);
		return "<div class='expert-description'>{$description}</div>";
	}
}

function chapter_resources(){
	$html = '';
	if(get_field('resources')){
		$resources = get_field('resources');
		foreach ($resources as $key => $resource) {
			# code...
			$name = get_the_title($resource);
			$link = get_field('link', $resource);
			$title = "<a href='{$link}'><h3>{$name}</h3></a>";
			$description = '<div class="resource-description">' . get_field('description', $resource) . '</div>';
			$html .= "<div class='resource col-md-6'>{$title}{$description}</div>";
		}
		return "<div class='row resource-row'><div class='col-md-12'><h2 id='resources'>Resources</h2></div>{$html}</div>";
	}
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


//FRONT END FORM RELATIONSHIP BUILDER

function book_acf_form_submission_additions($post_id){
	$new_post_id = $post_id;
	$chapter_id = get_the_id();
	if(get_post_type($new_post_id) === 'resource'){
		if(get_field('resources', $chapter_id)){
			$resources = get_field('resources', $chapter_id);
		} else {
			$resources = array();
		}
		array_push($resources, $new_post_id);
		update_field('resources', $resources, $chapter_id);
	}
	if(get_post_type($new_post_id) === 'expert'){
		if(get_field('experts', $chapter_id)){
			$experts = get_field('experts', $chapter_id);
		} else {
			$experts = array();
		}
		array_push($experts, $new_post_id);
		update_field('experts', $experts, $chapter_id);
	}
	
}

add_action('acf/save_post', 'book_acf_form_submission_additions', 20, 1912);

//OPTIONS PAGE
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Book Settings',
		'menu_title'	=> 'Book Settings',
		'menu_slug' 	=> 'book-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


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