<?php
/**
 * The Template for displaying all single posts
 */

get_header();

$education = get_cmb_value( "faculty_education" );
$courses = get_cmb_value( "faculty_courses" );

?>
	<div id="primary" class="faculty wrap group" role="main">

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
		<div class="third">
			<button class="back-to-faculty-list">&laquo; Back to Directory</button>
			<div class="faculty-info">
				<?php the_post_thumbnail() ?>
				<h2><?php the_title(); ?></h2>
				<p class="faculty-title"><?php print get_cmb_value( "faculty_title" ); ?></p>
				<p class="faculty-contact">
					<a href="mailto:<?php print get_cmb_value( "faculty_email" ); ?>"><?php print get_cmb_value( "faculty_email" ); ?></a><br>
					<?php print get_cmb_value( "faculty_phone" ); ?><br>
					Office: <?php print get_cmb_value( "faculty_office" ); ?>
					<?php 
					if ( !empty( get_cmb_value( "faculty_website" ) ) ) {
						print "<br><a href='" . get_cmb_value( "faculty_website" ) . "' target='_blank'>Website</a>";
					}
					?>
				</p>
			</div>
			<div class="tab-nav">
				<ul>
					<li class="basic">Basic Information</li>
					<?php do_faculty_tab_nav( "Awards &amp; Honors", "awards" ) ?>
					<?php do_faculty_tab_nav( "Publications", "publications" ) ?>
					<?php do_faculty_tab_nav( "Areas of Interest", "areas" ) ?>
					<?php do_faculty_tab_nav( "Professional Affiliations", "affiliations" ) ?>
					<?php do_faculty_tab_nav( "Presentations", "presentations" ) ?>
					<?php do_faculty_tab_nav( "Pedagogy", "pedagogy" ) ?>
					<?php do_faculty_tab_nav( "Production Credits", "credits" ) ?>
					<?php do_faculty_tab_nav( "Professional Experience", "experience" ) ?>
				</ul>
			</div>
		</div><!-- #content -->
		<div class="two-third tab-container">

			<div class="tab-content basic first">
				<h1>Basic Information</h1>
				<?php 
				if ( !empty( $education ) ) {
					?>
				<h3>Education</h3>
					<?php 
					print wpautop( $education );
				} 
				?>
				<?php 
				if ( !empty( $courses ) ) {
					?>
				<h3>Courses Taught</h3>
					<?php 
					print wpautop( $courses );
				} 
				?>
			</div>

			<?php do_faculty_tab_content( "Awards &amp; Honors", "awards" ); ?>
			<?php do_faculty_tab_content( "Publications", "publications" ); ?>
			<?php do_faculty_tab_content( "Areas of Interest", "areas" ); ?>
			<?php do_faculty_tab_content( "Professional/Scholarly Affiliations", "affiliations" ) ?>
			<?php do_faculty_tab_content( "Presentations", "presentations" ) ?>
			<?php do_faculty_tab_content( "Pedagogy", "pedagogy" ) ?>
			<?php do_faculty_tab_content( "Production/Performance Credits", "credits" ) ?>
			<?php do_faculty_tab_content( "Professional Experience", "experience" ) ?>

		</div>
			<?php
			endwhile;
		endif;
		 ?>

	</div><!-- #primary -->
<?php

get_footer();

?>