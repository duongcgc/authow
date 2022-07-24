jQuery(document).ready(function ($) {

    function goso_init_toc() {

        if (typeof GosoTOC != 'undefined') {

            $('article.post').each(function () {
                var $post = $(this),
                    $sticky = $post.find('.goso-toc-container-wrapper'),
                    $stickyrStopper = $post.find('.post-entry'),
                    $stickC = $sticky.clone();


                $stickC.addClass('goso-sticky-toc');
                $stickC.find('.goso-toc-container')
                    .attr('id', 'goso-toc-sticky-container')
                    .addClass('hide-table');
                $stickC.find('a.goso-toc-toggle').addClass('sticky-toggle');
                $stickyrStopper.append($stickC);

                if (!!$sticky.offset()) { // make sure ".sticky" element exists

                    var generalSidebarHeight = $sticky.innerHeight(),
                        stickyTop = $sticky.offset().top,
                        stickOffset = 120,
                        innerset = stickOffset - generalSidebarHeight - 60,
                        outerset = stickOffset - $stickyrStopper.innerHeight() + 60;

                    $(window).scroll(function () {
                        var windowTop = $(window).scrollTop();

                        if (stickyTop < windowTop + innerset && stickyTop > windowTop + outerset) {
                            $stickC.addClass('tocSticky');
                        } else {
                            $stickC.removeClass('tocSticky');
                        }
                    });

                }
            });

            if (window.location.hash) {

                var path = window.location.hash;

                if (path.startsWith("#" + GosoTOC.prefix)) {

                    var offset = -120;

                    // smooth scroll to the anchor id
                    $('html, body').animate({
                        scrollTop: ($(window.location.hash).offset().top + offset) + 'px'
                    }, 1000, 'swing');
                }
            }


            $.fn.shrinkTOCWidth = function () {

                $(this).css({
                    width: 'auto',
                    display: 'table'
                });

                if (/MSIE 7\./.test(navigator.userAgent))
                    $(this).css('width', '');
            };

            var smoothScroll = parseInt(GosoTOC.smooth_scroll);

            if (1 === smoothScroll) {

                $('a.goso-toc-link').off().on('click', function () {

                    var self = $(this);

                    var target = '';
                    var hostname = self.prop('hostname');
                    var pathname = self.prop('pathname');
                    var qs = self.prop('search');
                    var hash = self.prop('hash');

                    // ie strips out the preceding / from pathname
                    if (pathname.length > 0) {
                        if (pathname.charAt(0) !== '/') {
                            pathname = '/' + pathname;
                        }
                    }

                    if ((window.location.hostname === hostname) &&
                        (window.location.pathname === pathname) &&
                        (window.location.search === qs) &&
                        (hash !== '')
                    ) {
                        // var id = decodeURIComponent( hash.replace( '#', '' ) );
                        //target = '[id="' + hash.replace('#', '') + '"]';
                        target = $(this).attr('href');

                        var parentClass;
                        if ($('.goso-single-infiscroll').length) {
                            parentClass = $(this).closest('.goso-single-block').find('#main article').attr('id');
                        }

                        if (typeof parentClass !== 'undefined' && parentClass !== false) {
                            target = '#' + parentClass + ' ' + target;
                        }

                        // verify it exists
                        if ($(target).length === 0) {
                            console.log('GosoTOC scrollTarget Not Found: ' + target);
                            target = '';
                        }

                        // check offset setting
                        if (typeof GosoTOC.scroll_offset != 'undefined') {

                            var offset = -1 * GosoTOC.scroll_offset;

                        } else {

                            var adminbar = $('#wpadminbar');

                            if (adminbar.length > 0) {

                                if (adminbar.is(':visible'))
                                    offset = -30;	// admin bar exists, give it the default
                                else
                                    offset = 0;		// there is an admin bar but it's hidden, so no offset!

                            } else {

                                // no admin bar, so no offset!
                                offset = 0;
                            }
                        }

                        if (target) {
                            $.smoothScroll({
                                scrollTarget: target,
                                offset: offset,
                                beforeScroll: deactivateSetActiveGosoTocListElement,
                                afterScroll: function () {
                                    setActiveGosoTocListElement();
                                    activateSetActiveGosoTocListElement();
                                }
                            });
                        }
                    }
                });
            }

            if (typeof GosoTOC.visibility_hide_by_default != 'undefined') {

                $('article.post').each(function () {

                    var post = $(this),
                        toc = post.find('.goso-toc-container-wrapper:not(.goso-sticky-toc) ul.goso-toc-list'),
                        toggle = post.find('a.goso-toc-toggle:not(.sticky-toggle)'),
                        wrapper = post.find('.goso-toc-container-wrapper:not(.goso-sticky-toc) .goso-toc-wrapper'),
                        swrapper = post.find('.goso-sticky-toc .goso-toc-wrapper'),
                        mswrapper = post.find('.goso-sticky-toc'),
                        stoggle = post.find('.goso-sticky-toc a.sticky-toggle'),
                        stoc = post.find('.goso-sticky-toc ul.goso-toc-list'),
                        invert = GosoTOC.visibility_hide_by_default;

                    toggle.css('display', 'inline');
                    stoggle.css('display', 'inline');

                    if (Cookies) {

                        Cookies.get('gosoTOC_hidetoc') == 1 ? toggle.data('visible', false) : toggle.data('visible', true);

                    } else {

                        toggle.data('visible', true);
                    }

                    if (invert) {

                        toggle.data('visible', false)
                    }

                    if (!toggle.data('visible')) {

                        toc.hide();
                        wrapper.removeClass('show-table').addClass('hide-table');
                    }

                    toggle.off().on('click', function (event) {

                        event.preventDefault();

                        if ($(this).data('visible')) {

                            $(this).data('visible', false);

                            if (Cookies) {

                                if (invert)
                                    Cookies.set('gosoTOC_hidetoc', null, {path: '/'});
                                else
                                    Cookies.set('gosoTOC_hidetoc', '1', {expires: 30, path: '/'});
                            }

                            toc.hide('fast');
                            wrapper.removeClass('show-table').addClass('hide-table');

                        } else {

                            $(this).data('visible', true);

                            if (Cookies) {

                                if (invert)
                                    Cookies.set('gosoTOC_hidetoc', '1', {expires: 30, path: '/'});
                                else
                                    Cookies.set('gosoTOC_hidetoc', null, {path: '/'});
                            }

                            toc.show('fast');
                            wrapper.removeClass('hide-table').addClass('show-table');

                        }

                    });

                    stoggle.data('visible', false);
                    stoc.hide();
                    mswrapper.addClass('hide-table');

                    stoggle.off().on('click', function (event) {
                        event.preventDefault();
                        if ($(this).data('visible')) {
                            $(this).data('visible', false);
                            stoc.hide('fast');
                            swrapper.removeClass('show-table').addClass('hide-table');
                            mswrapper.removeClass('show-table').addClass('hide-table');
                        } else {
                            $(this).data('visible', true);
                            stoc.show('fast');
                            swrapper.removeClass('hide-table').addClass('show-table');
                            mswrapper.removeClass('hide-table').addClass('show-table');
                        }
                    });
                });
            }

            // ======================================
            // Set active heading in goso-toc-widget list
            // ======================================

            var getGosoTocListElementLinkByHeading = function (heading) {
                return $('.goso-sticky-toc .goso-toc-list a[href="#' + $(heading).attr('id') + '"]');
            }

            var getHeadingToListElementLinkMap = function (headings) {
                return headings.reduce(function (map, heading) {
                    map[heading.id] = getGosoTocListElementLinkByHeading(heading);
                    return map;
                }, {});
            }

            var headings = $('span.goso-toc-section').toArray();
            var headingToListElementLinkMap = getHeadingToListElementLinkMap(headings);
            var listElementLinks = $.map(headingToListElementLinkMap, function (value, key) {
                return value
            });

            var getScrollOffset = function () {
                var scrollOffset = 5; // so if smooth offset is off, the correct title is set as active
                if (typeof GosoTOC.smooth_scroll != 'undefined' && parseInt(GosoTOC.smooth_scroll) === 1) {
                    scrollOffset = (typeof GosoTOC.scroll_offset != 'undefined') ? parseInt(GosoTOC.scroll_offset) : 30;
                }

                var adminbar = $('#wpadminbar');

                if (adminbar.length) {
                    scrollOffset += adminbar.height();
                }
                return scrollOffset;
            }

            var scrollOffset = getScrollOffset();

            var activateSetActiveGosoTocListElement = function () {
                if (headings.length > 0 && $('.goso-sticky-toc').length) {
                    $(window).on('load resize scroll', setActiveGosoTocListElement);
                }
            }

            activateSetActiveGosoTocListElement();

            var setActiveGosoTocListElement = function () {
                var activeHeading = getActiveHeading(scrollOffset, headings);
                if (activeHeading) {
                    var activeListElementLink = headingToListElementLinkMap[activeHeading.id];
                    removeStyleFromNonActiveListElement(activeListElementLink, listElementLinks);
                    setStyleForActiveListElementElement(activeListElementLink);
                }
            }

            var deactivateSetActiveGosoTocListElement = function () {
                $(window).off('load resize scroll', setActiveGosoTocListElement);
            }


            var getActiveHeading = function (topOffset, headings) {
                var scrollTop = $(window).scrollTop();
                var relevantOffset = scrollTop + topOffset + 1;
                var activeHeading = headings[0];
                var closestHeadingAboveOffset = relevantOffset - $(activeHeading).offset().top;
                headings.forEach(function (section) {
                    var topOffset = relevantOffset - $(section).offset().top;
                    if (topOffset > 0 && topOffset < closestHeadingAboveOffset) {
                        closestHeadingAboveOffset = topOffset;
                        activeHeading = section;
                    }
                });
                return activeHeading;
            }

            var removeStyleFromNonActiveListElement = function (activeListElementLink, listElementLinks) {
                listElementLinks.forEach(function (listElementLink) {
                    if (activeListElementLink !== listElementLink && listElementLink.parent().hasClass('active')) {
                        listElementLink.parent().removeClass('active');
                    }
                });
            }

            var setStyleForActiveListElementElement = function (activeListElementLink) {
                var activeListElement = activeListElementLink.parent();
                if (!activeListElement.hasClass('active')) {
                    activeListElement.addClass('active');
                }
            }
        }
    }

    goso_init_toc();

    $('body').on('single_loaded_more', function () {
        goso_init_toc();
    });
});
