jQuery( function ( $ ) {
	'use strict';

	var GOSOPOSTADMIN = GOSOPOSTADMIN || {};

	GOSOPOSTADMIN.colorPicker = function () {
		$( function() {
			$('.goso-color-picker').wpColorPicker();
		});
	},
	GOSOPOSTADMIN.imageSelect = function () {
		$( 'body' ).on( 'change', '.goso-image-select input', function () {
			var $this = $( this ),
				type = $this.attr( 'type' ),
				selected = $this.is( ':checked' ),
				$parent = $this.parent(),
				$others = $parent.siblings();
			if ( selected ) {
				$parent.addClass( 'goso-active' );
				if ( type === 'radio' ) {
					$others.removeClass( 'goso-active' );
				}
			} else {
				$parent.removeClass( 'goso-active' );
			}
		} );
		$( '.goso-image-select input' ).trigger( 'change' );
	},
	GOSOPOSTADMIN.metaboxTab = function () {
		$( '.goso-metabox-tabs' ).on( 'click', 'a', function ( e ) {
			e.preventDefault();

			var $li = $( this ).parent(),
				panel = $li.data( 'panel' ),
				$wrapper = $li.closest( '.goso-metabox-wrap' ),
				$panel = $wrapper.find( '.goso-tab-panel-' + panel );

			$li.addClass( 'tab-active' ).siblings().removeClass( 'tab-active' );
			$panel.show().siblings().hide();
		} );
	},
	GOSOPOSTADMIN.metaboxAccordion = function () {
		var acc = document.getElementsByClassName("goso-accordion-name");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.minHeight){
					panel.style.minHeight = null;
				} else {
					panel.style.minHeight = panel.scrollHeight + "px";
				}

				return false;
			});
		}
		return false;
	},
	GOSOPOSTADMIN.uploadImg = function () {
			var frame = wp.media( {
				title: GosoObject.WidgetImageTitle,
				multiple: false,
				library: { type: 'image' },
				button: { text: GosoObject.WidgetImageButton }
			} );

			$( 'body' ).on( 'click', '.goso-widget-image__select', function ( e ) {

					e.preventDefault();
					var $this = $( this ),
						$input = $this.siblings( 'input' ),
						$image = $this.siblings( 'img' ),
						$placeholder = $this.prev(),
						$savewidget = $this.closest( '.widget-inside' ).find( '.widget-control-save' );

					frame.off( 'select' )
					     .on( 'select', function () {
						     var id = frame.state().get( 'selection' ).toJSON()[0].id;
						     var url = frame.state().get( 'selection' ).toJSON()[0].url;
						     $input.val( id );
						     $input.data( 'url', url );
						     $image.attr( 'src', url ).removeClass( 'hidden' );
						     $placeholder.addClass( 'hidden' );
						     $savewidget.prop( "disabled", false );
					     } )
					     .open();
				} )
				.on( 'click', '.goso-widget-image__remove', function ( e ) {
					e.preventDefault();
					var $this = $( this ),
						$input = $this.siblings( 'input' ),
						$image = $this.siblings( 'img' ),
						$placeholder = $this.prev().prev(),
						$savewidget = $this.closest( '.widget-inside' ).find( '.widget-control-save' );

					$input.val( '' );
					$image.addClass( 'hidden' );
					$placeholder.removeClass( 'hidden' );
					$savewidget.prop( "disabled", false );
				} )
				.on( 'change', '.goso-widget-image__input', function ( e ) {
					e.preventDefault();
					var $this = $( this ),
						url = $this.data( url ),
						$image = $this.siblings( 'img' );
					$image.attr( 'src', url )[url ? 'removeClass' : 'addClass']( 'hidden' );


				} );


		};

	/* Init functions
	 ---------------------------------------------------------------*/
	$( document ).ready( function () {
		GOSOPOSTADMIN.colorPicker();
		GOSOPOSTADMIN.uploadImg();
		GOSOPOSTADMIN.imageSelect();
		GOSOPOSTADMIN.metaboxTab();
		GOSOPOSTADMIN.metaboxAccordion();
	});
} );

