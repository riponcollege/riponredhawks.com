<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function fund_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'fund', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __( 'Funds', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Fund', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Funds', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Fund', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Fund', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Fund', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Fund', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Fund', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the funds in the crowdfunding area.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-megaphone', /* the icon for the custom post type menu */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'fund' );
	
}


// adding the function to the Wordpress init
add_action( 'init', 'fund_post_type');



// now let's add custom categories (these act like categories)
register_taxonomy( 'fund_cat', 
	array('fund'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Fund Categories', 'ptheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Fund Category', 'ptheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Fund Categories', 'ptheme' ), /* search title for taxomony */
			'all_items' => __( 'All Fund Categories', 'ptheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Fund Category', 'ptheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Fund Category:', 'ptheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Fund Category', 'ptheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Fund Category', 'ptheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Fund Category', 'ptheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Fund Category Name', 'ptheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 
			'slug' => 'fund-category'
		)
	)
);



function list_fund_category( $category ) {

	// set up some args
	$args = array( 
		'post_type' => 'fund', 
		'posts_per_page' => 999, 
		'orderby' => 'title', 
		'order' => 'ASC', 
		'tax_query' => array( 
			array(
				'taxonomy' => 'fund_cat',
				'field' => 'slug',
				'terms' => $category
			) 
		) 
	);

	$show_links = true;

	// grab category information
	$category_info = get_term_by( 'slug', $category, 'fund_cat' );

	// start up a loop
	$loop = new WP_Query( $args );

	?>
	<h3><?php print $category_info->name ?></h3>
	<ul>
	<?php
	// loop through the post results
	while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<li><?php if ( $show_links ) { ?><a href="<?php the_permalink() ?>"><?php } ?><?php the_title(); ?><?php if ( $show_links ) { ?></a><?php } ?></li>
		<?php
	endwhile;
	?>
	</ul>
	<?php
	
	// reset the post data
	wp_reset_postdata();

}



function get_fund_categories() {
	$terms = get_terms( 'fund_cat', array(
	    'hide_empty' => false
	) );
	return $terms;
}



function get_fund_info() {

	$fund_form_id = get_cmb_value( 'fund_form' );
	$fund_goal = get_cmb_value( 'fund_goal' );
	$fund_offline_total = get_cmb_value( 'fund_offline_total' );
	$fund_offline_count = get_cmb_value( 'fund_offline_count' );

	$info = array(
		'fund_form' => $fund_form_id,
		'goal' => floatval( str_replace( ",", "", $fund_goal ) ),
		'offline_total' => floatval( str_replace( ",", "", $fund_offline_total ) ),
		'offline_count' => $fund_offline_count,
		'count' => 0,
		'total' => 0
	);


	if ( $fund_form_id != 0 && $info['goal'] > 0 ) {

		// get the form itself.
		$form = GFAPI::get_form( $fund_form_id );

		// get the total field from the form information
		$types = GFAPI::get_fields_by_type( $form, 'total' );

		// if there is a total field
		if ( !empty( $types ) ) {
			
			// set a variable with the total field's ID
			$total_field_id = $types[0]->id;

			// get the form entries
			$entries = GFAPI::get_entries( $fund_form_id );

			// loop through the entries and add them to the total.
			foreach ( $entries as $entry ) {
				$info['total'] += $entry[$types[0]->id];
			}

			// count the donations
			$info['count'] = count( $entries );
		}

		$info['count'] += $info['offline_count'];
		$info['total'] += $info['offline_total'];
		$info['total_formatted'] = number_format( $info['total'], 2 );
		$info['goal_formatted'] = number_format( $info['goal'], 2 );
	}

	$info['percent'] = round( ( $info['total'] / $info['goal'] ) * 100, 1 );

	return $info;
}



?>