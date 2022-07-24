wp.customize.controlConstructor['gosodesign-custom-range-slider'] = wp.customize.Control.extend({
	ready: function() {
		'use strict';
		var control = this,
		    value,
		    thisInput,
		    inputDefault,
		    changeAction,
			controlClass = '.customize-control-gosodesign-custom-range-slider',
			footerControl = jQuery( '#customize-footer-actions' );
		
		// Calling range slider
		jQuery( '.gosodesign-range-slider' ).each( function() {
			var _this = jQuery( this );
			var _input = _this.closest( 'label' ).find( 'input[type="number"]' );
			var _text = _input.next( '.value' );
		});
		
		// Update the range value
		jQuery( controlClass + ' .goso_range_value input[type=number]' ).on( 'input', function() {
			value = jQuery( this ).attr( 'value' );
			if ( '' == value ) {
				value = -1;
			}
		});

		// Reset button
		jQuery( controlClass + ' .gosodesign-reset' ).on( 'click', function() {
			var icon = jQuery( this ),
				visible_area = icon.closest( '.goso-range-title-area' ).next( '.goso-range-slider-areas' ).children( 'label:visible' ),
				input = visible_area.find( 'input[type=number]' ),
				slider_value = visible_area.find( '.gosodesign-range-slider' ),
				visual_value = visible_area.find( '.goso_range_value' ),
				reset_value = input.attr( 'data-reset_value' );
			
			input.val( reset_value ).change();
			visual_value.find( 'input' ).val( reset_value );
			visual_value.find( '.value' ).text( reset_value );
			
			if ( '' == reset_value ) {
				reset_value = -1;
			}
		});
		
		// Activate icon when click
		jQuery( controlClass + ' .gosodesign-range-slider-control' ).each( function() {
			var _this = jQuery( this );
			_this.find( '.goso-device-controls' ).children( 'span:first-child' ).addClass( 'selected' );
			_this.find( '.range-option-area:first-child' ).show();
		});
		
		// Click on icons
		jQuery( controlClass + ' .goso-device-controls > span' ).on( 'click', function( event ) {
			var device = jQuery( this ).data( 'option' );
			
			jQuery( controlClass + ' .goso-device-controls span' ).each( function() {
				var _this = jQuery( this );
				if ( device == _this.attr( 'data-option' ) ) {
					_this.addClass( 'selected' );
					_this.siblings().removeClass( 'selected' );
				}
			});
			
			jQuery( controlClass + ' .goso-range-slider-areas label' ).each( function() {
				var _this = jQuery( this );
				if ( device == _this.attr( 'data-option' ) ) {
					_this.show();
					_this.siblings().hide();
				}
			});
			
			// Set the device currently viewing
			wp.customize.previewedDevice.set( jQuery( event.currentTarget ).data( 'option' ) );
		} );
		
		// Change devices on footer
		footerControl.find( '.devices button' ).on( 'click', function() {
			var device = jQuery( this ).data( 'device' );
			jQuery( controlClass + ' .goso-device-controls span' ).each( function() {
				var _this = jQuery( this );
				if ( device == _this.attr( 'data-option' ) ) {
					_this.addClass( 'selected' );
					_this.siblings().removeClass( 'selected' );
				}
			});
			
			jQuery( controlClass + ' .goso-range-slider-areas label' ).each( function() {
				var _this = jQuery( this );
				if ( device == _this.attr( 'data-option' ) ) {
					_this.show();
					_this.siblings().hide();
				}
			});
		});
		
		// Apply for desktop
		control.container.on( 'input change', '.desktop-range',
			function() {
				control.settings['desktop'].set( jQuery( this ).val() );
			}
		);
		
		// Apply for mobile
		control.container.on( 'input change', '.mobile-range',
			function() {
				control.settings['mobile'].set( jQuery( this ).val() );
			}
		);
	}

});