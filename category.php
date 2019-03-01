<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
?>

	<div id="primary" class="wrap group full-width">
		
		<div class="two-third">
			<h1><?php printf( __( 'Category Archives: <span>%s</span>', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>
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

	</div>

<?php

get_footer();

?>