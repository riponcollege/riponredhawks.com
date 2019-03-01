

// tab controls
jQuery(document).ready(function($){

	if ( $( '.tab-content.first' ).length ) {

		$( '.tab-nav li' ).click(function(){
			
			var target_class = $( this ).attr( 'class' ).replace( 'active', '' );
			var content_top = $( '.tab-container' ).offset().top;

			$( '.tab-content:not(.'+target_class+'):visible' ).slideUp( 'slow' );
			$( '.tab-content.'+target_class+':hidden' ).slideDown( 'slow' );

			$( '.tab-nav li' ).removeClass( 'active' );
			$(this).addClass( 'active' );

			// scroll up if we're past the top of the content
			$( 'html,body' ).animate({ scrollTop: content_top - 30 }, 700 );

		});
	}

	if ( $( '.area-tabs' ).length ) {

		// clicks of the majors tab
		$( '.area-tab-navigation li:first-child' ).click(function(){
			$( '.area-tab-navigation li.active' ).removeClass( 'active' );
			$( this ).addClass( 'active' );
			$( '.area-tab-content.minors' ).removeClass( 'active' ).hide();
			$( '.area-tab-content.majors' ).addClass( 'active' ).show();
		});

		// clicks of the minors tab
		$( '.area-tab-navigation li:nth-child(2)' ).click(function(){
			$( '.area-tab-navigation li.active' ).removeClass( 'active' );
			$( this ).addClass( 'active' );
			$( '.area-tab-content.majors' ).removeClass( 'active' ).hide();
			$( '.area-tab-content.minors' ).addClass( 'active' ).show();
		});

	}

	if ( $( '.tabs' ).length ) {
		var tabs = $( '.tabs' );

		tabs.find( '.tab-nav a' ).click(function(){
			
			// store the tab
			var tab = $( this );

			// split out the tab class
			var target_class = tab.attr( 'class' ).replace( 'tab-title ', '' ).replace( ' active', '' );

			// get the content element
			var tab_content = tabs.find( '.content.'+target_class );

			// hide all visible tab content and unhighlight tab
			tabs.find( '.tab-nav a' ).removeClass( 'active' );
			tabs.find( '.content' ).removeClass( 'active' );

			// set active tab and content.
			tab.addClass( 'active' );
			tab_content.addClass( 'active' );

		});
	}

});

