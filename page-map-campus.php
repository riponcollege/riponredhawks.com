<?php

/*
Template Name: Map - Campus
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

	        <iframe src="http://map.ripon.edu/" style="width: 100%; height: 600px;"></iframe>

			<?php the_tab_box(); ?>

		</div>

	</div>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>