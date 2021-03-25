<?php
/**
 * ACF specific 
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//expert custom post type

// Register Custom Post Type expert
// Post Type Key: expert

function create_expert_cpt() {

  $labels = array(
    'name' => __( 'Experts', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Expert', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Expert', 'textdomain' ),
    'name_admin_bar' => __( 'Expert', 'textdomain' ),
    'archives' => __( 'Expert Archives', 'textdomain' ),
    'attributes' => __( 'Expert Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Expert:', 'textdomain' ),
    'all_items' => __( 'All Experts', 'textdomain' ),
    'add_new_item' => __( 'Add New Expert', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Expert', 'textdomain' ),
    'edit_item' => __( 'Edit Expert', 'textdomain' ),
    'update_item' => __( 'Update Expert', 'textdomain' ),
    'view_item' => __( 'View Expert', 'textdomain' ),
    'view_items' => __( 'View Experts', 'textdomain' ),
    'search_items' => __( 'Search Experts', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into expert', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this expert', 'textdomain' ),
    'items_list' => __( 'Expert list', 'textdomain' ),
    'items_list_navigation' => __( 'Expert list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Expert list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'expert', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'expert', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_expert_cpt', 0 );


//resource custom post type

// Register Custom Post Type resource
// Post Type Key: resource

function create_resource_cpt() {

  $labels = array(
    'name' => __( 'Resources', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Resource', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Resource', 'textdomain' ),
    'name_admin_bar' => __( 'Resource', 'textdomain' ),
    'archives' => __( 'Resource Archives', 'textdomain' ),
    'attributes' => __( 'Resource Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Resource:', 'textdomain' ),
    'all_items' => __( 'All Resources', 'textdomain' ),
    'add_new_item' => __( 'Add New Resource', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Resource', 'textdomain' ),
    'edit_item' => __( 'Edit Resource', 'textdomain' ),
    'update_item' => __( 'Update Resource', 'textdomain' ),
    'view_item' => __( 'View Resource', 'textdomain' ),
    'view_items' => __( 'View Resources', 'textdomain' ),
    'search_items' => __( 'Search Resources', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into resource', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this resource', 'textdomain' ),
    'items_list' => __( 'Resource list', 'textdomain' ),
    'items_list_navigation' => __( 'Resource list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Resource list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'resource', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'resource', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_resource_cpt', 0 );


//question custom post type

// Register Custom Post Type question
// Post Type Key: question

function create_question_cpt() {

  $labels = array(
    'name' => __( 'Questions', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Question', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Question', 'textdomain' ),
    'name_admin_bar' => __( 'Question', 'textdomain' ),
    'archives' => __( 'Question Archives', 'textdomain' ),
    'attributes' => __( 'Question Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Question:', 'textdomain' ),
    'all_items' => __( 'All Questions', 'textdomain' ),
    'add_new_item' => __( 'Add New Question', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Question', 'textdomain' ),
    'edit_item' => __( 'Edit Question', 'textdomain' ),
    'update_item' => __( 'Update Question', 'textdomain' ),
    'view_item' => __( 'View Question', 'textdomain' ),
    'view_items' => __( 'View Questions', 'textdomain' ),
    'search_items' => __( 'Search Questions', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into question', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this question', 'textdomain' ),
    'items_list' => __( 'Question list', 'textdomain' ),
    'items_list_navigation' => __( 'Question list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Question list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'question', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'question', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_question_cpt', 0 );