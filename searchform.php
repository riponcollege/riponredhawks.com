<form role="search" method="get" id="searchform" class="searchform" action="/" _lpchecked="1">
	<input type="text" value="<?php print ( isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : "" ) ?>" name="s" id="s" placeholder="Search Ripon">
	<button type="submit" id="searchsubmit"><i class="fa fa-lg fa-search"></i></button>
</form>