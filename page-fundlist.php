<?php

/*
Template Name: Fund List
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="wrap group academics three-column">

		<div class="content-wide">

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<h1><?php the_title() ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php
			endwhile; 

			$fund_categories = get_cmb_value( 'fund_category' );

			$fund_query = new WP_Query(array(
				'post_type' => 'fund',
				'tax_query' => array(
					array(
						'taxonomy' => 'fund_cat',
						'field'    => 'id',
						'terms'    => $fund_categories,
					),
				),
			));

			if ( $fund_query->have_posts() ) : 
				?>

			<div class="crowd-funding">
			<?php
			// Start the Loop.
			while ( $fund_query->have_posts() ) : $fund_query->the_post(); 
				?>
				<div class="fund">
					<a href="<?php the_permalink() ?>">
					<div class="photo">
						<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else {
							print '<img src="https://placehold.it/500x500">';
						}

						$fund_info = get_fund_info();
						if ( $fund_info['total'] > 0 ) {
							print '<h4 class="fund-total">' . $fund_info['percent'] . '% Funded <span>(' . $fund_info['count'] . ' Donors)</span></h4>';
						}
						?>
					</div>
					<div class="info">
						<h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
					</div>
					</a>
				</div>
				<?php

			endwhile;
			?>
			<div class="pagination">
				<?php echo paginate_links(); ?>
			</div>
				<?php
			else : ?>			if ( have_posts() ) : 
				?>

			<div class="crowd-funding">

				<p>No results for that search term.</p>
				<?php

			endif;
			?>

		</div>

	</div>

<?php get_footer(); ?>