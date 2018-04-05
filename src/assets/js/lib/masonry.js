( function( $ ) {
	
	$( window ).on( 'load', function() {
		
		$( '.masonry' ).masonry( {

			itemSelector: '.masonry > *'

		} );
		
	} );
	
} )( jQuery );