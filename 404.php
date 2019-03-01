<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); 

?>

	<div id="primary" class="wrap group content-narrow">

		<h1 class="page-title"><?php _e( 'Page Not Found', 'twentyfourteen' ); ?></h1>

		<div class="page-content">
			<p>We couldn't find the page you were looking for, it has either moved or the link you have may be incorrect. Perhaps you could try searching for the content you need?</p>

			<div class="search">
				<?php get_search_form(); ?>
			</div>

			<p>If you have any other questions, please feel free to <a href="/contact">contact us</a>, and we'll do all we can to assist you.</p>
		</div><!-- .page-content -->

	</div><!-- #primary -->

<?php
get_footer();

?>