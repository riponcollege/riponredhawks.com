<?php


function the_infographic() {

	// get the title
	$title = get_post_meta( get_the_ID(), CMB_PREFIX . "infographic_title", 1 );

	// get the iamge
    $photo = get_post_meta( get_the_ID(), CMB_PREFIX . "infographic_image", 1 );

	// get the stats
	$stats = get_post_meta( get_the_ID(), CMB_PREFIX . "infographic", 1 );

	// count the stats, so we can set styles based on the count.
	$stat_count = count( $stats );
	if ( $stat_count == 1 ) {
		$class="one";
	} else if ( $stat_count == 2 ) {
		$class="two";
	} else if ( $stat_count == 3 ) {
		$class="three";
	} else if ( $stat_count == 4 ) {
		$class="four";
	}

	// get the buttons
	$buttons = get_post_meta( get_the_ID(), CMB_PREFIX . "infographic_buttons", 1 );

	if ( !empty( $stats ) ) {
		?>
		<h2 class="infographic-title"><?php print $title; ?></h2>
		<div class="infographic" style="background-image: url(<?php print $photo ?>);">
			<div class="wrap <?php print $class; ?>">
			<?php
			
			$count = 0;
			foreach ( $stats as $key => $stat ) {
				if ( !empty( $stat["image"] ) ) {

					// store the title and subtitle
					$title = ( isset( $stat["title"] ) ? $stat["title"] : '' );
					$subtitle = ( isset( $stat["subtitle"] ) ? $stat["subtitle"] : '' );

					$image = '<img src="' . $stat["image"] . '">';

					?>
				<div class="stat">
					<?php print $image; ?>
					<?php if ( !empty( $title ) || !empty( $subtitle ) ) { ?>
					<div class="stat-content">
						<?php if ( !empty( $title ) ) { ?><h3><?php print $title; ?>%</h3><?php } ?>
						<?php if ( !empty( $subtitle ) ) { ?><h4><?php print $subtitle; ?></h4><?php } ?>
					</div>
					<?php } ?>
				</div>
					<?php
					$count++;
				}
			}

			?>
				<div class="infographic-buttons">
				<?php
				if ( !empty( $buttons ) ) {
					foreach ( $buttons as $key => $button ) {
						// store the title and subtitle
						$text = ( isset( $button["text"] ) ? $button["text"] : '' );
						$link = ( isset( $button["link"] ) ? $button["link"] : '' );
						?>
						<a href="<?php print $link; ?>" class="button"><?php print $text; ?></a>
						<?php
					}
				}
				?>
				</div>
			</div>
		</div>
		<?php
	}
}



?>