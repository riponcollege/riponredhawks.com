<?php


function the_accordions() {

	// get the slides
	$accordions = get_post_meta( get_the_ID(), CMB_PREFIX . "accordions", 1 );

	if ( !empty( $accordions ) ) {
		?>
		<div class="accordions">
			<?php
			foreach ( $accordions as $key => $accordion ) {
				if ( !empty( $accordion["title"] ) ) {

					// store the title and subtitle
					$title = ( isset( $accordion["title"] ) ? $accordion["title"] : '' );
					$content = ( isset( $accordion["content"] ) ? $accordion["content"] : '' );

					?>
			<div class="accordion<?php print ( isset( $accordion['open'] ) ? ( $accordion['open'] == 'on' ? " open" : "" ) : "" ); ?>">
				<h3 class="accordion-handle"><?php print $title ?></h3>
				<div class="accordion-content">
					<?php print do_shortcode( wpautop( $content ) ); ?>
				</div>
			</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}


?>