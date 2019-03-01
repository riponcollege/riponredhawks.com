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

	<div class="social">
	 	<div class="wrap group">
		
			<h3>Connect with Ripon on <span>Social Media</span></h3>
			<div class="icons">
				<a href="http://www.facebook.com/ripon.college"><img src="<?php print get_template_directory_uri() ?>/img/social-facebook.png"></a>
				<a href="https://twitter.com/riponcollege"><img src="<?php print get_template_directory_uri() ?>/img/social-twitter.png"></a>
				<a href="http://www.youtube.com/riponcollegevideo"><img src="<?php print get_template_directory_uri() ?>/img/social-youtube.png"></a>
				<a href="http://instagram.com/riponcollege"><img src="<?php print get_template_directory_uri() ?>/img/social-instagram.png"></a>
				<a href="https://www.flickr.com/photos/ripon_college/"><img src="<?php print get_template_directory_uri() ?>/img/social-flickr.png"></a>
				<a href="http://www.linkedin.com/groups?home=&gid=4646327&trk=anet_ug_hm"><img src="<?php print get_template_directory_uri() ?>/img/social-linkedin.png"></a>
			</div>
			
			<!--
			<div class="feeds">
				<div class="twitter group">
					<h4>@riponcollege</h4>
					<div class="feed">
						<?php //twitter_posts() ?>
					</div>
				</div>

				<div class="facebook">
					<?php //facebook_feed() ?>
				</div>

				<div class="instagram">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('social')) : ?>
					[ add social widgets ]
					<?php endif; ?>
				</div>
			</div>
			-->

		</div>
	</div>
	
	<div class="wrap">
		<?php the_photo_grid( 18 ); ?>
	</div>

<?php get_footer(); ?>