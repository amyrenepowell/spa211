/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {
	console.log('theme customizer loaded');

	// Update the site title in real time...
	wp.customize( 'woc_layout', function( value ) {
		value.bind( function( newval ) {
			//$( '#site-title a' ).html( newval );
			console.log(newval);
		} );
	} );

	wp.customize( 'woc_facebook', function( value ) {
		value.bind( function( to ) {
			console.log(to);
		});
	});
	
} )( jQuery );