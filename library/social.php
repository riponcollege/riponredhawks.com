<?php


// require_once( 'twitter/twitteroauth/twitteroauth.php' );



function twitter_posts() {

	/*
	// authenticate to Twitter
	$connection = new TwitterOAuth( '1atjbG2VbZSdIWZYSyOKeRPCS', 'zP4ELLpMNblCqBN0e0eoUmMEjinJww0w6ldMxM7OtxsGZGntKS' );

	// get the posts
	$posts = $connection->get( 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=riponcollege&count=8&exclude_replies=true' );

	// loop through them
	foreach ( $posts as $post ) { ?>
		<div class="post-twitter">
			<?php print make_clickable( $post->text ); ?>
		</div>
		<?php
	}
	*/
	?>
	<a class="twitter-timeline" href="https://twitter.com/riponcollege" data-chrome="nofooter noborders" height="500">Tweets by riponcollege</a>
	<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	<?php
}




// fetch the facebook feed for ripon and display it
function facebook_feed() {
	?>
	<iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fripon.college&width=600&colorscheme=light&show_faces=false&border_color&stream=true&header=true&height=500" scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:100%; height:500px; background: white; float:left; " allowtransparency="true"></iframe>
	<?php
}



?>