<?php


// register a couple nav menus
register_nav_menus( array(
	'main-menu' => 'Main Menu',
	'constituent' => 'Header - Constituent',
	'links' => 'Header - Links',
	'academics-primary' => 'Academics Menu',
	'academics-buttons' => 'Academics Buttons'
) );



function get_all_menus(){
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 

	$generated = array( '' => '- select a menu -' );
	foreach ( $menus as $menu ) {
		$generated[$menu->slug] = $menu->name;
	}

	return $generated;
}



if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'=> 'General Sidebar',
		'id' => 'sidebar-generic',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name'=> 'Blog Sidebar',
		'id' => 'sidebar-blog',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name'=> 'Home Spotlight',
		'id' => 'spotlight',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name'=> 'Home Events',
		'id' => 'home-events',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name'=> 'Home Social',
		'id' => 'social',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}



function left_menu_display( $mode = 'both' ) {

	// grab the menu the user selected in the menus metabox.
	$menu_title = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_title", 1 );

	// primary menu
	$menu_primary = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_primary", 1 );
	$menu_primary_info = wp_get_nav_menu_object( $menu_primary );

	// buttons menu
	$menu_buttons = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_buttons", 1 );


	// verify that the menu exists by checking the menu name to see if it's empty
	if ( !empty( $menu_primary ) && ( $mode == 'both' || $mode == 'primary' ) ) {
		print '<div class="menu-primary">';

		// display the menu title
		if ( !empty( $menu_name ) ) {
			print '<h5 class="menu-title">' . $menu_name . '</h5>';
		} else if ( !empty( $menu_primary_info ) ) {
			print '<h5 class="menu-title">' . $menu_primary_info->name . '</h5>';
		}

		// display the menu
		wp_nav_menu( array( 
			'menu' => $menu_primary, 
			'menu_class' => 'nav-menu' )
		);

		print '</div>';
	}

	if ( !empty( $menu_buttons ) && ( $mode == 'both' || $mode == 'secondary' ) ) {
		print '<div class="menu-buttons">';

		// display the button menu
		wp_nav_menu( array( 
			'menu' => $menu_buttons, 
			'menu_class' => 'nav-menu' )
		);

		print '</div>';
	}

 }



function footer_menu_display() {

	// grab the menu the user selected in the menus metabox.
	$menu_name = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_footer", 1 );

	// verify that the menu exists by checking the menu name to see if it's empty
	if ( empty( $menu_name ) ) {
		$menu_name = 3;
	}

	// display the menu
	wp_nav_menu( array( 
		'menu' => $menu_name, 
		'menu_class' => 'nav-menu',
		'container_class' => 'aux-menu' )
	);

}


?>