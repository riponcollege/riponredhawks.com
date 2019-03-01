<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 
	
?>

	<section id="primary" class="content-area wrap group" role="main">

		<div class="quarter left-menu">
			
			<div class="menu-primary">
				<h5 class="menu-title">Academics</h5>
				<?php wp_nav_menu( array( 'theme_location' => 'academics-primary', 'menu_class' => 'nav-menu' ) ); ?>
			</div>
			<div class="menu-buttons"><?php wp_nav_menu( array( 'theme_location' => 'academics-buttons', 'menu_class' => 'nav-menu' ) ); ?></div>

		</div>

		<div class="three-quarter">

			<h1 class="page-title">Faculty Directory</h1>

			<?php include( "searchform-faculty.php" ); ?>

			<?php 

			global $wp_query;
			$wp_query->query_vars["orderby"] = 'title';
			$wp_query->query_vars["order"] = 'ASC';
			$wp_query->get_posts();

			if ( have_posts() ) : 
				?>

			<div class="faculty-directory">
			<?php

				// Start the Loop.
				while ( have_posts() ) : the_post(); 
					?>
					<div class="faculty-entry">
						<?php the_post_thumbnail(); ?>
						<div class="info">
							<a href="<?php the_permalink(); ?>" class="btn"><i class="fa fa-lg fa-search"></i></a>
							<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							<p class="faculty-title"><?php print get_cmb_value( "faculty_title" ); ?></p>
							<a href="mailto:<?php print get_cmb_value( "faculty_email" ); ?>"><?php print get_cmb_value( "faculty_email" ); ?></a>
						</div>
					</div>
					<?php

				endwhile;
				?>
				<div class="pagination">
					<?php echo paginate_links(); ?>
				</div>
				<?php
			else :
				
				?>
				<p>No results for that search term.</p>
				<?php

			endif;
			?>
			</div>

		</div>

	</section><!-- #primary -->

<?php

get_footer();

?>