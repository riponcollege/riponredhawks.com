<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>	
	
		</div>

	</section>
	
	<!--
	<footer class="footer fixed">

		<nav role="navigation">
			<?php footer_menu_display(); ?>
		</nav>

	</footer>
	-->
	
	<div class="footer-badge">
		Ripon College. Life Well Lived&reg;
	</div>

	<div class="colophon">
		
		<div class="addresses">
			<strong>Physical Address:</strong><br>
			<span class="fold"><a href="https://www.google.com/maps/place/300+Seward+St,+Ripon,+WI+54971/@43.8432217,-88.8409595,17z/data=!3m1!4b1!4m2!3m1!1s0x8801543f4dcd4019:0xbdb7efb240144666">300 W. Seward St. Ripon, WI 54971</a></span><br>
			<a href="/privacy-policy">Privacy Policy</a>
		</div>
		<div class="electronic">
			<strong>Email:</strong> <span class="fold"><a href="mailto:adminfo@ripon.edu">adminfo@ripon.edu</a></span><br>
			<strong>Phone:</strong> <span class="fold"><a href="tel:9207488115">920-748-8115</a></span><br>
			<a href="http://www.facebook.com/ripon.college"><img src="<?php bloginfo('template_url') ?>/img/social-facebook.png"></a>
			<a href="https://www.flickr.com/photos/ripon_college/"><img src="<?php bloginfo('template_url') ?>/img/social-flickr.png"></a>
			<a href="http://www.linkedin.com/groups?home=&gid=4646327&trk=anet_ug_hm"><img src="<?php bloginfo('template_url') ?>/img/social-linkedin.png"></a>
			<a href="https://twitter.com/riponcollege"><img src="<?php bloginfo('template_url') ?>/img/social-twitter.png"></a>
			<a href="http://www.youtube.com/riponcollegevideo"><img src="<?php bloginfo('template_url') ?>/img/social-youtube.png"></a>
			<a href="http://instagram.com/riponcollege"><img src="<?php bloginfo('template_url') ?>/img/social-instagram.png"></a>
		</div>
		
		<a href="/map" class="campus-map">Campus Map</a>

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>
<script async="async" src="https://apply.ripon.edu/ping"></script>
</body>
</html>