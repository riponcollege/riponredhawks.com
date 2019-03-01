<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
	<div id="primary" class="wrap group">
		<div id="content" class="content-wide" role="main">
		<?php 
		if ( have_posts() ) : ?>
			<div class="two-third entry-content">
			<?php
			while ( have_posts() ) : the_post(); 
				global $post;
				$post_id = $post->ID;
				?>
				<h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail(); ?>
				<?php the_content(); ?>
				<p class="post-meta">
					Posted <?php the_date(); ?> in <?php print get_the_category_list( ", ", "", get_the_ID() ); ?> by <?php the_author_link() ?>.
				</p>
		 	</div>
		 	<div class="third">
		 		<p>&nbsp;</p>
		 		<p>&nbsp;</p>
				<?php
				if ( $post->post_type == 'post' ) {
					$cat_list = get_the_category_list( ",", "", get_the_ID() );
					if ( !empty( $cat_list ) ) {
						print "<h3>Related Posts</h3>";
						print do_shortcode('[display-posts category="' . $cat_list . '" posts_per_page=5 exclude_current="true" /]');
					}

					$tags = wp_get_post_tags( $post->ID );
					$tag_array = array();
					foreach ( $tags as $t ) {
						$tag_array[] = str_replace( '-2', '', $t->slug );
					}
					/*
					print "Tags:<br>";
					print_r( $tag_array );
					print "<br><br>";
					*/

					//print "<br><br>";
					if ( !empty( $tag_array ) ) {
						$areas = get_posts( array(
							'post_type' => 'area',
							'post_name__in' => $tag_array
						) );

						print "<hr />";
						print "<h3>Related Areas of Study</h3>";
						print "<ul class='display-posts-listing'>";
						foreach ( $areas as $a ) {
							print "<li><a href='/area/" . $a->post_name . "/'>" . $a->post_title . "</a></li>";
						}
						print "</ul>";
					}
					
				}
				?>
				<!-- here -->
				<?php
			endwhile;
			?>
		 	</div>
		 	<?php
		endif;
		?>
		</div><!-- #content -->

	</div><!-- #primary -->
<?php

get_footer();

?>