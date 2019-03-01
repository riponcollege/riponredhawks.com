<?php



function the_narrow_content() {

	// narrow content
    $narrow_content = get_post_meta( get_the_ID(), CMB_PREFIX . "narrow_content", 1 );
	if ( !empty( $narrow_content ) ) {
		?>
	<div class="content-narrow">
		<?php print do_shortcode( $narrow_content ) ?>
	</div>
		<?php
	}

}


function the_wide_content() {

	// narrow content
    $wide_content = get_post_meta( get_the_ID(), CMB_PREFIX . "wide_content", 1 );
	if ( !empty( $wide_content ) ) {
		?>
	<div class="content-wide">
		<?php print do_shortcode( $wide_content ) ?>
	</div>
		<?php
	}

}



?>