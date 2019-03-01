<?php

/*
Template Name: Map - Counselor
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
	
			<div class="map-container">
		        <div id="map-counselor" style="width: 100%; background-color:#898989; height: 500px;"></div>
		        <div id="map-info">
		        	<p>Click on your state to see your counselor or learn about <a href="/visits">upcoming events</a>.</p>
		        </div>
	        </div>

			<?php the_tab_box(); ?>

		</div>

	</div>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>