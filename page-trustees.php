<?php
/*
Template Name: Trustees
*/
get_header();

?>

	<?php the_showcase(); ?>

	<div class="wrap group three-column">

		<div class="quarter left-menu">

			<?php left_menu_display(); ?>

		</div>

		<div class="half">
		<?php 
		while ( have_posts() ) : the_post(); ?>
		
		<h1><?php the_title() ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>
			<h2>Officers</h2>
			<?php
			// get the file contents
			$doc = file_get_contents( "https://my.ripon.edu/trustees/trustee_directory_external_officers_partial.php" );

			// replace image URLs so they're correct
			$doc = str_replace( './images/', 'https://my.ripon.edu/trustees/images/', $doc );

			print $doc;
			?>
			<h2>Members of the Board</h2>
			<?php
			// get the file contents
			$doc = file_get_contents( "https://my.ripon.edu/trustees/trustee_directory_external_members_partial.php" );

			// replace image URLs so they're correct
			$doc = str_replace( './images/', 'https://my.ripon.edu/trustees/images/', $doc );

			print $doc;
			?>
			<h2>Honorary Life Trustees</h2>
			<?php
			// get the file contents
			$doc = file_get_contents( "https://my.ripon.edu/trustees/trustee_directory_external_Honorary_partial.php" );

			// replace image URLs so they're correct
			$doc = str_replace( './images/', 'https://my.ripon.edu/trustees/images/', $doc );

			print $doc;
			?>
		</div>

			<?php
		endwhile; 
		?>

		</div>

		<div class="quarter sidebar">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif; ?>

		</div>

		<div class="three-quarter right">
			<?php the_tab_box(); ?>

			<?php the_accordions(); ?>
		</div>

		<?php the_wide_content(); ?>

	</div>

	<?php the_infographic(); ?>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>


<?php

get_footer();

?>