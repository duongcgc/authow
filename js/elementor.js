/* global PENCILOCALIZE */

(function ($) {
    "use strict";
    var ELPENCI = ELPENCI || {};

    /* General functions
     ---------------------------------------------------------------*/
    ELPENCI.general = function () {
        // Top search
        $('.pcheader-icon a.search-click').on('click', function (e) {
            var $this = $(this),
                $closet = $this.closest('.wrapper-boxed'),
                $pbcloset = $this.closest('.goso_nav_col');
            if ($closet.hasClass('header-search-style-showup')) {
                $this.next().toggleClass('active');
            } else {
                $this.next().fadeToggle();
            }
            var opentimeout = setTimeout(function () {
                $closet.find('.search-input').focus();
                if ($pbcloset.length) {
                    $pbcloset.find('.search-input').focus();
                }
            }, 200, function () {
                clearTimeout(opentimeout);
            });
            e.stopPropagation();
            return false;
        });

        $('.pcheader-icon .close-search').off().on('click', function (e) {
            $(this).closest('.show-search').fadeToggle();
            return false;
        });

        // Go to top
        $('.go-to-top, .goso-go-to-top-floating').on('click', function () {
            $('html, body').animate({scrollTop: 0}, 700);
            return false;
        });

        // Lazyload
        /*$('.goso-lazy').Lazy({
            effect: 'fadeIn',
            effectTime: 300,
            scrollDirection: 'both'
        });*/
        //lazySizes.init();

        // Go to top button
        var $goto_button = $('.goso-go-to-top-floating');
        if ($goto_button.length) {
            $(document).on('scroll', function () {
                var y = $(this).scrollTop();
                if (y > 300) {
                    $goto_button.addClass('show-up');
                } else {
                    $goto_button.removeClass('show-up');
                }
            });
        }

        $(".goso-jump-recipe").on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("href"),
                $scroll_top = $(id).offset().top,
                $nav_height = 30;
            if ($('#navigation').length) {
                $nav_height = $('#navigation').height() + 30;
                if ($("body").hasClass('admin-bar')) {
                    $nav_height = $('#navigation').height() + 62;
                }
            }
            var $scroll_to = $scroll_top - $nav_height;
            $('html,body').animate({
                scrollTop: $scroll_to
            }, 'fast');
        });

        // Call back fitvid when click load more button on buddypress
        $('body.buddypress .activity .load-more a').on('click', function () {
            $(document).ajaxStop(function () {
                $(".container").fitVids();
            });
        });
    }

    /* Cookie Law
     ---------------------------------------------------------------*/
    ELPENCI.cookie = function () {
        var wrapCookie = '.goso-wrap-gprd-law',
            $wrapCookie = $(wrapCookie),
            classAction = 'goso-wrap-gprd-law-close',
            gosoCookieName = 'goso_law_footer_new';

        if (!$wrapCookie.length) {
            return false;
        }

        var gosoCookie = {
            set: function (name, value) {
                var date = new Date();
                date.setTime(date.getTime() + (31536000000));
                var expires = "; expires=" + date.toGMTString();
                document.cookie = name + "=" + value + expires + "; path=/";
            },
            read: function (name) {
                var namePre = name + "=";
                var cookieSplit = document.cookie.split(';');
                for (var i = 0; i < cookieSplit.length; i++) {
                    var cookie = cookieSplit[i];
                    while (cookie.charAt(0) == ' ') {
                        cookie = cookie.substring(1, cookie.length);
                    }
                    if (cookie.indexOf(namePre) === 0) {
                        return cookie.substring(namePre.length, cookie.length);
                    }
                }
                return null;
            },
            erase: function (name) {
                this.set(name, "", -1);
            },
            exists: function (name) {
                return (
                    this.read(name) !== null
                );
            }
        };

        $wrapCookie.removeClass('goso-close-all');
        if (!gosoCookie.exists(gosoCookieName) || (gosoCookie.exists(gosoCookieName) && 1 == gosoCookie.read(gosoCookieName))) {
            $wrapCookie.removeClass(classAction);
        } else {
            $wrapCookie.addClass(classAction);
        }

        $('.goso-gprd-accept, .goso-gdrd-show').on('click', function (e) {
            e.preventDefault();

            var $this = $(this),
                $parent_law = $this.closest(wrapCookie);

            $parent_law.toggleClass(classAction);

            if ($parent_law.hasClass(classAction)) {
                gosoCookie.set(gosoCookieName, '2');
            } else {
                gosoCookie.set(gosoCookieName, '1');
            }

            return false;
        });
    }

    /* Sticky main navigation
     ---------------------------------------------------------------*/


    /* Homepage Featured Slider
     ---------------------------------------------------------------*/
    ELPENCI.featured_slider = function () {
        if ($().owlCarousel) {
            $('.featured-area .goso-owl-featured-area').each(function () {
                var $this = $(this),
                    $style = $this.data('style'),
                    $auto = false,
                    $autotime = $this.data('autotime'),
                    $speed = $this.data('speed'),
                    $loop = $this.data('loop'),
                    $item = 1,
                    $nav = true,
                    $dots = false,
                    $rtl = false,
                    $items_desktop = 1,
                    $items_tablet = 1,
                    $items_tabsmall = 1;

                if ($style === 'style-2') {
                    $item = 2;
                } else if ($style === 'style-28') {
                    $loop = true;
                }

                if ($('html').attr('dir') === 'rtl') {
                    $rtl = true;
                }
                if ($this.attr('data-auto') === 'true') {
                    $auto = true;
                }
                if ($this.attr('data-nav') === 'false') {
                    $nav = false;
                }
                if ($this.attr('data-dots') === 'true') {
                    $dots = true;
                }
                if ($this.attr('data-item')) {
                    $item = parseInt($this.data('item'));
                }
                if ($this.attr('data-desktop')) {
                    $items_desktop = parseInt($this.data('desktop'));
                }
                if ($this.attr('data-tablet')) {
                    $items_tablet = parseInt($this.data('tablet'));
                }
                if ($this.attr('data-tabsmall')) {
                    $items_tabsmall = parseInt($this.data('tabsmall'));
                }

                var owl_args = {
                    rtl: $rtl,
                    loop: $loop,
                    margin: 0,
                    items: $item,
                    navSpeed: $speed,
                    dotsSpeed: $speed,
                    nav: $nav,
                    slideBy: $item,
                    mouseDrag: false,
                    lazyLoad: true,
                    dots: $dots,
                    navText: ['<i class="gosoicon-left-chevron"></i>', '<i class="gosoicon-right-chevron"></i>'],
                    autoplay: $auto,
                    autoplayTimeout: $autotime,
                    autoplayHoverPause: true,
                    autoplaySpeed: $speed,
                    responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: $items_tabsmall,
                            slideBy: $items_tabsmall
                        },
                        768: {
                            items: $items_tablet,
                            slideBy: $items_tablet
                        },
                        1170: {
                            items: $items_desktop,
                            slideBy: $items_desktop
                        }
                    }
                }

                if ($style === 'style-2') {
                    owl_args['center'] = true;
                    owl_args['margin'] = 10;
                    owl_args['autoWidth'] = true;
                } else if ($style === 'style-28') {
                    owl_args['margin'] = 4;
                    owl_args['items'] = 6;
                    owl_args['autoWidth'] = true;
                } else if ($style === 'style-38') {
                    owl_args['center'] = true;
                    owl_args['margin'] = 5;
                    owl_args['autoWidth'] = true;
                }

                $this.imagesLoaded(function () {
                    $this.owlCarousel(owl_args);
                });

                $this.on('initialize.owl.carousel', function (event) {
                    $this.closest('.featured-area').addClass('goso-featured-loaded');
                });

                $this.on('changed.owl.carousel', function (event) {
                    /*$this.find( '.goso-lazy' ).Lazy( {
                        effect: 'fadeIn',
                        effectTime: 200,
                        scrollDirection: 'both',
                        visibleOnly: true,
                        threshold: 0
                    } );*/
                    //lazySizes.init();
                });
            });
        }	// if owlcarousel
    }

    /* Owl Slider General
     ---------------------------------------------------------------*/
    ELPENCI.owl_slider = function () {
        if ($().owlCarousel) {
            $('.goso-owl-carousel-slider').each(function () {
                var $this = $(this),
                    $parent = $this.parent(),
                    $auto = true,
                    $dots = false,
                    $nav = true,
                    $loop = true,
                    $rtl = false,
                    $dataauto = $this.data('auto'),
                    $items_desktop = 1,
                    $items_tablet = 1,
                    $items_tabsmall = 1,
                    $items_mobile = 1,
                    $speed = 600,
                    $item = 1,
                    $margin = 0,
                    $autotime = 5000,
                    $datalazy = false;

                if ($('html').attr('dir') === 'rtl') {
                    $rtl = true;
                }
                if ($this.attr('data-dots') === 'true') {
                    $dots = true;
                }
                if ($this.attr('data-loop') === 'false') {
                    $loop = false;
                }
                if ($this.attr('data-nav') === 'false') {
                    $nav = false;
                }

                if ($this.attr('data-margin')) {
                    $margin = parseInt($this.data('margin'));
                }
                if ($this.attr('data-desktop')) {
                    $items_desktop = parseInt($this.data('desktop'));
                }
                if ($this.attr('data-tablet')) {
                    $items_tablet = parseInt($this.data('tablet'));
                }
                if ($this.attr('data-tabsmall')) {
                    $items_tabsmall = parseInt($this.data('tabsmall'));
                }
                if ($this.attr('data-mobile')) {
                    $items_mobile = parseInt($this.data('mobile'));
                }
                if ($this.attr('data-speed')) {
                    $speed = parseInt($this.data('speed'));
                }
                if ($this.attr('data-autotime')) {
                    $autotime = parseInt($this.data('autotime'));
                }
                if ($this.attr('data-item')) {
                    $item = parseInt($this.data('item'));
                }
                if ($this.attr('data-lazy')) {
                    $datalazy = true;
                }

                var owl_args = {
                    loop: $loop,
                    rtl: $rtl,
                    margin: $margin,
                    items: $item,
                    slideBy: $item,
                    lazyLoad: $datalazy,
                    navSpeed: $speed,
                    dotsSpeed: $speed,
                    nav: $nav,
                    dots: $dots,
                    navText: ['<i class="gosoicon-left-chevron"></i>', '<i class="gosoicon-right-chevron"></i>'],
                    autoplay: $dataauto,
                    autoplayTimeout: $autotime,
                    autoHeight: true,
                    autoplayHoverPause: true,
                    autoplaySpeed: $speed,
                    responsive: {
                        0: {
                            items: $items_mobile,
                            slideBy: $items_mobile
                        },
                        480: {
                            items: $items_tabsmall,
                            slideBy: $items_tabsmall
                        },
                        768: {
                            items: $items_tablet,
                            slideBy: $items_tablet
                        },
                        1170: {
                            items: $items_desktop,
                            slideBy: $items_desktop
                        }
                    }
                };

                if ($this.hasClass('goso-headline-posts')) {
                    owl_args['animateOut'] = 'slideOutUp';
                    owl_args['animateIn'] = 'slideInUp';
                }

                $this.owlCarousel(owl_args);

                $this.on('changed.owl.carousel', function (event) {
                    /*$this.find( '.goso-lazy' ).Lazy( {
                        effect: 'fadeIn',
                        effectTime: 200,
                        scrollDirection: 'both',
                        visibleOnly: true,
                        threshold: 0
                    } );*/
                    //lazySizes.init();
                });

                if ($parent.hasClass('goso-topbar-trending')) {
                    var $customNext = $parent.find(".goso-slider-next"),
                        $customPrev = $parent.find(".goso-slider-prev");
                    $customNext.on('click', function (ev) {
                        ev.preventDefault();
                        $this.trigger("next.owl.carousel");
                        return false;
                    });
                    $customPrev.on('click', function (ev) {
                        ev.preventDefault();
                        $this.trigger("prev.owl.carousel");
                        return false;
                    });
                }
            });
        }	// if owlcarousel
    }

    /* Fitvids
     ---------------------------------------------------------------*/
    ELPENCI.fitvids = function () {
        // Target your .container, .wrapper, .post, etc.
        $(".container").fitVids();
    }

    /* Sticky sidebar
     ----------------------------------------------------------------*/
    ELPENCI.sticky_sidebar = function () {
        if ($().theiaStickySidebar) {
            var top_margin = 90;
            if ($('body').hasClass('admin-bar') && $('body').hasClass('goso-vernav-enable')) {
                top_margin = 62;
            } else if (!$('body').hasClass('admin-bar') && $('body').hasClass('goso-vernav-enable')) {
                top_margin = 30;
            } else if ($('body').hasClass('admin-bar') && !$('body').hasClass('goso-vernav-enable')) {
                top_margin = 122;
            }

            if ($('.goso-vc-sticky-sidebar > .goso-vc-row > .goso-vc-column').length) {
                $('.goso-vc-sticky-sidebar > .goso-vc-row > .goso-vc-column').theiaStickySidebar({
                    additionalMarginTop: top_margin,
                });
            }

            if ($('.goso-enSticky .goso-sticky-sb').length) {
                $('.goso-enSticky .goso-sticky-sb,.goso-enSticky .goso-sticky-ct').theiaStickySidebar({
                    additionalMarginTop: top_margin,
                });
            }
            $('#main.goso-main-sticky-sidebar, #sidebar.goso-sticky-sidebar').theiaStickySidebar({
                // settings
                additionalMarginTop: top_margin
            });
        } // if sticky
    }

    /* Mega menu
     ----------------------------------------------------------------*/
    ELPENCI.mega_menu = function () {
        // Hover parent
        $('#navigation ul.menu > li.goso-mega-menu').on('mouseenter', function () {
            var $this = $(this),
                $row_active = $this.find('.row-active'),
                $rowsLazy = $row_active.find('.goso-lazy');
            $row_active.fadeIn('200').css('display', 'inline-block');
            /*$rowsLazy.Lazy({
                effect: 'fadeIn',
                effectTime: 300,
                scrollDirection: 'both',
                visibleOnly : true
            });*/
            //lazySizes.init();
        });

        $('#navigation .goso-mega-child-categories a').on('mouseenter', function () {
            if (!$(this).hasClass('cat-active')) {
                var $this = $(this),
                    $row_active = $this.data('id'),
                    $parentA = $this.parent().children('a'),
                    $parent = $this.closest('.goso-megamenu'),
                    $rows = $this.closest('.goso-megamenu').find('.goso-mega-latest-posts').children('.goso-mega-row'),
                    $rowsLazy = $rows.find('.goso-lazy');
                $parentA.removeClass('cat-active');
                $this.addClass('cat-active');
                $rows.hide();
                $parent.find('.' + $row_active).fadeIn('300').css('display', 'inline-block');
                /*$rowsLazy.Lazy({
                    effect: 'fadeIn',
                    effectTime: 300,
                    scrollDirection: 'both',
                    visibleOnly : true
                });*/
                //lazySizes.init();
            }
        });
    }

    /* Mobile menu responsive
     ----------------------------------------------------------------*/
    ELPENCI.mobile_menu = function () {
        // Add indicator
        $('#sidebar-nav .menu li.menu-item-has-children > a').append('<u class="indicator"><i class="fa fa-angle-down"></i></u>');

        // Toggle menu when click show/hide menu
        $('#navigation .button-menu-mobile').on('click', function () {
            $('body').addClass('open-sidebar-nav');
            /*$( '#sidebar-nav .goso-lazy' ).Lazy({
                effect: 'fadeIn',
                effectTime: 300,
                scrollDirection: 'both'
            });*/
            //lazySizes.init();
        });

        // indicator click
        $('#sidebar-nav .menu li a .indicator').on('click', function (e) {
            if ($('body').hasClass('goso-vernav-cparent')) {
                return;
            }
            var $this = $(this);
            e.preventDefault();
            $this.children().toggleClass('fa-angle-up');
            $this.parent().next().slideToggle('fast');
        });

        $('.goso-vernav-cparent #sidebar-nav .menu li.menu-item-has-children > a').on('click', function (e) {
            var $this = $(this);
            e.preventDefault();
            $this.children().children().toggleClass('fa-angle-up');
            $this.next().slideToggle('fast');
        });

        // Close sidebar nav
        $('#close-sidebar-nav').on('click', function () {
            $('body').removeClass('open-sidebar-nav');
        });
    }

    ELPENCI.toggleMenuHumburger = function () {
        var $menuhumburger = $('.goso-menu-hbg');
        if ($menuhumburger.length) {
            var $body = $('body'),
                $button = $('.goso-vernav-toggle,.goso-menuhbg-toggle,#goso-close-hbg,.goso-menu-hbg-overlay'),
                sidebarClass = 'goso-menuhbg-open';

            // Add indicator
            $('.goso-menu-hbg .menu li.menu-item-has-children > a').append('<u class="indicator"><i class="fa fa-angle-down"></i></u>');

            // indicator click
            $('.goso-menu-hbg .menu li a .indicator').on('click', function (e) {
                if ($('body').hasClass('goso-hbg-cparent')) {
                    return;
                }
                var $this = $(this);
                e.preventDefault();
                $this.children().toggleClass('fa-angle-up');
                $this.parent().next().slideToggle('fast');
            });

            $('.goso-hbg-cparent .goso-menu-hbg .menu li.menu-item-has-children > a').on('click', function (e) {
                var $this = $(this);
                e.preventDefault();
                $this.children().children().toggleClass('fa-angle-up');
                $this.next().slideToggle('fast');
            });

            // Click to show mobile menu
            $button.on('click', function (e) {
                e.preventDefault();

                if ($body.hasClass(sidebarClass)) {
                    $body.removeClass(sidebarClass);
                    $button.removeClass('active');

                    return;
                }
                e.stopPropagation(); // Do not trigger click event on '.site' below
                $body.addClass(sidebarClass);
                $button.addClass('active');

                /*$('.goso-menu-hbg .goso-lazy').Lazy({
                    effect: 'fadeIn',
                    effectTime: 300,
                    scrollDirection: 'both'
                });*/
                //lazySizes.init();
            });

            // Scroll menu hamburger and callback lazyload
            $menuhumburger.on('scroll', function () {
                /*$('.goso-menu-hbg .goso-lazy').Lazy({
                    effect: 'fadeIn',
                    effectTime: 300,
                    scrollDirection: 'both'
                });*/
                //lazySizes.init();
            });
        }
    }

    /* Light box
     ----------------------------------------------------------------*/
    ELPENCI.lightbox = function () {
        if ($().magnificPopup) {
            $('a[data-rel^="goso-gallery-image-content"], .goso-enable-lightbox .gallery-item a').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                image: {
                    verticalFit: true,
                    titleSrc: 'data-cap'
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300
                }
            });

            $('a[data-rel^="goso-gallery-bground-content"]').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                image: {
                    verticalFit: true,
                },
                gallery: {
                    enabled: true
                }
            });


            // Enable lightbox videos
            $('.goso-other-layouts-lighbox').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                fixedContentPos: true,
                closeBtnInside: false,
                closeOnContentClick: true
            });

            if ($('.goso-image-gallery').length) {
                $('.goso-image-gallery').each(function () {
                    var $this = $(this),
                        id = $this.attr('id');

                    $('#' + id + ' a').magnificPopup({
                        type: 'image',
                        closeOnContentClick: true,
                        closeBtnInside: false,
                        fixedContentPos: true,
                        image: {
                            verticalFit: true,
                            titleSrc: 'data-cap'
                        },
                        gallery: {
                            enabled: true
                        }
                    });
                });
            }

            if ($('.goso-post-gallery-container').length) {
                $('.goso-post-gallery-container').each(function () {
                    var $this = $(this),
                        id = $this.attr('id');

                    $('#' + id + ' a').magnificPopup({
                        type: 'image',
                        closeOnContentClick: true,
                        closeBtnInside: false,
                        fixedContentPos: true,
                        image: {
                            verticalFit: true,
                            titleSrc: 'data-cap'
                        },
                        gallery: {
                            enabled: true
                        }
                    });
                });
            }

        } // if magnificPopup exists
    }

    /* Masonry layout
     ----------------------------------------------------------------*/
    ELPENCI.masonry = function () {
        var $masonry_container = $('.goso-masonry, .goso-bgstyle-2 .goso-biggrid-data');
        if ($masonry_container.length) {
            $masonry_container.each(function () {
                var $this = $(this);
                $this.imagesLoaded(function () {
                    // initialize isotope
                    $this.isotope({
                        itemSelector: '.item-masonry',
                        transitionDuration: '.55s',
                        layoutMode: 'masonry'
                    });
                });
            });
        }
    }

    /* Video Background
     ----------------------------------------------------------------*/
    ELPENCI.video_background = function () {
        var $goso_videobg = $('#goso-featured-video-bg');
        if ($goso_videobg.length) {
            $($goso_videobg).each(function () {
                var $this = $(this),
                    $src = $this.data('videosrc'),
                    $startime = $this.data('starttime'),
                    $jarallaxArgs = {
                        videoSrc: $src,
                        videoStartTime: $startime,
                        videoPlayOnlyVisible: false
                    };

                jarallax($this, $jarallaxArgs);
                $('.featured-area').addClass('loaded-wait');
                setTimeout(function () {
                    $('.featured-area').addClass('loaded-animation');
                }, 1500);
            });
        }
    }

    /* Portfolio
     ----------------------------------------------------------------*/
    ELPENCI.portfolio = function () {
        var $goso_portfolio = $('.goso-portfolio');


        if ($().isotope && $goso_portfolio.length) {
            $('.goso-portfolio').each(function () {
                var $this = $(this),
                    unique_id = $(this).attr('id'),
                    DataFilter = null;

                if (typeof (portfolioDataJs) != "undefined" && portfolioDataJs !== null) {
                    for (var e in portfolioDataJs) {

                        if (portfolioDataJs[e].instanceId == unique_id) {
                            var DataFilter = portfolioDataJs[e];
                        }
                    }
                }

                $this.imagesLoaded(function () {
                    $this.isotope({
                        itemSelector: '.portfolio-item',
                        animationEngine: 'best-available',
                        animationOptions: {
                            duration: 250,
                            queue: false
                        }
                    }); // isotope

                    $this.addClass('loaded');

                    $('.portfolio-item .inner-item-portfolio').each(function () {
                        var $this = $(this);
                        $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                            $this.addClass('animated');
                        }); // inview
                    }); // each

                    var location = window.location.hash.toString();
                    if (location.length) {
                        location = location.replace('#', '');
                        location.match(/:/);
                        var Mlocation = location.match(/^([^:]+)/)[1];
                        location = location.replace(Mlocation + ":", "");

                        if (location.length > 1) {

                            var $termActive = $afilter.filter('[data-term="' + location + '"]'),
                                portfolioItem = $this.find('.portfolio-item'),
                                $buttonLoadMore = $this.parent().find('.goso-pagenavi-shortcode');

                            if ($termActive.length) {

                                liFilter.removeClass('active');
                                $termActive.parent().addClass('active');
                                $this.isotope({filter: '.goso-' + location});

                                var dataTerm = $termActive.data("term"),
                                    p = {};

                                DataFilter.currentTerm = dataTerm;
                                $.each(DataFilter.countByTerms, function (t, e) {
                                    p[t] = 0
                                });

                                portfolioItem.each(function (t, e) {
                                    $.each(($(e).data("terms") + "").split(" "), function (t, e) {
                                        p[e]++;
                                    })
                                });

                                var show_button = 'number' == typeof p[dataTerm] && p[dataTerm] == DataFilter.countByTerms[dataTerm];
                                if ($buttonLoadMore.length) {
                                    if (portfolioItem.length !== DataFilter.count && !show_button) {
                                        $buttonLoadMore.show();
                                    } else {
                                        $buttonLoadMore.hide();
                                    }
                                }
                            }
                        }
                    }
                }); // imagesloaded

                // Filter items when filter link is clicked
                var $filter = $this.parent().find('.goso-portfolio-filter'),
                    $afilter = $filter.find('a'),
                    liFilter = $filter.find('li');

                liFilter.on('click', function () {

                    var self = $(this),
                        term = self.find('a').data("term"),
                        selector = self.find("a").attr('data-filter'),
                        $e_dataTerm = $filter.find('a').filter('[data-term="' + term + '"]'),
                        portfolioItem = $this.find('.portfolio-item'),
                        $buttonLoadMore = $this.parent().find('.goso-pagenavi-shortcode'),
                        scrollTop = $(window).scrollTop();

                    liFilter.removeClass('active');
                    self.addClass('active');

                    $this.parent().find('.goso-ajax-more-button').attr('data-cat', term);

                    $this.isotope({filter: selector});

                    if ($e_dataTerm.length) {
                        window.location.hash = "*" == term ? "" : term;

                        $(window).scrollTop(scrollTop);
                    }

                    var p = {};
                    DataFilter.currentTerm = term;
                    $.each(DataFilter.countByTerms, function (t, e) {
                        p[t] = 0
                    });

                    portfolioItem.each(function (t, e) {
                        $.each(($(e).data("terms") + "").split(" "), function (t, e) {
                            p[e]++;
                        })
                    });

                    var show_button = 'number' == typeof p[term] && p[term] == DataFilter.countByTerms[term];
                    if ($buttonLoadMore.length) {
                        if (portfolioItem.length !== DataFilter.count && !show_button) {
                            $buttonLoadMore.show();
                        } else {
                            $buttonLoadMore.hide();
                        }
                    }

                    return false;
                });

                ELPENCI.portfolioLoadMore.loadMore($this, DataFilter);
                ELPENCI.portfolioLoadMore.infinityScroll(DataFilter);

            }); // each .goso-portfolio

        }	// end if isotope & portfolio


        var $btnLoadMore = $('.goso-plf-loadmore');
        if (!$().isotope || !$btnLoadMore.length) {
            return false;
        }
    }

    ELPENCI.portfolioLoadMore = {
        btnLoadMore: $('.goso-plf-loadmore'),
        loadMore: function ($pfl_wapper, DataFilter) {
            var self = this;
            $('body').on('click', '.goso-ajax-more-button', function (event) {
                self.actionLoadMore($(this), $pfl_wapper, DataFilter);
            });
        },
        infinityScroll: function (DataFilter) {
            var self = this,
                $handle = $('.goso-plf-loadmore'),
                $button_load = $handle.find('.goso-ajax-more-button');

            if ($handle.hasClass('goso-infinite-scroll')) {
                $(window).on('scroll', function () {

                    var hT = $button_load.offset().top,
                        hH = $button_load.outerHeight(),
                        wH = $(window).height(),
                        wS = $(this).scrollTop();

                    if ((wS > (hT + hH - wH)) && $button_load.length) {
                        var $pfl_wapper = $button_load.closest('.goso-portfolio');
                        self.actionLoadMore($button_load, $pfl_wapper, DataFilter);
                    }
                }).trigger('scroll');
            }
        },
        actionLoadMore: function ($button_load, $pfl_wapper, DataFilter) {
            if ($button_load.hasClass('loading-portfolios')) {
                return false;
            }

            $button_load.addClass('loading-portfolios');

            var mesNoMore = $button_load.data('mes_no_more'),
                mes = $button_load.data('mes');

            DataFilter.pflShowIds = [];

            $button_load.closest('.wrapper-goso-portfolio').find('.portfolio-item').each(function (t, e) {
                DataFilter.pflShowIds.push($(e).data('pflid'));
            });

            var data = {
                action: 'goso_pfl_more_post_ajax',
                datafilter: DataFilter,
                nonce: ajax_var_more.nonce
            };
            $.post(ajax_var_more.url, data, function (response) {
                if (!response.data.items) {
                    $button_load.find('.ajax-more-text').html(mesNoMore);
                    $button_load.removeClass('loading-portfolios');

                    $button_load.closest('.wrapper-goso-portfolio').find('.goso-portfolio-filter li.active').addClass('loadmore-finish');

                    setTimeout(function () {
                        $button_load.parent().parent().hide();
                        $button_load.find('.ajax-more-text').html(mes);
                    }, 1200);

                    return false;
                }

                var $wrap_content = $button_load.closest('.wrapper-goso-portfolio').find('.goso-portfolio'),
                    $data = $(response.data.items);

                $wrap_content.find('.inner-portfolio-posts').append($data);
                $wrap_content.isotope('appended', $data).imagesLoaded(function () {
                    $wrap_content.isotope('layout');
                });

                /*$('.goso-lazy').Lazy({
                    effect: 'fadeIn',
                    effectTime: 300,
                    scrollDirection: 'both'
                });*/
                //lazySizes.init();

                $(".container").fitVids();

                $('a[data-rel^="goso-gallery-image-content"]').magnificPopup({
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
                        enabled: true,
                        duration: 300
                    }
                });

                $wrap_content.addClass('loaded');

                $('.portfolio-item .inner-item-portfolio').each(function () {
                    var $this = $(this);
                    $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                        $this.addClass('animated');
                    }); // inview
                }); // each

                $button_load.removeClass('loading-portfolios');
            });

            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: ajax_var_more.url,
                data: 'datafilter=' + DataFilter + '&action=goso_pfl_more_post_ajax&nonce=' + ajax_var_more.nonce,
                success: function (data) {

                },
                error: function (jqXHR, textStatus, errorThrown) {
                }

            });

        }
    }

    /* Gallery
     ----------------------------------------------------------------*/
    ELPENCI.gallery = function () {
        var $justified_gallery = $('.goso-post-gallery-container.justified');
        var $masonry_gallery = $('.goso-post-gallery-container.masonry');
        if ($().justifiedGallery && $justified_gallery.length) {
            $('.goso-post-gallery-container.justified').each(function () {
                var $this = $(this);
                $this.justifiedGallery({
                    rowHeight: $this.data('height'),
                    lastRow: 'nojustify',
                    margins: $this.data('margin'),
                    randomize: false
                });
            }); // each .goso-post-gallery-container
        }

        if ($().isotope && $masonry_gallery.length) {

            $('.goso-post-gallery-container.masonry .item-gallery-masonry').each(function () {
                var $this = $(this).children();
                if ($this.attr('data-cap') && !$this.hasClass('added-caption')) {
                    var $title = $this.attr('data-cap');
                    if ($title !== 'undefined') {
                        $this.children().append('<div class="caption">' + $title + '</div>');
                        $this.addClass('added-caption');
                    }

                }
            });
        }

        if ($masonry_gallery.length) {
            $masonry_gallery.each(function () {
                var $this = $(this);
                $this.imagesLoaded(function () {
                    // initialize isotope
                    $this.isotope({
                        itemSelector: '.item-gallery-masonry',
                        transitionDuration: '.55s',
                        layoutMode: 'masonry'
                    });

                    $this.addClass('loaded');

                    $('.goso-post-gallery-container.masonry .item-gallery-masonry').each(function () {
                        var $this = $(this);
                        $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                            $this.children().addClass('animated');
                        }); // inview
                    }); // each
                });
            });
        }
    },

        /* Jarallax
         ----------------------------------------------------------------*/
        ELPENCI.Jarallax = function () {
            if (!$.fn.jarallax || !$('.goso-jarallax').length) {
                return false;
            }
            $('.goso-jarallax').each(function () {
                var $this = $(this),
                    $jarallaxArgs = {};

                $this.imagesLoaded({background: true}, function () {
                    jarallax($this, $jarallaxArgs);
                });

            });
        },

        /* Related Popup
         ----------------------------------------------------------------*/
        ELPENCI.RelatedPopup = function () {
            if ($('.goso-rlt-popup').length) {
                var rltpopup = $('.goso-rlt-popup'),
                    rltclose = $('.goso-rlt-popup .goso-close-rltpopup'),
                    rltlazy = rltpopup.find('.goso-lazy');

                $('body').on('inview', '.goso-flag-rlt-popup', function (event, isInView, visiblePartX, visiblePartY) {
                    if (!rltpopup.hasClass('rltpopup-notshow-again') && isInView) {
                        rltpopup.addClass('rltpopup-show-up');
                        rltclose.on("click", function (e) {
                            e.preventDefault();
                            rltpopup.removeClass('rltpopup-show-up').addClass('rltpopup-notshow-again');
                        });
                        /*rltlazy.Lazy({
                            effect: 'fadeIn',
                            effectTime: 300,
                            scrollDirection: 'both'
                        });*/
                        //lazySizes.init();
                    }
                });
                rltclose.on("click", function (e) {
                    e.preventDefault();
                    rltpopup.removeClass('rltpopup-show-up').addClass('rltpopup-notshow-again');
                });
            }
        },

        /* Share Expand
    ---------------------------------------------------------------*/
        ELPENCI.shareexpand = function () {
            var tag = $('.tags-share-box'),
                tago = tag.offset(),
                tagw = tag.outerWidth(),
                btnw = tag.find('.post-share-expand').outerWidth();

            tag.find('.new-ver-share').each(function (index) {
                var out = tagw + tago.left - btnw * 2,
                    itemw = $(this).outerWidth(),
                    itemo = $(this).offset();

                if (itemo.left + itemw < out) {
                    $(this).addClass('show');
                } else {
                    $(this).addClass('auto-hidden');
                    tag.find('.post-share-expand').addClass('showing');
                }
            });

            $('.post-share-item.post-share-expand').on('click', function (e) {
                e.preventDefault();
                var parent = $(this).closest('.post-share');
                parent.find('.auto-hidden').toggleClass('active');
                parent.toggleClass('showing-hidden');
            });

            tag.css('opacity', '1');
        },

        ELPENCI.extraFunction = {
            init: function () {
                this.counterUp();
                this.progressBar();
                this.login();
                this.register();
            },
            progressBar: function () {
                if ($('.goso-review-process').length) {
                    $('.goso-review-process').each(function () {
                        var $this = $(this),
                            $bar = $this.children(),
                            $bar_w = $bar.data('width') * 10;
                        $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                            $bar.animate({width: $bar_w + '%'}, 1000);
                        }); // bind inview
                    }); // each
                }

                if ($.fn.easyPieChart && $('.goso-piechart').length) {
                    $('.goso-piechart').each(function () {
                        var $this = $(this);
                        $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                            var chart_args = {
                                barColor: $this.data('color'),
                                trackColor: $this.data('trackcolor'),
                                scaleColor: false,
                                lineWidth: $this.data('thickness'),
                                size: $this.data('size'),
                                animate: 1000
                            };
                            $this.easyPieChart(chart_args);
                        }); // bind inview
                    }); // each
                }
            },
            counterUp: function () {
                var $counterup = $('.goso-counterup-number');

                if (!$.fn.counterUp || !$counterup.length) {
                    return false;
                }

                $counterup.each(function () {
                    var $this = $(this);

                    $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                        setTimeout(function () {
                            $({countNum: $this.text()}).animate(
                                {
                                    countNum: $this.attr('data-count')
                                },

                                {
                                    duration: 2000,
                                    easing: 'linear',
                                    step: function () {
                                        $this.text(Math.floor(this.countNum));
                                    },
                                    complete: function () {
                                        $this.text(this.countNum);
                                    }
                                }
                            );
                        }, $this.attr('data-delay'));

                    }); // bind inview
                });
            },
            login: function () {
                var $body = $('body'),
                    $loginform = $('.goso-loginform'),
                    $loginContainer = $loginform.parent('.goso-login-wrap');

                if ($loginform.length) {
                    $body.on('click', '.goso-user-register', function (e) {
                        e.preventDefault();

                        var $this = $(this),
                            $parent = $this.closest('.goso-login-register');

                        $parent.find('.goso-login-wrap').addClass('hidden');
                        $parent.find('.goso-register-wrap').removeClass('hidden');
                    });

                    $('#goso-user-login,#goso-user-pass').on('focus', function () {
                        $(this).removeClass('invalid');
                    });

                    $('.goso-loginform').each(function () {
                        $(this).on('submit', function (e) {
                            var $this = $(this),
                                $loginContainer = $this.parent('.goso-login-wrap'),
                                inputUsername = $this.find('#goso-user-login'),
                                inputPass = $this.find('#goso-user-pass'),
                                valUsername = inputUsername.val(),
                                valPass = inputPass.val(),
                                nonce = $this.find('.goso_form_nonce').val(),
                                gcapcha = $this.find('.g-recaptcha-response');
                            if (gcapcha.length) {
                                var captcha = gcapcha.val();
                            } else {
                                var captcha = 'noexists';
                            }

                            if (inputUsername.length > 0 && valUsername == '') {
                                inputUsername.addClass('invalid');
                                e.preventDefault();
                            }

                            if (inputPass.length > 0 && valPass == '') {
                                inputPass.addClass('invalid');
                                e.preventDefault();
                            }

                            if (valUsername == '' || valPass == '') {
                                return false;
                            }

                            $loginContainer.parent().addClass('ajax-loading');
                            $loginContainer.find('.message').slideDown().remove();

                            var data = {
                                action: 'goso_login_ajax',
                                username: valUsername,
                                password: valPass,
                                captcha: captcha,
                                security: nonce,
                                remember: $loginContainer.find('#rememberme').val()
                            };

                            $.post(ajax_var_more.url, data, function (response) {
                                $loginContainer.parent().removeClass('ajax-loading');
                                $loginContainer.append(response.data);
                                if (!response.success) {
                                    return;
                                }

                                window.location = window.location;
                            });

                            e.preventDefault();
                            return false;
                        });
                    });
                }
            },
            register: function () {
                var $body = $('body'),
                    $registerform = $('#goso-registration-form'),
                    $registerContainer = $registerform.closest('.goso-register-wrap');

                if (!$registerform.length) {
                    return false;
                }

                $body.on('click', '.goso-user-login-here', function (e) {
                    e.preventDefault();

                    var $this = $(this),
                        $parent = $this.closest('.goso-login-register');

                    $parent.find('.goso-login-wrap').removeClass('hidden');
                    $parent.find('.goso-register-wrap').addClass('hidden');

                    return false;
                });

                var $allInput = $('.goso_user_name,.goso_user_email,.goso_user_pass,.goso_user_pass_confirm');
                $allInput.on('focus', function () {
                    $(this).removeClass('invalid');
                });


                $('.goso-registration-form').each(function () {
                    $(this).on('submit', function (e) {
                        e.preventDefault();

                        var $this = $(this),
                            $registerContainer = $this.closest('.goso-register-wrap'),
                            inputUsername = $this.find('.goso_user_name'),
                            inputEmail = $this.find('.goso_user_email'),
                            $inputPass = $this.find('.goso_user_pass'),
                            $inputPassConfirm = $this.find('.goso_user_pass_confirm'),
                            valUsername = inputUsername.val(),
                            valEmail = inputEmail.val(),
                            valPass = $inputPass.val(),
                            valPassConfirm = $inputPassConfirm.val(),
                            nonce = $this.find('.goso_form_nonce').val(),
                            gcapcha = $this.find('.g-recaptcha-response');
                        if (gcapcha.length) {
                            var captcha = gcapcha.val();
                        } else {
                            var captcha = 'noexists';
                        }

                        $allInput.removeClass('invalid');

                        if (inputUsername.length > 0 && valUsername == '') {
                            inputUsername.addClass('invalid');
                            event.preventDefault();
                        }

                        if (inputEmail.length > 0 && valEmail == '') {
                            inputEmail.addClass('invalid');
                            event.preventDefault();
                        }

                        if ($inputPass.length > 0 && valPass == '') {
                            $inputPass.addClass('invalid');
                            event.preventDefault();
                        }

                        if ($inputPassConfirm.length > 0 && valPassConfirm == '') {
                            $inputPassConfirm.addClass('invalid');
                            event.preventDefault();
                        }
                        if (valUsername == '' || valEmail == '' || valPass == '' || valPassConfirm == '') {
                            return false;
                        }

                        $registerContainer.find('.message').slideDown().remove();

                        // Password does not match the confirm password
                        if (valPassConfirm !== valPass) {
                            $inputPass.addClass('invalid');
                            $inputPassConfirm.addClass('invalid');
                            $registerContainer.append(ajax_var_more.errorPass);
                            event.preventDefault();

                            return false;
                        }
                        $registerContainer.parent().addClass('ajax-loading');


                        var data = {
                            action: 'goso_register_ajax',
                            fistName: $this.find('.goso_first_name').val(),
                            lastName: $this.find('.goso_last_name').val(),
                            username: valUsername,
                            password: valPass,
                            confirmPass: valPassConfirm,
                            email: valEmail,
                            security: nonce,
                            captcha: captcha
                        };

                        $.post(ajax_var_more.url, data, function (response) {
                            $registerContainer.parent().removeClass('ajax-loading');
                            $registerContainer.append(response.data);
                            if (!response.success) {
                                return;
                            }
                            window.location = window.location;
                        });

                        event.preventDefault();
                        return false;
                    });
                });
            },
            map: function () {
                if (!$('.goso-google-map').length) {
                    return false;
                }
                $('.goso-google-map').each(function () {

                    var map = $(this),
                        Option = map.data("map_options"),
                        mapID = map.attr('id');


                    var mapTypePre = google.maps.MapTypeId.ROADMAP;
                    switch (Option.map_type) {
                        case"satellite":
                            mapTypePre = google.maps.MapTypeId.SATELLITE;
                            break;
                        case"hybrid":
                            mapTypePre = google.maps.MapTypeId.HYBRID;
                            break;
                        case"terrain":
                            mapTypePre = google.maps.MapTypeId.TERRAIN
                    }
                    var latLng = new google.maps.LatLng(-34.397, 150.644);
                    var map = new google.maps.Map(document.getElementById(mapID), {
                        zoom: parseInt(Option.map_zoom),
                        center: latLng,
                        mapTypeId: mapTypePre,
                        panControl: Option.map_pan,
                        zoomControl: Option.map_is_zoom,
                        mapTypeControl: true,
                        scaleControl: Option.map_scale,
                        streetViewControl: Option.map_street_view,
                        rotateControl: Option.map_rotate,
                        overviewMapControl: Option.map_overview,
                        scrollwheel: Option.map_scrollwheel
                    });
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        title: Option.marker_title,
                        icon: Option.marker_img
                    });

                    if (Option.info_window) {
                        var infoWindow = new google.maps.InfoWindow({
                            content: Option.info_window
                        });

                        google.maps.event.addListener(marker, "click", function () {
                            infoWindow.open(map, marker);
                        });
                    }

                    if ('coordinates' == Option.map_using && Option.latitude && Option.longtitude) {
                        latLng = new google.maps.LatLng(Option.latitude, Option.longtitude);
                        map.setCenter(latLng);
                        marker.setPosition(latLng);
                    } else {
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            address: Option.address
                        }, function (results) {
                            var loc = results[0].geometry.location;
                            latLng = new google.maps.LatLng(loc.lat(), loc.lng());
                            map.setCenter(latLng);
                            marker.setPosition(latLng);
                        });
                    }
                });
            },
        },

        ELPENCI.VideosList = {
            // Init the module
            init: function () {
                ELPENCI.VideosList.play();
            },
            play: function () {
                if (!$('.goso-video_playlist').length) {
                    return false;
                }
                $('.goso-video_playlist').each(function (idx, item) {
                    var $blockVideo = $(this),
                        $VideoF = $blockVideo.find('.goso-video-frame');

                    var $height = $blockVideo.find('.goso-video-nav').height(),
                        $heightTitle = $blockVideo.find('.goso-video-nav .goso-playlist-title').height()

                    $blockVideo.find('.goso-video-playlist-nav').css('height', $height - $heightTitle);
                    // Init
                    $VideoF.video();
                    ELPENCI.VideosList.updateStatus($blockVideo);

                    // Show First video and remove the loader icon
                    $VideoF.addVideoEvent('ready', function () {
                        $VideoF.css('visibility', 'visible').fadeIn();
                        $blockVideo.find('.loader-overlay').remove();
                    });
                    // Play videos
                    $blockVideo.on('click', '.goso-video-playlist-item', function () {
                        var $thisVideo = $(this),
                            frameID = $thisVideo.data('name'),
                            $thisFrame = $('#' + frameID),
                            videoSrc = $thisVideo.data('src'),
                            videoNum = $thisVideo.find('.goso-video-number').text();

                        if ($thisVideo.hasClass('is-playing')) {
                            $thisFrame.pauseVideo();
                            return;
                        }

                        // Update the number of the playing video in the title section
                        $blockVideo.find('.goso-video-playing').text(videoNum);

                        // Pause all Videos
                        $blockVideo.find('.goso-video-frame').each(function () {
                            $(this).pauseVideo().hide();
                        })

                        // If the iframe not loaded before, add it
                        if (!$thisFrame.length) {
                            // Add the loader icon
                            $blockVideo.find('.fluid-width-video-wrapper').prepend('');

                            $blockVideo.find('.fluid-width-video-wrapper').append('<iframe class="goso-video-frame" id="' + frameID + '" src="' + videoSrc + '" frameborder="0" width="100%"" height="434" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
                            $thisFrame = $('#' + frameID);

                            $thisFrame.video(); // reinit

                            $thisFrame.addVideoEvent('ready', function (e, $thisFrame, video_type) {
                                $thisFrame.playVideo();
                                $blockVideo.find('.loader-overlay').remove();
                            });
                        } else {
                            $thisFrame.playVideo();
                        }

                        $thisFrame.css('visibility', 'visible').fadeIn();

                        ELPENCI.VideosList.updateStatus($blockVideo);

                    });
                });
            },
            updateStatus: function ($blockVideo) {
                $blockVideo.find('.goso-video-frame').each(function () {
                    var $this = $(this),
                        $videoItem = $("[data-name='" + $this.attr('id') + "']");

                    $this.addVideoEvent('play', function () {
                        $videoItem.removeClass('is-paused').addClass('is-playing');
                    });

                    $this.addVideoEvent('pause', function () {
                        $videoItem.removeClass('is-playing').addClass('is-paused');
                    });

                    $this.addVideoEvent('finish', function () {
                        $videoItem.removeClass('is-paused is-playing');
                    });
                });
            }
        };


    /* Init functions
     ---------------------------------------------------------------*/
    $(document).ready(function () {
        ELPENCI.general();
        ELPENCI.cookie();
        ELPENCI.featured_slider();
        ELPENCI.owl_slider();
        ELPENCI.fitvids();
        ELPENCI.sticky_sidebar();
        ELPENCI.mega_menu();
        ELPENCI.mobile_menu();
        ELPENCI.toggleMenuHumburger();
        ELPENCI.lightbox();
        ELPENCI.masonry();
        ELPENCI.video_background();
        ELPENCI.portfolio();
        ELPENCI.gallery();
        ELPENCI.Jarallax();
        ELPENCI.RelatedPopup();
        ELPENCI.shareexpand();
        ELPENCI.extraFunction.init();
        ELPENCI.VideosList.init();
        $(window).on('resize', function () {
            ELPENCI.sticky_sidebar();
        });
    });

    // Add space for Elementor Menu Anchor link
    $(window).on('elementor/frontend/init', function () {
        if (window.elementorFrontend) {

            function gosoLazy() {
                /*$('.goso-lazy').Lazy({
                    effect: 'fadeIn',
                    effectTime: 300,
                    scrollDirection: 'both'
                });*/
                //lazySizes.init();
            };

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-single-share.default', function ($scope) {
                ELPENCI.shareexpand();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-portfolio.default', function ($scope) {
                ELPENCI.portfolio();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-about-me.default', function ($scope) {
                gosoLazy();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-image-gallery.default', function ($scope) {
                gosoLazy();
                ELPENCI.masonry();
                ELPENCI.gallery();
                ELPENCI.owl_slider();
                var $masonry_gallery = $('.goso-post-gallery-container.masonry');
                if ($().isotope && $masonry_gallery.length) {
                    $masonry_gallery.each(function () {
                        var $this = $(this);
                        $this.imagesLoaded(function () {
                            // initialize isotope
                            $this.isotope({
                                itemSelector: '.item-gallery-masonry',
                                transitionDuration: '.55s',
                                layoutMode: 'masonry'
                            });

                            $this.addClass('loaded');

                            $('.goso-post-gallery-container.masonry .item-gallery-masonry').each(function () {
                                var $this = $(this);
                                $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                                    $this.children().addClass('animated');
                                }); // inview
                            }); // each
                        });
                    });
                }
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-pintersest.default', function ($scope) {
                gosoLazy();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-big-grid.default', function ($scope) {
                gosoLazy();
                ELPENCI.masonry();
                $('body').trigger('goso-block-heading');
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-small-list.default', function ($scope) {
                gosoLazy();
                ELPENCI.owl_slider();
                $('body').trigger('goso-block-heading')
                    .trigger('goso-small-list-loaded');
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-product-list.default', function ($scope) {
                gosoLazy();
                ELPENCI.owl_slider();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-video-playlist.default', function ($scope) {
                gosoLazy();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-featured-boxes.default', function ($scope) {
                gosoLazy();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-popular-posts.default', function ($scope) {
                gosoLazy();
                ELPENCI.owl_slider();
                ELPENCI.extraFunction.init();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-featured-cat.default', function ($scope) {
                gosoLazy();
                ELPENCI.owl_slider();
                ELPENCI.extraFunction.init();
                $('body').trigger('goso-block-heading');
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-latest-posts.default', function ($scope) {
                gosoLazy();
                ELPENCI.owl_slider();
                ELPENCI.masonry();
                ELPENCI.extraFunction.init();
                $('body').trigger('goso-block-heading');
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-recent-posts.default', function ($scope) {
                gosoLazy();
                ELPENCI.extraFunction.init();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-team-member.default', function ($scope) {
                gosoLazy();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-portfolio.default', function ($scope) {
                gosoLazy();
                ELPENCI.portfolio();
                ELPENCI.masonry();

                var $goso_portfolio = $('.goso-portfolio');
                if ($().isotope && $goso_portfolio.length) {
                    $('.goso-portfolio').each(function () {
                        var $this = $(this);
                        $this.imagesLoaded(function () {
                            $this.isotope({
                                itemSelector: '.portfolio-item',
                                animationEngine: 'best-available',
                                animationOptions: {
                                    duration: 250,
                                    queue: false
                                }
                            }); // isotope

                            $this.addClass('loaded');

                            $('.portfolio-item .inner-item-portfolio').each(function () {
                                var $this = $(this);
                                $this.one('inview', function (event, isInView, visiblePartX, visiblePartY) {
                                    $this.addClass('animated');
                                }); // inview
                            });
                        });
                    });  // each
                }
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-facebook-page.default', function ($scope) {
                var faceIsLoading = "", faceisLoaded = "";
                faceIsLoading || faceisLoaded || (faceIsLoading = !0, jQuery.ajax({
                    url: "https://connect.facebook.net/" + ajax_var_more.facebookLang + "/sdk.js",
                    dataType: "script",
                    cache: !0,
                    success: function () {
                        FB.init({
                            appId: "",
                            version: "v2.10",
                            xfbml: !1
                        }), faceisLoaded = !0, faceIsLoading = !1, jQuery(document).trigger("fb:sdk:loaded")
                    }
                }));
                var parse = function () {
                    $scope.find(".elementor-widget-container div").attr("data-width", $scope.width() + "px"), FB.XFBML.parse($scope[0])
                };
                faceisLoaded ? parse() : jQuery(document).on("fb:sdk:loaded", parse);
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-featured-sliders.default', function ($scope) {
                ELPENCI.featured_slider();
                gosoLazy();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-custom-sliders.default', function ($scope) {
                ELPENCI.owl_slider();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-instagram.default', function ($scope) {
                ELPENCI.featured_slider();
                gosoLazy();
                ELPENCI.owl_slider();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-posts-slider.default', function ($scope) {
                ELPENCI.featured_slider();
                gosoLazy();
                ELPENCI.owl_slider();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-counter-up.default', function ($scope) {
                ELPENCI.extraFunction.counterUp();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-map.default', function ($scope) {
                ELPENCI.extraFunction.map();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-latest-tweets.default', function ($scope) {
                ELPENCI.owl_slider();
            });
            elementorFrontend.hooks.addAction('frontend/element_ready/goso-testimonials.default', function ($scope) {
                ELPENCI.owl_slider();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-media-carousel.default', function ($scope) {
                gosoLazy();
                ELPENCI.lightbox();
                ELPENCI.owl_slider();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-progress-bar.default', function ($scope) {
                ELPENCI.extraFunction.progressBar();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-sidebar.default', function ($scope) {
                gosoLazy();
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-block-heading.default', function ($scope) {
                $('body').trigger('goso-block-heading');
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-fullwidth-hero-overlay.default', function ($scope) {
                gosoLazy();
                ELPENCI.owl_slider();
                ELPENCI.extraFunction.init();
            });
        }
    });

})(jQuery);	// EOF
