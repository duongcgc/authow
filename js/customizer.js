/**
 * Script for customizer controls.
 */
(function ( $, api ){
	// View documentation
	$( '<a  style="display: inline-block; background: #ff0000; padding: 6px 10px; color: #fff; text-decoration: none; line-height: 1; white-space: nowrap; font-size: 13px; margin-top: 10px; text-transform: uppercase; outline: none; font-weight: 500;" class="goso-docs" href="https://authow.gosodesign.net/authow-document" target="_blank"></a>' )
		.text( AuthowCustomizerDoc.docs )
		.appendTo( '.preview-notice' );

})( jQuery, wp.customize );