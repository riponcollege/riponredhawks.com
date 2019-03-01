<?php

function the_emergency_bar() {

	// narrow content
    $emergency_text = get_post_meta( get_the_ID(), CMB_PREFIX . "emergency_text", 1 );
    $emergency_link = get_post_meta( get_the_ID(), CMB_PREFIX . "emergency_link", 1 );

	if ( !empty( $emergency_text ) ) {
		?>
	<div class="emergency-bar-container">
		<div class="wrap">
			<div class="emergency-bar">
				<i class="fa fa-close"></i>
				<?php if ( !empty( $emergency_link ) ) { ?><a href="<?php print $emergency_link ?>"><?php } ?>
				<div class="emergency-bar-icon">
					<i class="fa fa-lg fa-exclamation-triangle"></i>
				</div>
				<div class="emergency-bar-text">
					<strong>ALERT:</strong> 
					<?php print do_shortcode( $emergency_text ) ?>
				</div>
				<?php if ( !empty( $emergency_link ) ) { ?></a><?php } ?>
			</div>
		</div>
	</div>
		<?php
	}

}

?>