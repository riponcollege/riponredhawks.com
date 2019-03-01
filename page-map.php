<?php

/*
Template Name: Map
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<?php if ( ( has_cmb2_value( 'map-button-1-text' ) && has_cmb2_value( 'map-button-1-url' ) ) || ( has_cmb2_value( 'map-button-2-text' ) && has_cmb2_value( 'map-button-2-url' ) ) || ( has_cmb2_value( 'map-button-3-text' ) && has_cmb2_value( 'map-button-3-url' ) ) ) { ?>
	<div class="bg-grey-light">
		<div class="wrap group two-column map-buttons">
			<?php
			if ( has_cmb2_value( 'map-button-1-text' ) && has_cmb2_value( 'map-button-1-url' ) ) {
				print '<a href="' . get_cmb2_value( 'map-button-1-url' ) . '">' . get_cmb2_value( 'map-button-1-text' ) . '</a>';
			}
			if ( has_cmb2_value( 'map-button-2-text' ) && has_cmb2_value( 'map-button-2-url' ) ) {
				print '<a href="' . get_cmb2_value( 'map-button-2-url' ) . '">' . get_cmb2_value( 'map-button-2-text' ) . '</a>';
			}
			if ( has_cmb2_value( 'map-button-3-text' ) && has_cmb2_value( 'map-button-3-url' ) ) {
				print '<a href="' . get_cmb2_value( 'map-button-3-url' ) . '">' . get_cmb2_value( 'map-button-3-text' ) . '</a>';
			}
			?>
		</div>
	</div>
	<?php } ?>

	<div class="map">
	    <iframe src="<?php show_cmb2_value( 'map-url' ); ?>" class="map-frame"></iframe>
	</div>

<?php 

get_footer(); 

?>