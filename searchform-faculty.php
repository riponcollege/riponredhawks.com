<div class="faculty-search-widget-container">
	<form role="search" method="get" id="searchform" class="searchform faculty-search" action="/faculty" _lpchecked="1">
		<input type="text" value="<?php print ( isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : "" ) ?>" name="s" id="s" placeholder="Search Name, Academic Department Or Area of Interest">
		<input type="hidden" name="post_type" value="faculty" />
		<button type="submit" id="searchsubmit"><i class="fa fa-lg fa-search"></i></button>
	</form>
</div>