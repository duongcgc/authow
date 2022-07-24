jQuery( function ( $ ) {
	'use strict';

	$( document ).on( 'change', '.goso-number-input, .goso-number-suffix', function () {
		var $number = $( this ).parent(),
			input = $number.find( '.goso-number-input' ).val(),
			unit = $number.find( '.goso-number-suffix' ).val();

		$number.find( '.wpb_vc_param_value' ).val( input + unit );
	} );
} );
