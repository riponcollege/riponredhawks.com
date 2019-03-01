<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function alum_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'alum', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __( 'Alumni', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Alumnus', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Alumni', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Alumnus', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Alumnus', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Alumnus', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Alumnus', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Alumni', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage alumni.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-welcome-learn-more', /* the icon for the custom post type menu */
			'has_archive' => 'rconnections', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */	
}


// adding the function to the Wordpress init
add_action( 'init', 'alum_post_type');



?>