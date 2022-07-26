var vc_iframe = vc_iframe || {};
!function($) {
	'use strict';
	var GOSO = GOSO || {};
	GOSO.sticky = {
		init: function () {

			GOSO.sticky.stickySidebar();
			GOSO.sticky.headerSticky();
			GOSO.sticky.headerMobileSticky();

			$( window ).on( 'resize', function () {
				$( ".site-header" ).unstick();

				GOSO.sticky.headerSticky();

				if ( ! $( '.goso-header-mobile' ).hasClass( 'mobile' ) ) {
					$( '.goso-header-mobile' ).unstick();
					GOSO.sticky.headerMobileSticky();
				}
			} );
		},


		headerSticky: function () {
			if ( ! $( 'body' ).hasClass( 'header-sticky' ) || ! $().sticky || $( window ).width() < 1024 ) {
				return;
			}

			$( ".site-header" ).sticky( {
				topSpacing: (
					$( '#wpadminbar' ).length ? $( '#wpadminbar' ).height() : 0
				)
			} );
		},
		headerMobileSticky: function () {

			if ( ! $( 'body' ).hasClass( 'header-sticky' ) || ! $().sticky || $( window ).width() > 1024 ) {
				return false;
			}
			var offset = $( '#wpadminbar' ).length && $( window ).width() > 480 ? $( '#wpadminbar' ).height() : 0;

			$( '.goso-header-mobile' ).sticky( {
				topSpacing: offset,
				className: 'mobile-is-sticky',
				wrapperClassName: 'mobile-sticky-wrapper',
			} );

			return false;
		},
		stickySidebar: function () {

			if ( ! $( 'body' ).hasClass( 'goso_sticky_content_sidebar' ) || ! $().theiaStickySidebar || $( window ).width() < 992 ) {
				return false;
			}

			var top_margin = $( '.site-header' ).data( 'height' );

			$( '.goso-sticky-sidebar, .goso-sticky-content, .goso_vc_sticky_sidebar .goso-content-main, .goso_vc_sticky_sidebar .widget-area' ).theiaStickySidebar( {
				// settings
				additionalMarginTop: top_margin,
				additionalMarginBottom: 0
			} );
		}
	};
	GOSO.gosoVideo = function () {

		if ( $().magnificPopup ) {
			$( '.goso-popup-video' ).magnificPopup( {
				type: 'iframe',
				mainClass: 'mfp-fade'
			} );
		}

	};
	GOSO.toggleSocialMedia = function () {
		var $socialToggle = $( ".social-buttons__toggle" ),
			socialButtons = $( '.goso-block-vc .social-buttons' );

		$socialToggle.on( 'click', function ( e ) {
			e.preventDefault();

			socialButtons.removeClass( 'active' );

			var socailMedia = $( this ).closest( '.social-buttons' );

			if ( socailMedia.hasClass( 'active' ) ) {
				socailMedia.addClass( 'pbutton_close_click' ).removeClass( 'active' );

				setTimeout( function () {
					socailMedia.removeClass( 'pbutton_close_click' );
				}, 400 );
			}
		} );

		$( '#page' ).on( 'click', function ( e ) {

			if ( socialButtons.hasClass( 'active' ) ) {
				socialButtons.removeClass( 'active' );
			}
		} );

		$socialToggle.on( 'mouseover touchstart', function () {
			var $this = $( this ),
				parent = $this.parent();

			if ( parent.hasClass( 'active' ) ) {
				return false;
			}

			socialButtons.removeClass( 'active' );
			parent.addClass( 'active' );

		} );
	}
	GOSO.popupGallery = function () {
		if ( ! $().magnificPopup ) {
			return false;
		}

		$('.goso-image-popup-no-margins').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			fixedContentPos: true,
			mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
			image: {
				verticalFit: true
			},
			zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			}
		});

		$( '.popup-gallery-slider a' ).magnificPopup( {
			type: 'image'
		} );


		$( '.goso-popup-gallery' ).each( function () {
			var $this = $( this ),
				id = $this.attr( 'id' );

			$( '#' + id + ' a' ).magnificPopup( {
				type: 'image',
				closeOnContentClick: true,
				closeBtnInside: false,
				fixedContentPos: true,
				image: {
					verticalFit: true
				},
				gallery: {
					enabled: true
				},
				zoom: {
					enabled: false,
					duration: 300
				}
			} );
		} );
	}
	GOSO.ajaxDoBlockRequest = {
		// Init the module
		init: function () {
			GOSO.ajaxDoBlockRequest.link();
			GOSO.ajaxDoBlockRequest.nextPrev();
			GOSO.ajaxDoBlockRequest.loadMore();
			GOSO.ajaxDoBlockRequest.infinityScroll();
			GOSO.ajaxDoBlockRequest.megamenu();
		},
		megamenu: function () {

			$( 'body' ).on( 'click', '.goso-mega-pag', function ( event ) {
				event.preventDefault();

				if ( $( this ).hasClass( 'goso-pag-disabled' ) ) {
					return false;
				}

				var currentBlockObj = $( this ).data( 'block_id' ),
					$currentBlockObj = $( '#' + currentBlockObj ),
					$blockVC = $currentBlockObj.closest( '.goso-mega-row' ),
					dataFilter = $blockVC.data( 'atts_json' ),
					paged = $blockVC.attr( 'data-current' ),
					blockHeight = $currentBlockObj.height(),
					$is_cache = false;

				var OBjBlockData = GOSO.ajaxDoBlockRequest.getOBjBlockData( $blockVC.attr( 'data-blockUid' ) );
				dataFilter = OBjBlockData.atts_json ? JSON.parse( OBjBlockData.atts_json ) : OBjBlockData.atts_json;

				if ( $( this ).hasClass( 'goso-slider-next' ) ) {
					paged ++;
				}

				if ( $( this ).hasClass( 'goso-slider-prev' ) ) {
					paged --;
				}

				$blockVC.find( '.goso-block-pag' ).removeClass( 'goso-pag-disabled' );

				// Fix height block
				$currentBlockObj.css( 'min-height', blockHeight + 'px' );

				var data = {
					action: 'goso_ajax_mega_menu',
					datafilter: dataFilter,
					paged: paged.toString(),
					styleAction: 'next_prev',
					nonce: GOSOLOCALIZE.nonce
				};

				var currentBlockObjSignature = JSON.stringify( data );

				if ( GOSOLOCALCACHE.exist( currentBlockObjSignature ) ) {
					var responseData = GOSOLOCALCACHE.get( currentBlockObjSignature );

					$is_cache = true;
					setTimeout( function () {
						$blockVC.attr( 'data-current', paged );
						$currentBlockObj.html( responseData.items ).removeClass( 'ajax-loading' );

						GOSO.ajaxDoBlockRequest.animateMegaLoadITems( $currentBlockObj, $is_cache );
						GOSO.ajaxDoBlockRequest.hidePag( $blockVC, responseData );
					}, 300 );

					return false;
				}

				$currentBlockObj.addClass( 'ajax-loading' );

				$.post( GOSOLOCALIZE.ajaxUrl, data, function ( response ) {
					$blockVC.attr( 'data-current', paged );


					$currentBlockObj.html( response.data.items );

					GOSO.ajaxDoBlockRequest.animateMegaLoadITems( $currentBlockObj, $is_cache );
					GOSO.ajaxDoBlockRequest.hidePag( $blockVC, response.data );
					GOSO.ajaxDoBlockRequest.saveAjaxData( currentBlockObjSignature, response.data );
				} );

				// Save items page 1 of block
				if ( 1 === paged - 1 ) {

					var dataFirstItems = {
						action: 'goso_ajax_mega_menu',
						datafilter: dataFilter,
						paged: '1',
						styleAction: 'next_prev',
						nonce: GOSOLOCALIZE.nonce
					};

					$.post( GOSOLOCALIZE.ajaxUrl, dataFirstItems, function ( response ) {
						GOSO.ajaxDoBlockRequest.saveAjaxData( JSON.stringify( dataFirstItems ), response.data );
					} );
				}

			} );
		},
		link: function () {
			$( '.goso-subcat-link' ).click( function ( event ) {
				event.preventDefault();

				if ( $( this ).hasClass( 'active' ) ) {
					return false;
				}

				var currentBlockObj = $( this ).data( 'block_id' ),
					$currentBlockObj = $( '#' + currentBlockObj ),
					$blockVC = $currentBlockObj.closest( '.goso-block-vc' ),
					blockHeight = $currentBlockObj.height(),
					$is_cache = false;

				$blockVC.find( '.goso-subcat-link' ).removeClass( 'active' );
				$( this ).addClass( 'active clicked' );

				var dataFilter = $blockVC.data( 'atts_json' ),
					dataContent = $blockVC.data( 'content' ),
					filterValue = $( this ).data( 'filter_value' );

				var OBjBlockData = GOSO.ajaxDoBlockRequest.getOBjBlockData( $blockVC.attr( 'data-blockUid' ) );
				dataFilter = JSON.parse( OBjBlockData.atts_json );
				dataContent = OBjBlockData.content;

				if ( filterValue ) {
					dataFilter['category_ids'] = filterValue.toString();
				}

				var data = {
					action: 'goso_ajax_block',
					datafilter: dataFilter,
					datacontent: dataContent,
					styleAction: 'link',
					nonce: GOSOLOCALIZE.nonce
				};

				// Fix height block
				$currentBlockObj.css( 'min-height', blockHeight + 'px' );

				var currentBlockObjSignature = JSON.stringify( data );

				if ( GOSOLOCALCACHE.exist( currentBlockObjSignature ) ) {
					var responseData = GOSOLOCALCACHE.get( currentBlockObjSignature );
					$is_cache = true;
					setTimeout( function () {
						$blockVC.attr( 'data-atts_json', JSON.stringify( dataFilter ) ).attr( 'data-current', 1 );

						$currentBlockObj.html( responseData.items ).removeClass( 'ajax-loading' );

						GOSO.ajaxDoBlockRequest.animateLoadITems( $currentBlockObj, '1', $is_cache );
						GOSO.ajaxDoBlockRequest.hidePag( $blockVC, responseData );
					}, 300 );

					return false;
				}

				$currentBlockObj.addClass( 'ajax-loading' );

				$.post( GOSOLOCALIZE.ajaxUrl, data, function ( response ) {

					$blockVC.attr( 'data-atts_json', JSON.stringify( dataFilter ) ).attr( 'data-current', 1 );

					$currentBlockObj.html( response.data.items ).removeClass( 'ajax-loading' );

					GOSO.ajaxDoBlockRequest.animateLoadITems( $currentBlockObj, '1', $is_cache );
					GOSO.ajaxDoBlockRequest.hidePag( $blockVC, response.data );
					GOSO.ajaxDoBlockRequest.saveAjaxData( currentBlockObjSignature, response.data );
				} );

				// Save items page 1 of block
				var preFilterValue = $blockVC.find( '.goso-subcat-item-1' ).data( 'filter_value' );
				dataFilter['category_ids'] = preFilterValue ? preFilterValue.toString() : '';

				var dataFirstItems = {
					action: 'goso_ajax_block',
					datafilter: dataFilter,
					datacontent: dataContent,
					styleAction: 'link',
					nonce: GOSOLOCALIZE.nonce
				};

				var currentBlockObjFirstItems = JSON.stringify( dataFirstItems );

				if ( filterValue && ! GOSOLOCALCACHE.exist( currentBlockObjFirstItems ) ) {
					$.post( GOSOLOCALIZE.ajaxUrl, dataFirstItems, function ( response ) {

						GOSO.ajaxDoBlockRequest.saveAjaxData( currentBlockObjFirstItems, response.data );
					} );
				}
			} );
		},
		nextPrev: function () {
			$( 'body' ).on( 'click', '.goso-block-pag', function ( event ) {
				event.preventDefault();

				var start = new Date().getTime();
				if ( $( this ).hasClass( 'goso-pag-disabled' ) ) {
					return false;
				}

				var currentBlockObj = $( this ).data( 'block_id' ),
					$currentBlockObj = $( '#' + currentBlockObj ),
					$blockVC = $currentBlockObj.closest( '.goso-block-vc' ),
					dataContent = $blockVC.data( 'content' ),
					dataFilter = $blockVC.data( 'atts_json' ),
					paged = $blockVC.attr( 'data-current' ),
					filterValue = $blockVC.find( '.goso-subcat-link.active' ).data( 'filter_value' ),
					blockHeight = $currentBlockObj.height(),
					$is_cache = false;


				var OBjBlockData = GOSO.ajaxDoBlockRequest.getOBjBlockData( $blockVC.attr( 'data-blockUid' ) );

				dataFilter = OBjBlockData.atts_json ? JSON.parse( OBjBlockData.atts_json ) : OBjBlockData.atts_json;
				dataContent = OBjBlockData.content;

				if ( filterValue ) {
					dataFilter['category_ids'] = filterValue.toString();
				}

				if ( $( this ).hasClass( 'goso-slider-next' ) ) {
					paged ++;
				}

				if ( $( this ).hasClass( 'goso-slider-prev' ) ) {
					paged --;
				}

				$blockVC.find( '.goso-block-pag' ).removeClass( 'goso-pag-disabled' );

				// Fix height block
				$currentBlockObj.css( 'min-height', blockHeight + 'px' );

				var data = {
					action: 'goso_ajax_block',
					datafilter: dataFilter,
					paged: paged.toString(),
					styleAction: 'next_prev',
					datacontent: dataContent,
					nonce: GOSOLOCALIZE.nonce
				};

				var currentBlockObjSignature = JSON.stringify( data );

				if ( GOSOLOCALCACHE.exist( currentBlockObjSignature ) ) {

					var responseData = GOSOLOCALCACHE.get( currentBlockObjSignature );
					$is_cache = true;

					$blockVC.attr( 'data-current', paged );

					var content = jQuery( responseData.items );
					$currentBlockObj.html( content );

					GOSO.ajaxDoBlockRequest.animateLoadITems( $currentBlockObj, paged, $is_cache );
					GOSO.ajaxDoBlockRequest.hidePag( $blockVC, responseData );

					return false;
				}

				$currentBlockObj.addClass( 'ajax-loading' );

				$.post( GOSOLOCALIZE.ajaxUrl, data, function ( response ) {

					$blockVC.attr( 'data-current', paged );

					var content = jQuery( response.data.items );
					$currentBlockObj.html( content );
					GOSO.ajaxDoBlockRequest.animateLoadITems( $currentBlockObj, paged, $is_cache );
					GOSO.ajaxDoBlockRequest.hidePag( $blockVC, response.data );
					GOSO.ajaxDoBlockRequest.saveAjaxData( currentBlockObjSignature, response.data );

				} );

				// Save items page 1 of block
				if ( 1 === paged - 1 ) {

					var dataFirstItems = {
						action: 'goso_ajax_block',
						datafilter: dataFilter,
						paged: '1',
						styleAction: 'next_prev',
						datacontent: dataContent,
						nonce: GOSOLOCALIZE.nonce
					};

					$.post( GOSOLOCALIZE.ajaxUrl, dataFirstItems, function ( response ) {
						GOSO.ajaxDoBlockRequest.saveAjaxData( JSON.stringify( dataFirstItems ), response.data );
					} );
				}

			} );
		},
		loadMore: function () {
			$( 'body' ).on( 'click', '.goso-block-ajax-more-button', function ( event ) {
				GOSO.ajaxDoBlockRequest.actionLoadMore( $( this ) );
			} );
		},

		infinityScroll: function () {
			var $this_scroll = $( '.goso-block-ajax-more-button.infinite_scroll' );

			if ( ! $this_scroll.length ) {
				return false;
			}

			$( window ).on( 'scroll', function () {
				var hT = $this_scroll.offset().top,
					hH = $this_scroll.outerHeight(),
					wH = $( window ).height(),
					wS = $( this ).scrollTop();

				if ( wS > (
						hT + hH - wH
					) ) {

					GOSO.ajaxDoBlockRequest.actionLoadMore( $this_scroll );
				}
			} ).trigger('scroll');
		},
		getOBjBlockData: function ( $blockID ) {
			var $obj = new gosoBlock();
			$.each( gosoBlocksArray, function ( index, block ) {

				if ( block.blockID === $blockID ) {
					$obj = gosoBlocksArray[index];
				}
			} );

			return $obj;
		},

		actionLoadMore: function ( $this ) {

			if ( $this.hasClass( 'loading-posts' ) ) {
				return false;
			}

			var mes = $this.data( 'mes' ),
				currentBlockObj = $this.data( 'block_id' ),
				$currentBlockObj = $( '#' + currentBlockObj ),
				$ajaxLoading = $currentBlockObj.find( '.goso-loader-effect' ),
				$blockVC = $currentBlockObj.closest( '.goso-block-vc' ),
				$contentItems = $currentBlockObj.find( '.goso-block_content__items' ),
				dataFilter = $blockVC.data( 'atts_json' ),
				dataContent = $blockVC.data( 'content' ),
				filterValue = $blockVC.find( '.goso-subcat-link.active' ).data( 'filter_value' ),
				paged = $blockVC.attr( 'data-current' ),
				$is_cache = false;

			var OBjBlockData = GOSO.ajaxDoBlockRequest.getOBjBlockData( $blockVC.attr( 'data-blockUid' ) );
			dataFilter = JSON.parse( OBjBlockData.atts_json );
			dataContent = OBjBlockData.content;

			if ( filterValue ) {
				dataFilter['category_ids'] = filterValue.toString();
			}

			paged ++;

			$this.addClass( 'loading-posts' );

			var data = {
				action: 'goso_ajax_block',
				datafilter: dataFilter,
				styleAction: 'load_more',
				paged: paged,
				datacontent: dataContent,
				nonce: GOSOLOCALIZE.nonce
			};

			$.post( GOSOLOCALIZE.ajaxUrl, data, function ( response ) {

				if ( response.data.items ) {

					$ajaxLoading.remove();
					$currentBlockObj.append( response.data.items ).removeClass( 'ajax-loading' );
					$this.removeClass( 'loading-posts' );

				} else {
					$this.find( ".ajax-more-text" ).text( mes );
					$this.find( "i" ).remove();
					$this.removeClass( 'loading-posts' );
					setTimeout( function () {
						$this.parent( '.goso-ajax-more' ).remove();
					}, 1200 );
				}

				$blockVC.attr( 'data-current', paged );
				GOSO.ajaxDoBlockRequest.animateLoadITems( $currentBlockObj, paged, $is_cache );
			} );
		},

		animateLoadITems: function ( $currentBlockObj, currentPage, $is_cache ) {
			var theBlockListPostItem = $currentBlockObj.find( '.goso-block-items__' + currentPage );

			// Animate the loaded items
			theBlockListPostItem.find( '.goso-post-item' ).velocity( {opacity: 0} );
			$currentBlockObj.removeClass( 'ajax-loading' );
			theBlockListPostItem.find( '.goso-post-item' ).velocity( 'stop' ).velocity( 'transition.slideUpIn', {
				stagger: 100,
				duration: 500,
				complete: function () {
					$currentBlockObj.attr( 'style', '' );
					GOSO.ajaxDoBlockRequest.ajaxSuccess( $currentBlockObj, $is_cache );
				}
			} );

		},
		animateMegaLoadITems: function ( $currentBlockObj, $is_cache ) {
			// Animate the loaded items
			$currentBlockObj.find( '.goso-mega-post' ).velocity( {opacity: 0} );
			$currentBlockObj.removeClass( 'ajax-loading' );
			$currentBlockObj.find( '.goso-mega-post' ).velocity( 'stop' ).velocity( 'transition.slideUpIn', {
				stagger: 100,
				duration: 200,
				complete: function () {
					GOSO.ajaxDoBlockRequest.ajaxSuccess( $currentBlockObj, $is_cache );
					$currentBlockObj.attr( 'style', '' );
				}
			} );
		},

		hidePag: function ( $blockVC, responseData ) {

			var $pagNext = $blockVC.find( '.goso-slider-next' ),
				$pagPrev = $blockVC.find( '.goso-slider-prev' ),
				$pagination = $blockVC.find( '.goso-pagination' );

			if ( responseData.hidePagNext ) {
				$pagNext.addClass( 'goso-pag-disabled' );
				$pagination.addClass( 'goso-ajax-more-disabled' );
			} else {
				$pagNext.removeClass( 'goso-pag-disabled' );
				$pagination.removeClass( 'goso-ajax-more-disabled' );
			}

			if ( responseData.hidePagPrev ) {
				$pagPrev.addClass( 'goso-pag-disabled' );
			} else {
				$pagPrev.removeClass( 'goso-pag-disabled' );
			}
		},

		ajaxSuccess: function ( $currentBlockObj, $is_cache ) {
			if ( ! $is_cache ) {
				GOSO.gosoLazy();
			}

			GOSO.general.fitvids( $currentBlockObj );
			GOSO.toggleSocialMedia();
			GOSO.popupGallery();
			GOSO.gosoVideo();
			GOSO.sticky.stickySidebar();
			GOSO.EasyPieChart();
		},

		saveAjaxData: function ( key, data ) {

			var dataPost = data.items;
			dataPost = dataPost.replace( /data-bgset="/g, 'style="background-image: url(' );
			dataPost = dataPost.replace( /" data-delay/g, ');" data-delay' );

			$.each( data, function ( index, value ) {
				if ( 'items' === index ) {
					data[index] = dataPost;
				}
			} );

			GOSOLOCALCACHE.set( key, data );
		}
	};
	GOSO.gosoLazy = function () {

		/*$( '.goso-lazy' ).Lazy( {
			effect: 'fadeIn',
			effectTime: 300,
			scrollDirection: 'both'
		} );*/
		//lazySizes.init();
	};
	GOSO.sliderOwl = function ( $item ) {
		$item.each( function () {
			var $this = $( this ),
				$gosoBlock = $this.closest( '.goso-block-vc' ),
				$gosoNav = $gosoBlock.find( '.goso-slider-nav' ),
				$customNext = $gosoBlock.find( '.goso-slider-next' ),
				$customPrev = $gosoBlock.find( '.goso-slider-prev' ),
				$dataStyle = $this.data( 'style' ),
				$dataItems = $this.data( 'items' ),
				$dataAutoWidth = $this.data( 'autowidth' ),
				$dataAuto = $this.data( 'auto' ),
				$dataAutoTime = $this.data( 'autotime' ),
				$dataSpeed = $this.data( 'speed' ),
				$dataLoop = $this.data( 'loop' ),
				$dataDots = $this.data( 'dots' ),
				$dataNav = $this.data( 'nav' ),
				$dataCenter = $this.data( 'center' ),
				$dataVideo = $this.data( 'video' ),
				$dataVertical = $this.data( 'vertical' ),
				$dataMagrin = $this.data( 'magrin' ),
				$lazyLoad = true,
				$dataReponsive = {};

			if ( 2 === $dataItems ) {
				$dataReponsive = {
					0: {items: 1, autoWidth: false},
					480: {items: 2}
				};
			}

			if ( (
				     3 === $dataItems || $this.hasClass( 'goso-related-carousel' )
			     ) && 'style-27' !== $dataStyle ) {
				$dataReponsive = {
					0: {items: 1, autoWidth: false},
					480: {items: 2, autoWidth: false},
					992: {items: 3}
				};
			}

			if ( 4 === $dataItems ) {
				$dataReponsive = {
					0: {items: 1, autoWidth: false},
					480: {items: 2, autoWidth: false},
					960: {items: 3},
					1100: {items: 4}
				};
			}

			if ( 'style-7' === $dataStyle ) {
				$dataReponsive = {
					0: {items: 1, autoWidth: false},
					900: {items: 1, autoWidth: true}
				};
			}

			if ( 'style-18' === $dataStyle ) {
				$dataReponsive = {
					0: {items: 1, autoWidth: false},
					768: {items: 2, autoWidth: false}
				};
			}

			if ( 'style-10' === $dataStyle ) {
				$dataReponsive = {
					0: {items: 1, autoWidth: false},
					768: {items: 1, autoWidth: false},
					690: {items: 2}
				};
			}

			if ( 1 === $dataAutoWidth && 'style-27' !== $dataStyle && 'style-7' !== $dataStyle ) {
				$dataReponsive = {
					0: {items: 1, autoWidth: false},
					480: {items: 2},
					768: {items: 2},
					992: {items: 3}
				};
			}

			var owl_args = {
				loop: 1 === $dataLoop ? false : true,
				margin: $dataMagrin,
				items: $dataItems ? $dataItems : 3,
				navSpeed: $dataSpeed,
				dotsSpeed: $dataSpeed,
				nav: 1 === $dataNav ? true : false,
				dots: 1 === $dataDots ? true : false,
				navText: ['<i class="gosoicon-left-chevron"></i>', '<i class="gosoicon-right-chevron"></i>'],
				autoplay: 1 === $dataAuto ? true : false,
				autoplayTimeout: $dataAutoTime,
				autoHeight: false,
				center: 1 === $dataCenter ? true : false,
				autoWidth: 1 === $dataAutoWidth ? true : false,
				autoplayHoverPause: true,
				autoplaySpeed: $dataSpeed,
				video: 1 === $dataVideo ? true : false,
				animateOut: 1 === $dataVertical ? 'fadeOutRightNewsTicker' : false,
				animateIn: 1 === $dataVertical ? 'fadeInRightNewsTicker' : false,
				lazyLoad: $lazyLoad,
				responsive: $dataReponsive,
			};

			if( $this.hasClass( 'goso-slider-fullscreen' ) ){
				var slideHeight = parseFloat( $(window).height() ),
					slidewidth = parseFloat( $(window).width() ),
					sliderRatio = slideHeight / slidewidth * 100,
					sliderRatio = sliderRatio.toFixed(2) + '%';

				$this.find( '.goso-slider__item' ).css('padding-top',sliderRatio);
			}

			$this.imagesLoaded( { background: '.goso-slider__item' }, function () {
				$this.owlCarousel( owl_args );
			} );

			$this.on( 'initialized.owl.carousel', function ( event ) {
				GOSO.gosoLazy();

				var $jarallax = $this.find( '.goso-jarallax-slider' );

				if( $jarallax.length ){
					$jarallax.jarallax({elementInViewport: $this, imgPosition : '30% 50%' }  );
				}
			} );

			// Go to the next item
			$customNext.click( function ( ev ) {
				ev.preventDefault();
				$this.trigger( 'next.owl.carousel' );
				return false;
			} );

			// Go to the previous item
			$customPrev.click( function ( ev ) {
				ev.preventDefault();
				$this.trigger( 'prev.owl.carousel' );
				return false;
			} );


		} );
	},
	GOSO.Jarallax = function () {
		if ( ! $.fn.jarallax || ! $( '.goso-jarallax' ).length ) {
			return false;
		}

		$( '.goso-jarallax' ).each( function () {
			var $this = $( this ),
				$jarallaxArgs = {};

			if ( $this.hasClass( 'goso-jarallax-inviewport' ) ) {
				var $parent = $this.closest( '.goso-owl-featured-area' );
				$jarallaxArgs = {elementInViewport: $parent, imgPosition : '30% 50%' };
			}

			$this.imagesLoaded( { background: true }, function () {
				jarallax( $this, $jarallaxArgs );
			} );


		} );
	},
	GOSO.sliderSync = function () {
			if ( ! $().owlCarousel ) {
				return false;
			}

			$( '.goso-slider-sync' ).each( function () {
				var $this = $( this ),
					$dataAuto = $this.data( 'auto' ),
					$dataAutoTime = $this.data( 'autotime' ),
					$dataSpeed = $this.data( 'speed' ),
					$dataLoop = $this.data( 'loop' ),
					$dataNav = $this.data( 'nav' ),
					$dataAutowidth = $this.data( 'autowidth' ),
					$dataStyle = $this.data( 'style' ),
					$dataItems = $this.data( 'items' ),
					$dataAutoHeight1 = $this.data( 'autoheight1' ),
					$dataAutoHeight2 = $this.data( 'autoheight2' ),
					$dataReponsive = {};


				if ( 'style-12' === $dataStyle ) {
					$dataReponsive = {
						0: {items: 1},
						1000: {items: 2},
						1400: {items: 3}
					};
				} else if ( 'style-13' === $dataStyle ) {
					$dataReponsive = {
						0: {items: 1},
						1000: {items: 2},
						1200: {items: 3},
						1400: {items: 4}
					};
				}

				var sync1 = $this.find( '.goso-big_items' );
				var sync2 = $this.find( '.goso-small_items' );

				if ( sync1.hasClass( 'popup-gallery' ) ) {
					sync1.magnificPopup( {
						delegate: 'a',
						type: 'image',
						closeOnContentClick: false,
						closeBtnInside: false,
						mainClass: 'goso-with-zoom',
						gallery: {
							enabled: true,
							navigateByImgClick: true,
							preload: [0, 1]
						}
					} );
				}


				sync1.imagesLoaded( function () {
					sync1.owlCarousel( {
						items: 1,
						autoplayTimeout: $dataAutoTime,
						nav: 1 === $dataNav ? true : false,
						autoplay: 1 === $dataAuto ? true : false,
						loop: 1 === $dataLoop ? false : true,
						responsiveRefreshRate: 200,
						smartSpeed: $dataSpeed,
						navSpeed: $dataSpeed,
						autoplaySpeed: $dataSpeed,
						dots: false,
						mouseDrag: false,
						lazyLoad: true,
						autoplayHoverPause: true,
						autoHeight: 1 === $dataAutoHeight1 ? false : true,
						navText: ['<i class="gosoicon-left-chevron"></i>', '<i class="gosoicon-right-chevron"></i>'],
					} ).on( 'changed.owl.carousel', syncPosition );
				} );

				sync1.on( 'changed.owl.carousel', function ( event ) {
					GOSO.gosoLazy();
				} );

				sync2.imagesLoaded( function () {
					sync2.on( 'initialized.owl.carousel', function () {
						sync2.find( ".owl-item" ).eq( 0 ).addClass( "current" );
					} )
					     .owlCarousel( {
						     autoplay: false,
						     items: $dataItems ? $dataItems : 3,
						     dots: false,
						     nav: false,
						     autoWidth: 1 === $dataAutowidth ? true : false,
						     smartSpeed: $dataSpeed,
						     navSpeed: $dataSpeed,
						     slideSpeed: $dataSpeed,
						     slideBy: 1,
						     autoplayTimeout: $dataAutoTime,
						     responsiveRefreshRate: 200,
						     lazyLoad: true,
						     autoplayHoverPause: true,
						     responsive: $dataReponsive,
						     autoHeight: 1 === $dataAutoHeight2 ? false : true,
					     } );
				} );

				sync2.on( 'changed.owl.carousel', function () {
					sync2.find( '.owl-item' ).eq( 0 ).addClass( 'item-active-1' );
					sync2.find( '.owl-item' ).eq( 1 ).addClass( 'item-active-2' );
					sync2.find( '.owl-item' ).eq( 2 ).addClass( 'item-active-3' );
				} );

				sync2.on( "click", ".owl-item", function ( e ) {
					e.preventDefault();
					var number = $( this ).index();
					sync1.data( 'owl.carousel' ).to( number, 700, true );
				} );

				function syncPosition( el ) {
					var count = el.item.count - 1;
					var current = Math.round( el.item.index - (
						el.item.count / 2
					) - .5 );

					if ( current < 0 ) {
						current = count;
					}
					if ( current > count ) {
						current = 0;
					}

					// End block

					sync2.find( ".owl-item" ).removeClass( "current" ).eq( current ).addClass( "current" );

					var onscreen = sync2.find( '.owl-item.active' ).length - 1;
					var start = sync2.find( '.owl-item.active' ).first().index();
					var end = sync2.find( '.owl-item.active' ).last().index();

					if ( current > end ) {
						sync2.data( 'owl.carousel' ).to( current, 700, true );
					}
					if ( current < start ) {
						sync2.data( 'owl.carousel' ).to( current - onscreen, 700, true );
					}

					if ( onscreen > 0 ) {
						sync2.find( '.owl-item' ).removeClass( 'item-active-1' ).removeClass( 'item-active-2' ).removeClass( 'item-active-3' );
						sync2.find( '.owl-item.active' ).eq( 0 ).addClass( 'item-active-1' );
						sync2.find( '.owl-item.active' ).eq( 1 ).addClass( 'item-active-2' );
						sync2.find( '.owl-item.active' ).eq( 2 ).addClass( 'item-active-3' );
					}
				}
			} );

		};
	GOSO.postLike = function () {
		$( 'body' ).on( 'click', '.goso-post-like', function ( event ) {
			event.preventDefault();
			var $this = $( this ),
				post_id = $this.data( "post_id" ),
				like_text = $this.data( "like" ),
				unlike_text = $this.data( "unlike" ),
				$selector = $this.children( '.goso-share-number' );

			var $like = parseInt( $selector.text() );

			if ( $this.hasClass( 'single-like-button' ) ) {
				$selector = $( '.single-like-button .goso-share-number' );
				$this = $( '.single-like-button' );
			}

			if ( $this.hasClass( 'liked' ) ) {
				$this.removeClass( 'liked' );
				$this.prop( 'title', like_text );
				$selector.html( (
					$like - 1
				) );
			}
			else {
				$this.addClass( 'liked' );
				$this.prop( 'title', unlike_text );
				$selector.html( (
					$like + 1
				) );
			}

			var data = {
				action: 'goso_post_like',
				post_id: post_id,
				goso_post_like: '',
				nonce: GOSOLOCALIZE.nonce
			};

			$.post( GOSOLOCALIZE.ajaxUrl, data, function ( r ) {
			} );
		} );
	};
	GOSO.gallery = function () {
		var $justified_gallery = $( '.goso-post-gallery-container.justified' );
		var $masonry_gallery = $( '.goso-post-gallery-container.masonry' );
		if ( $().justifiedGallery && $justified_gallery.length ) {
			$( '.goso-post-gallery-container.justified' ).each( function () {
				var $this = $( this );
				$this.justifiedGallery( {
					rowHeight: $this.data( 'height' ),
					lastRow: 'nojustify',
					margins: $this.data( 'margin' ),
					randomize: false
				} );
			} ); // each .goso-post-gallery-container
		}

		if ( $().isotope && $masonry_gallery.length ) {

			$( '.goso-post-gallery-container.masonry .item-gallery-masonry' ).each( function () {
				var $this = $( this );
				if ( $this.attr( 'title' ) ) {
					var $title = $this.attr( 'title' );
					$this.children().append( '<div class="caption">' + $title + '</div>' );
				}
			} );

			if ( $masonry_gallery.length ) {
				$masonry_gallery.each( function () {
					var $this = $( this );
					$this.imagesLoaded( function() {
						// initialize isotope
						$this.isotope( {
							itemSelector: '.item-gallery-masonry',
							transitionDuration: '.55s',
							layoutMode: 'masonry'
						} );

						$this.addClass( 'loaded' );

						$( '.goso-post-gallery-container.masonry .item-gallery-masonry' ).each( function () {
							var $this = $( this );
							$this.one( 'inview', function ( event, isInView, visiblePartX, visiblePartY ) {
								$this.addClass( 'animated' );
							} ); // inview
						} );
					} );
				} ); // each
			}
		}

	};
	GOSO.EasyPieChart = function () {

		$( '.goso-review-process' ).each( function () {
			var $this = $( this ),
				$bar = $this.children(),
				$bar_w = $bar.data( 'width' ) * 10;
			$this.one( 'inview', function ( event, isInView, visiblePartX, visiblePartY ) {
				$bar.animate( {width: $bar_w + '%'}, 1000 );
			} ); // bind inview
		} ); // each

		if ( ! $.fn.easyPieChart || ! $( '.goso-piechart' ).length ) {
			return false;
		}

		$( '.goso-piechart' ).each( function () {
			var $this = $( this );
			$this.one( 'inview', function ( event, isInView, visiblePartX, visiblePartY ) {
				var chart_args = {
					barColor: $this.data( 'color' ),
					trackColor: $this.data( 'trackcolor' ),
					scaleColor: false,
					lineWidth: $this.data( 'thickness' ),
					size: $this.data( 'size' ),
					animate: 1000
				};
				$this.easyPieChart( chart_args );
			} ); // bind inview
		} ); // each
	};

	vc_iframe.gosoSliders = function(model_id) {
		var $el = $("[data-model-id=" + model_id + "]")
			, $carousel = ($el.find("img").length,
			$el.find('[data-ride="goso_sliders"]'));

		return $carousel.find("img:first").length ? $carousel.find("img:first").prop("complete") ? void GOSO.sliderOwl( $carousel ) : void window.setTimeout(function() {
			vc_iframe.gosoSliders(model_id)
		}, 500) : GOSO.sliderOwl( $carousel )
	}
}(window.jQuery);
