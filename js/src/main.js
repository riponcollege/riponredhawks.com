

// function to wrap the first [numWords] in [tag]
jQuery.fn.wrapStart = function ( numWords, tag ) { 

	if ( typeof( tag ) == 'undefined' ) {
		tag = 'span';
	}
    var node = this.contents().filter(function () { 
            return this.nodeType == 3 
        }).first(),
        text = node.text(),
        first = text.split(" ", numWords).join(" ");

    if (!node.length)
        return;

    node[0].nodeValue = text.slice(first.length);
    node.before('<' + tag + '>' + first + '</' + tag + '>');

};


// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// select some things we'll use to make things responsive
	var menu = $( 'header .main-menus' ),
		menu_toggle = $( 'header button.menu-toggle' ),
		menu_ul = menu.find( 'ul' ),
		fluid_images = $( '.content img' ),
		left_menu = $( '.left-menu' ),
		quick_nav = $( 'select.quick-nav' );


	// remove height and width from images inside
	fluid_images.removeAttr( 'width' ).removeAttr( 'height' );



	// search toggle
	$('.search-toggle').click(function(){
		$('.search').toggleClass( 'open' );
	});


	// quick navs
	quick_nav.change(function(){
		if ( $( this ).val() != '' ) {
			if ( $( this ).hasClass( 'new-window' ) ) {
				var new_window = window.open( $(this).val(), "_blank" );
			} else {
				window.location.href = $(this).val();
			}
		}
	});


	// hide main menu when clicked outside.
	$( 'body *:not(.nav-main):not(.menu-toggle)' ).click(function(){
		if ( !menu_ul.is( ':visible' ) && ( $(window).width() < 965 || Modernizr.pointerevents ) ) {
			menu_ul.hide();
		}
	})


	menu_toggle.click(function(){
		menu.slideToggle();
	});


	// show/hide menus when they click the toggler
	menu_ul.find( 'li.menu-item-has-children > a' ).click(function( event ){
		var submenu = $( this ).next( 'ul' );
		if ( !submenu.is( ':visible' ) && ( $(window).width() < 965 || Modernizr.pointerevents ) ) {
			event.preventDefault();
			submenu.show();
		}
	});


	// handle the left menu toggling
	left_menu.find( 'li.menu-item-has-children > a' ).click(function( event ){
		var menu_item = $( this ).parent( 'li' );
		var submenu = $( this ).next( 'ul.sub-menu' );
		if ( !submenu.hasClass( 'open' ) ) {
			event.preventDefault();
			menu_item.addClass( 'open' );
			submenu.addClass( 'open' );
		}
	});


	// auto-open the left submenus if the main menu item 
	// or one of its children is the current page.
	left_menu.find( 'li' ).each(function(){
		var item = $(this);
		if ( item.hasClass( 'current_page_parent' ) || item.hasClass( 'current-menu-item' ) || item.hasClass( 'current-menu-ancestor' ) ) {
			item.addClass( 'open' );
			item.find( 'ul.sub-menu' ).addClass( 'open' );
		}
	});


	// fluid width videos that maintain aspect ratio
	$( '.spotlight' ).fitVids();
	$( '.content' ).fitVids();


	// footer navigation text wrap
	$( 'footer nav li a' ).each(function(){
		$( this ).wrapStart( 1 );
	});


	// select the footer and colophon only once
	var colophon = $( 'div.colophon' );
	var footer = $( 'footer.footer' );
	var footer_badge = $( '.footer-badge' );


	// set the colophon margin based on footer height and padding
	if ( $(window).width() > 1099 ) {
		colophon.css( 'margin-top', footer.height() + parseInt( footer.css( 'padding-top' ) ) + parseInt( footer.css( 'padding-bottom' ) ) );
	}
	

	// when the viewport scrolls
	$( window ).scroll(function(){

		// if the window is wide enough, tack a margin onto the colophon
		if ( $(window).width() > 1099 ) {
			// get the document and window heights
			var doc_height = $( document ).height();
			var win_height = $( window ).height();

			// calculate colophon height including padding
			var col_height = colophon.height() + 
				footer_badge.height() +
				parseInt( colophon.css( 'padding-top' ) ) + 
				parseInt( colophon.css( 'padding-bottom' ) );

			// get current scrolling position
			var scroll_position = $( window ).scrollTop();

			// calculate footer height including padding
			var footer_height = $( 'footer.footer' ).height() + 
				parseInt( footer.css( 'padding-top' ) ) + 
				parseInt( footer.css( 'padding-bottom' ) );

			// if we've scrolled to the point where we can see the 
			// colophon content, snap the footer back to a static position
			// and remove the margin on the colophon.
			if ( doc_height - win_height - col_height < scroll_position ) {
				footer.removeClass( 'fixed' );
				$( "div.colophon" ).css( 'margin-top', 0 );
			} else {
				footer.addClass( 'fixed' );
				$( "div.colophon" ).css( 'margin-top', footer_height );
			}

		}


	});
	
	// add lightbox to any link with that class.
	$( '.lightbox-iframe' ).magnificPopup({ 'type': 'iframe' });

	$( '.lightbox-photo' ).magnificPopup({ 'type': 'image' });

});


