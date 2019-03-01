<?php

/*
Template Name: Homepage
*/

get_header();

?>

	<?php the_emergency_bar(); ?>

	<div class="home-showcase">
		
		<?php the_showcase(); ?>

	</div>

	<div class="wrap group">

		<div class="news">
			<h3>Ripon <span>News</span></h3>
			<?php
			query_posts( 'posts_per_page=2' );
			if ( have_posts() ) {
				$num = 1;
				while ( have_posts() ) {
					the_post();
					?>
			<article<?php print ( $num == 1 ? ' class="first"' : '' ); ?>>
				<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
				<?php the_excerpt() ?>
			</article>
					<?php
					$num++;
				} // end while
			} // end if

			wp_reset_query();
			?>
			<p><a href="/news/" class="more">Read more news stories</a></p>
		</div>

		<div class="events">
			<h3>Ripon <span>Events</span></h3>
			<div class="events-widget">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-events')) : ?>[events widget]<?php endif; ?>
			</div>
			<p><a href="/events" class="more">See more events</a></p>
		</div>

		<div class="spotlight">

			<h3>Ripon <span>Spotlight</span></h3>
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('spotlight')) : ?>[spotlight widgets]<?php endif; ?>
		
		</div>

	</div>

	<?php the_infographic(); ?>
	
	<div class="wrap">
		<?php the_photo_grid( 18 ); ?>
	</div>

<?php get_footer(); ?>