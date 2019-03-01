<?php

/*
Template Name: Net Price Calculator
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="wrap group two-column">

		<div class="quarter left-menu">

			<?php left_menu_display(); ?>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif; ?>

		</div>

		<div class="three-quarter">

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<h1><?php the_title() ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

				<?php
			endwhile; 
			?>

			<script type="text/javascript">

			var NPC_CLIENT_DOMAIN		= "ripon",	
				NPC_CLIENT_HEIGHT		= 700,
				NPC_CLIENT_WIDTH		= 1100,
				NPC_CONTAINER_PROTOCOL	= "http:",
				NPC_EMBEDDED_PROTOCOL	= "http:",
				NPC_IGNITION_LOCATION	= "birch";

			(function(){var d=document,s=d.createElement("script");s.type="text/javascript";s.src=NPC_EMBEDDED_PROTOCOL+"//"+NPC_IGNITION_LOCATION+".aidcalculator.com/ignition/key.js";d.getElementsByTagName("head")[0].appendChild(s);})();

			</script>
			<noscript>You must have javascript enabled to use this tool.</noscript>
			<div id="npc_container"></div>

			<?php the_tab_box(); ?>
		</div>

	</div>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>