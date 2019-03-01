
	<div id="primary" class="wrap group content-narrow">
			
		<h1>Search Results: <span><?php print $_REQUEST["s"]; ?></span></h1>

		<div class="search-results-list">
		<?php
		while ( have_posts() ) : the_post();
			switch ( $post->post_type ) {
				case 'faculty':
					?>
			<div class="faculty-entry">
				<?php the_post_thumbnail(); ?>
				<div class="info">
					<a href="<?php the_permalink(); ?>" class="btn">View Profile &raquo;</a>
					<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
					<p class="faculty-title"><?php print get_cmb_value( "faculty_title" ); ?></p>
					<a href="mailto:<?php print get_cmb_value( "faculty_email" ); ?>"><?php print get_cmb_value( "faculty_email" ); ?></a>
				</div>
			</div>
					<?php 
				break;
				default:
					?>
			<div class="search-result">
				<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</div>
					<?php
				break;
			}
			?>
			<?php
		endwhile;

		?>
		</div>
		<div class="pagination">
			<?php print paginate_links(); ?>
		</div>

	</div><!-- #primary -->

