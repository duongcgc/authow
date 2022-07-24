jQuery( function ( $ ) {

	$( 'tr.type-goso_slider' ).parent().sortable( {
		axis                : 'y',
		placeholder         : 'ui-state-highlight',
		forcePlaceholderSize: true,
		update              : function ( event, ui ) {
			var theOrder = $( this ).sortable( 'toArray' );
			var nonce = $( this ).closest( 'form#posts-filter' ).children( '#_wpnonce' ).attr( 'value' );
			var data = {
				action              : 'goso_update_slide_order',
				postType            : 'goso_slider',
				order               : theOrder,
				goso_meta_box_nonce: nonce
			};

			$.post( ajaxurl, data );
		}
	} ).disableSelection();

	//shifty fix for the title column header in the home slider section
	if ( $( 'td.post-title' ).parent().hasClass( 'type-goso_slider' ) ) {
		$( 'th#title, th.column-title' ).html( '<span>Actions</span>' );
	}

} );