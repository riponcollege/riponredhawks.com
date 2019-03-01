<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

$base_url = '/rconnections';

$current_yr = ( isset( $_REQUEST['y'] ) ? $_REQUEST['y'] : 0 );
$current_cat = ( isset( $_REQUEST['c'] ) ? $_REQUEST['c'] : 0 );
$current_search = ( isset( $_REQUEST['t'] ) ? $_REQUEST['t'] : '' );

if ( $current_yr > 0 ) {
	// get year
	$args = array(
		'posts_per_page' => 1,
		'post_type' => 'yr',
		'name' => $current_yr,
	);
	query_posts( $args );
	while ( have_posts() ) : 
		the_post();
		global $post;
		$year_info = array();
		$year_info['president'] = get_cmb2_value( 'year_president' );
		$year_info['grad_date'] = get_cmb2_value( 'year_grad_date' );
		$year_info['grad_seniors'] = get_cmb2_value( 'year_grad_seniors' );
		$year_info['commencement_theme'] = get_cmb2_value( 'year_commencement_theme' );
		$year_info['commencement_speakers'] = get_cmb2_value( 'year_commencement_speakers' );
		$year_info['honorary_degrees'] = get_cmb2_value( 'year_honorary_degrees' );
		$year_info['medal'] = get_cmb2_value( 'year_medal' );
		$year_info['agent_current_name'] = get_cmb2_value( 'year_agent_current_name' );
		$year_info['agent_current_email'] = get_cmb2_value( 'year_agent_current_email' );
		$year_info['agent_current_name_2'] = get_cmb2_value( 'year_agent_current_name_2' );
		$year_info['agent_current_email_2'] = get_cmb2_value( 'year_agent_current_email_2' );
		$year_info['agent_current_name_3'] = get_cmb2_value( 'year_agent_current_name_3' );
		$year_info['agent_current_email_3'] = get_cmb2_value( 'year_agent_current_email_3' );
		$year_info['agent_current_name_4'] = get_cmb2_value( 'year_agent_current_name_4' );
		$year_info['agent_current_email_4'] = get_cmb2_value( 'year_agent_current_email_4' );
		$year_info['agent_former_name'] = get_cmb2_value( 'year_agent_former_name' );
		$year_info['has_memory'] = get_cmb2_value( 'year_memory' );

		$year_info['memories'] = array();
		if ( has_cmb2_value( 'year_memory_50' ) ) $year_info['memories'][50] = get_cmb2_value( 'year_memory_50' );
		if ( has_cmb2_value( 'year_memory_40' ) ) $year_info['memories'][40] = get_cmb2_value( 'year_memory_40' );
		if ( has_cmb2_value( 'year_memory_35' ) ) $year_info['memories'][35] = get_cmb2_value( 'year_memory_35' );
		if ( has_cmb2_value( 'year_memory_25' ) ) $year_info['memories'][25] = get_cmb2_value( 'year_memory_25' );
		if ( has_cmb2_value( 'year_memory_10' ) ) $year_info['memories'][10] = get_cmb2_value( 'year_memory_10' );
		

		$year_info['letters'] = get_cmb2_value( 'year_letters' );
		$year_info['facebook'] = get_cmb2_value( 'year_facebook' );
		$year_info['news'] = get_cmb2_value( 'year_news' );
		$year_info['sightings'] = get_cmb2_value( 'year_sightings' );

		$year_info['photo'] = get_the_post_thumbnail_url( $post, array( 400, 400 ) );
		$year_info['photo_reunion'] = get_cmb2_value( 'year_photo_reunion' );
	endwhile;
	wp_reset_query();
	// print_r( $year_info );
}


function show_alum_category_image( $category ) {
	print '<img src="' . get_bloginfo( 'template_url' ) . '/img/alum-' . $category . '.png">';
}


function remove_img_attr ( $html ) {
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter( 'post_thumbnail_html', 'remove_img_attr' );

$have_filters = false;

if ( $current_yr != 0 ) {
	$have_filters = true;
	$query_yr = array(
		'key'   => '_p_alum_year', 
		'value' => $current_yr,
	);
}

if ( $current_cat ) {
	$have_filters = true;
	$query_cat = array(
		'key'   => '_p_alum_category', 
		'value' => $current_cat,
	);
}


if ( $current_search != '' ) {
	$have_filters = true;
	$query_search = array(
		'relation' => 'OR',
		array(
			'key'   => '_p_alum_name_first', 
			'value' => $current_search,
			'compare' => 'LIKE'
		),
		array(
			'key'   => '_p_alum_name_last', 
			'value' => $current_search,
			'compare' => 'LIKE'
		),
		array(
			'key'   => '_p_alum_name_maiden', 
			'value' => $current_search,
			'compare' => 'LIKE'
		)
	);
}

if ( $query_yr || $query_cat || $query_search ) {

	$meta_query = array( 
		'relation' => 'AND',
		$query_yr,
		$query_cat,
		$query_search
	);

}

	
?>
	<div class="alum-banner-container">
		<?php print do_shortcode( "[snippet slug='alum-showcase' /]" ); ?>
	</div>

	<section id="primary" class="content-area wrap group" role="main">

		<div class="content-wide">
			
			<div class="alum-info">
				<h1 class="page-title alum-title">R Connections<?php print ( $current_yr != 0 ? '<span class="class-title"> &raquo; Class of ' . $current_yr : '</span>' ); ?></h1>
				<div class="alum-buttons">
					<button class="alum-back">&laquo; Alumni Home</button>
					<?php if ( $have_filters ) { ?><button class="alum-reset">Reset Search</button><?php } ?>
					<button class="alum-add-story">Add My Story</button>
				</div>
				<?php if ( !empty( $current_yr ) ) { ?>
				<div class="class-information group">
					<div class="third">
						<?php if ( !empty( $year_info['president'] ) ) { ?><p><strong>President:</strong><br><?php print $year_info['president'] ?></p><?php } ?>
						<?php if ( !empty( $year_info['grad_date'] ) ) { ?><p><strong>Graduation Date:</strong><br><?php print $year_info['grad_date'] ?></p><?php } ?>
						<?php if ( !empty( $year_info['commencement_theme'] ) ) { ?><p><strong>Commencement Theme:</strong><br><?php print $year_info['commencement_theme'] ?></p><?php } ?>
						<?php if ( !empty( $year_info['commencement_speakers'] ) ) { ?><p><strong>Commencement Speakers:</strong><br><?php print $year_info['commencement_speakers'] ?></p><?php } ?>
					</div>
					<div class="third">
						<!--<span class="year-more-details">-->
						<?php if ( !empty( $year_info['grad_seniors'] ) ) { ?><p><strong>Graduating Seniors:</strong><br><?php print $year_info['grad_seniors'] ?></p><?php } ?>
						<?php if ( !empty( $year_info['honorary_degrees'] ) ) { ?><p><strong>Honorary Degrees:</strong><br><?php print $year_info['honorary_degrees'] ?></p><?php } ?>
						<?php if ( !empty( $year_info['medal'] ) ) { ?><p><strong>Medals of Merit:</strong><br><?php print $year_info['medal'] ?></p><?php } ?>
						<?php if ( !empty( $year_info['agent_current_name'] ) ) { ?>
						<p><strong>Current Class Agent(s):</strong><br>
						<?php if ( !empty( $year_info['agent_current_email'] ) ) { ?><a href="mailto:<?php print $year_info['agent_current_email'] ?>"><?php } ?><?php print $year_info['agent_current_name'] ?><?php if ( !empty( $year_info['agent_current_email'] ) ) { ?></a><?php } ?><?php if ( !empty( $year_info['agent_current_name_2'] ) ) { ?><?php if ( !empty( $year_info['agent_current_email_2'] ) ) { ?>, <a href="mailto:<?php print $year_info['agent_current_email_2'] ?>"><?php } ?><?php print $year_info['agent_current_name_2'] ?><?php if ( !empty( $year_info['agent_current_email_2'] ) ) { ?></a><?php } ?><?php if ( !empty( $year_info['agent_current_email_3'] ) ) { ?>, <a href="mailto:<?php print $year_info['agent_current_email_3'] ?>"><?php } ?><?php print $year_info['agent_current_name_3'] ?><?php if ( !empty( $year_info['agent_current_email_3'] ) ) { ?></a><?php } ?><?php if ( !empty( $year_info['agent_current_email_4'] ) ) { ?>, <a href="mailto:<?php print $year_info['agent_current_email_4'] ?>"><?php } ?><?php print $year_info['agent_current_name_4'] ?><?php if ( !empty( $year_info['agent_current_email_4'] ) ) { ?></a><?php } ?>
						</p><?php } ?><?php } ?>
						<?php if ( !empty( $year_info['agent_former_name'] ) ) { ?><p><strong>Former Class Agent:</strong><br><?php print $year_info['agent_former_name'] ?></p><?php } ?>
					</div>
					<div class="third">
						<!--<?php 
						if ( !empty( $year_info['memories'] ) ) { 
							$memories_output = implode(' | ', array_map(
							    function ( $v, $k ) { return "<a href='" . $v . "'>" . $k . "th</a>"; },
							    $year_info['memories'],
							    array_keys( $year_info['memories'] )
							));
							?><p><strong>Memory Books (by Reunion):</strong><br><?php print $memories_output ?></p><?php } ?>-->
						<?php if ( !empty( $year_info['has_memory'] ) ) { ?><div class="class-memory-book"><a href="mailto:alumni@ripon.edu">Request Memory Book</a></div><?php } ?>
						<?php if ( !empty( $year_info['photo'] ) ) { ?><div class="class-photo"><a href="<?php print $year_info['photo']; ?>" class="lightbox-photo">Class Photo</a></div><?php } ?>
						<?php if ( !empty( $year_info['photo_reunion'] ) ) { ?><div class="reunion-photo"><a href="<?php print $year_info['photo_reunion']; ?>" class="lightbox-photo">Reunion Photo</a></div><?php } ?>
						<?php if ( !empty( $year_info['facebook'] ) ) { ?><div class="class-facebook"><a href="<?php print $year_info['facebook']; ?>">Class Facebook</a></div><?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="alum-add-story-form">
					<h5>Add My Story</h5>
					<?php print do_shortcode( '[gravityform id="174" title="false" description="false" /]' ); ?>
				</div>
				<div class="alum-filter">
					<form name="alum-filters" action="<?php print $base_url; ?>" method="get">
					Year: <select name="y" class="alum-year">
						<option value="0">- select year -</option>
						<?php
						global $years;
						foreach ( $years as $yr ) {
							print "<option value='" . $yr . "'" . ( $yr == $current_yr ? ' selected="selected"' : '' ) . ">" . $yr . "</option>";
						}
						?>
					</select> &nbsp; 
					Category: <select name="c" class="alum-category">
						<option value="0">- select category -</option>
						<option value='class-letter'<?php print ( $current_cat === 'class-letter' ? ' selected="selected"' : '' ); ?>>Class Letter</option>
						<option value='obituary'<?php print ( $current_cat === 'obituary' ? ' selected="selected"' : '' ); ?>>Obituary</option>
						<option value='news'<?php print ( $current_cat === 'news' ? ' selected="selected"' : '' ); ?>>News</option>
						<option value='sightings'<?php print ( $current_cat === 'sightings' ? ' selected="selected"' : '' ); ?>>Sightings</option>
					</select> &nbsp; 
					Name: <input type="text" name="t" class="alum-search" value="<?php print $current_search; ?>" />
					<input type="submit" value="Filter" />
					</form>
				</div>
			</div>

			<?php 

			global $wp_query;

			$wp_query->query_vars["orderby"] = 'modified';
			$wp_query->query_vars["order"] = 'DESC';
			$wp_query->query_vars["posts_per_page"] = 12;

			if ( !empty( $meta_query ) ) {
				$wp_query->query_vars['meta_query'] = $meta_query;
			}

			$wp_query->get_posts();

			if ( have_posts() ) : 
				?>

			<div class="alum-listing">
			<?php

				// Start the Loop.
				while ( have_posts() ) : the_post(); 
					?>
				<a href="#alum-<?php the_ID(); ?>" class="open-alum-link">
					<div class="alum">
						<div class="photo">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} else {
								show_alum_category_image( get_cmb2_value( 'alum_category' ) );
							}
							?>
						</div>
						<div class="info group">
							<h5><?php print substr( get_the_title(), 0, 50 ); print ( strlen( get_the_title() ) > 50 ? '...' : '' ); ?></h5>
							<?php if ( has_cmb2_value( 'alum_submitter' ) ) { ?><div class="quiet">Submitted by: <?php show_cmb2_value( 'alum_submitter' ) ?></div><?php } ?>
							<div class="alum-year"><?php show_cmb2_value( 'alum_year' ) ?></div>
							<div class="alum-location"><?php show_cmb2_value( 'alum_city' ); ?>, <?php show_cmb2_value( 'alum_state' ) ?></div>
						</div>
						<div class="alum-category alum-category-<?php show_cmb2_value( 'alum_category' ) ?>"><?php print ucwords( str_replace( '-', ' ', get_cmb2_value( 'alum_category' ) ) ); ?></div>
					</div>
				</a>
				<div class="alum-details mfp-hide" id="alum-<?php the_ID(); ?>">
					<h3><?php the_title(); ?></h3>
					<div class="details">
						<div class="details-photo">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} else {
								show_alum_category_image( get_cmb2_value( 'alum_category' ) );
							}
							?>
						</div>
						<h5><?php show_cmb2_value( 'alum_name_first' ); ?> <?php show_cmb2_value( 'alum_name_last' ) ?></h5>
						<div class="alum-year"><strong>Class of <?php show_cmb2_value( 'alum_year' ) ?></strong></div>
						<div class="alum-location"><?php show_cmb2_value( 'alum_city' ); ?>, <?php show_cmb2_value( 'alum_state' ) ?></div>
						<div class="alum-category alum-category-<?php show_cmb2_value( 'alum_category' ) ?>"><?php print ucwords( str_replace( '-', ' ', get_cmb2_value( 'alum_category' ) ) ); ?></div>
						<div class="details-content">
							<p><?php the_content(); ?></p>
							<?php if ( has_cmb2_value( 'alum_submitter' ) ) { ?><p class="quiet">Submitted by: <?php show_cmb2_value( 'alum_submitter' ) ?></p><?php } ?>
						</div>
					</div>
				</div>
					<?php

				endwhile;
				?>
				<div class="group pagination">
					<?php echo paginate_links(); ?>
				</div>
				<?php
			else : ?>
				<p>No results for that criteria. Try selecting fewer filters or changing your search term.</p>
				<?php

			endif;
			?>
			</div>

		</div>

	</section><!-- #primary -->

<?php

get_footer();

?>