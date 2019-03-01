

// alum controls
jQuery(document).ready(function($){

	$('.open-alum-link').magnificPopup({
		type: 'inline',
		midClick: true
	});

	$('.alum-add-story').on( 'click', function(){
		$('.alum-add-story-form').toggle();
		if ( $('.alum-add-story-form').is(':visible') ) {
			$('.alum-add-story').html('Hide Form');
		} else {
			$('.alum-add-story').html('Add My Story');
		}
	});

	$('.alum-back').on( 'click', function(){
		location.href = '/alumni/';
	});

	$('.alum-reset').on( 'click', function(){
		location.href = '/rconnections';
	});

	$('.year-more').on( 'click', function(){
		$('.year-more-details').show();
		$('.year-more').hide();
	});

});

