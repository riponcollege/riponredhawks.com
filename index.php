<?php
/*
Home/catch-all template
*/

get_header(); ?>


	<div id="primary" class="wrap group full-width">
		
		<div class="two-third">
			<h1>Ripon <span>News</span></h1>
			<?php
			while ( have_posts() ) : the_post();
				?>
				<div class="entry-content">
					<div class="thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
					<p class="post-meta">
						Posted <?php the_date(); ?> in <?php print get_the_category_list( ", ", "", get_the_ID() ); ?> by <?php the_author_link() ?>.
					</p>
				</div>
				<?php
			endwhile;
			?>

			<div class="pagination">
				<?php print paginate_links(); ?>
			</div>
		</div>

		<div class="third sidebar pad-top">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-blog') ) : ?><!-- no sidebar --><?php endif; ?>

		</div>

	</div><!-- #primary -->


<?php get_footer(); ?>