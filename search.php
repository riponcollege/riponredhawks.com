<?php
/*
Home/catch-all template
*/

get_header(); 

if ( isset( $_REQUEST['post_type'] ) ) {
	if ( $_REQUEST['post_type'] == 'faculty' ) {
		include "search-faculty.php";
	} else {
		include "search-generic.php";
	}
} else {
	include "search-generic.php";
}

get_footer();

?>