<?php


function redirect_searchterm() {
    if ( is_search() ) {
    	$search_query = $_REQUEST['s'];
    	//print str_replace( "\'", "", $search_query ); die;
        if ( stristr( $search_query, "\'" ) ) { 
        	wp_redirect( "/?s=" . str_replace( "\'", "", $search_query ) );
        	exit;
        }
    }
}
add_action('wp_head', 'redirect_searchterm', 1);


?>