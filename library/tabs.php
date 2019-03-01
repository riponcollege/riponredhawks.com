<?php


function the_tab_box() {

	// get the slides
	$tabs = get_post_meta( get_the_ID(), CMB_PREFIX . "tabs", 1 );

	if ( !empty( $tabs ) ) {
		?>
		<div class="tabs">
			<div class="tab-nav">
			<?php
			$count = 0;
			foreach ( $tabs as $key => $tab ) {
				if ( !empty( $tab["title"] ) ) {

					// store the title and subtitle
					$title = ( isset( $tab["title"] ) ? $tab["title"] : '' );
					$content = ( isset( $tab["content"] ) ? $tab["content"] : '' );
					
					?><a class="tab-title <?php print $count; print ( $count == 0 ? ' active' : '' ); ?>"><?php print $title; ?></a> <?php

					$count++;
				}
			}
			foreach ( $tab as $key => $tab ) {
				if ( !empty( $tab["title"] ) ) {

					// store the title and subtitle
					$title = ( isset( $tab["title"] ) ? $tab["title"] : '' );
					$content = ( isset( $tab["content"] ) ? $tab["content"] : '' );
					
					?><a class="tab-title <?php print $count; print ( $count == 0 ? ' active' : '' ); ?>"><?php print $title; ?></a> <?php

					$count++;
				}
			}
			reset( $tabs );
			?>
			</div>
			<?php
			$count = 0;
			foreach ( $tabs as $key => $tab ) {
				if ( !empty( $tab["title"] ) ) {

					// store the title and subtitle
					$title = ( isset( $tab["title"] ) ? $tab["title"] : '' );
					$content = ( isset( $tab["content"] ) ? $tab["content"] : '' );

					?>
			<div class="tab<?php print ( $key == 0 ? ' visible' : '' ); ?>">
				<div class="content <?php print $count; print ( $count == 0 ? ' active' : '' ); ?>">
					<h3 class="tab-title-mobile"><?php print $title ?></h3>
					<?php print do_shortcode( wpautop( $content ) ); ?>
				</div>
			</div>
					<?php

					$count++;
				}
			}
			foreach ( $tab as $key => $tab ) {
				if ( !empty( $tab["title"] ) ) {

					// store the title and subtitle
					$title = ( isset( $tab["title"] ) ? $tab["title"] : '' );
					$content = ( isset( $tab["content"] ) ? $tab["content"] : '' );

					?>
			<div class="tab<?php print ( $key == 0 ? ' visible' : '' ); ?>">
				<div class="content <?php print $count; print ( $count == 0 ? ' active' : '' ); ?>">
					<h3 class="tab-title-mobile"><?php print $title ?></h3>
					<?php print do_shortcode( wpautop( $content ) ); ?>
				</div>
			</div>
					<?php

					$count++;
				}
			}
			?>
		</div>
		<?php
	}
}


?>