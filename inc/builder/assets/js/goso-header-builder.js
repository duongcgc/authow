(function ($) {
    "use strict";
    var GOSO = GOSO || {};
    GOSO.sticky_header = function () {
        var headersticky = $('.goso_header.goso_builder_sticky_header_desktop'),
            headertop = $('.goso_header.goso-header-builder.main-builder-header'),
            headernormal = headertop.outerHeight(),
            headermobile = $('.goso_navbar_mobile'),
            lastScrollTop = 0;

        $(window).on('scroll', function () {
            var st = $(this).scrollTop();

            if (st > headernormal) {
                if (headersticky.length) {
                    headersticky.addClass('sticky-apply');
                    headertop.addClass('ns-apply');
                }
            } else {
                if (headersticky.length) {
                    headersticky.removeClass('sticky-apply');
                    headertop.removeClass('ns-apply');
                }
            }

            if (st > headermobile.outerHeight()) {
                headermobile.addClass('mobile-sticky');
            } else {
                headermobile.removeClass('mobile-sticky');
            }

            if (st > lastScrollTop) {
                headersticky.addClass('scrolldown').removeClass('scrollup');
                headermobile.addClass('scrolldown').removeClass('scrollup');
            } else {
                headersticky.addClass('scrollup').removeClass('scrolldown');
                headermobile.addClass('scrollup').removeClass('scrolldown');
            }
            lastScrollTop = st;
        });
    }

    GOSO.main_menu = function () {
        $('.navigation ul.menu > li.goso-mega-menu').on('mouseenter', function () {
            var $this = $(this),
                $row_active = $this.find('.row-active'),
                $rowsLazy = $row_active.find('.goso-lazy');
            $row_active.fadeIn('200').css('display', 'inline-block');
        });

        $('.navigation .goso-mega-child-categories a').on('mouseenter', function () {
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
                $rows.removeClass('row-active');
                $parent.find('.' + $row_active).fadeIn('300').css('display', 'inline-block').addClass('row-active');
                /*$rowsLazy.Lazy({
                    effect: 'fadeIn',
                    effectTime: 300,
                    scrollDirection: 'both'
                });*/
                //lazySizes.init();
            }
        });
    }

    GOSO.mobile_menu = function () {
        // Add indicator

        // Toggle menu when click show/hide menu
        $('.navigation .button-menu-mobile').on('click', function () {
            $('body').addClass('open-mobile-builder-sidebar-nav');
        });

        $('.pc-builder-element nav.goso-vernav-cparent li.menu-item-has-children > a').on('click', function (e) {
            var $this = $(this);
            e.preventDefault();
            $this.children().children().toggleClass('fa-angle-up');
            $this.next().slideToggle('fast');
        });

        // Close sidebar nav
        $('#close-sidebar-nav').on('click', function () {
            $('body').removeClass('open-sidebar-nav');
        });

        $('.close-mobile-menu-builder').on('click', function () {
            $('body').removeClass('open-mobile-builder-sidebar-nav');
        });
    }
    /* Init functions
	 ---------------------------------------------------------------*/
    $(document).ready(function () {
        GOSO.sticky_header();
        GOSO.mobile_menu();
        GOSO.main_menu();
    });
})(jQuery);	// EOF
