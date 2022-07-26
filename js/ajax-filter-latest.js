/* global gosoBlock */
/* global gosoBlocksArray */
jQuery(document).ready(function ($) {
    var nav = [];
    $('.elementor-widget-goso-latest-posts').each(function () {
        var elID = $(this).data('id');
        if ($(this).find('.pcflx-nav').length > 0) {
            var maxnum = $(this).find('.pcflx li.all a').attr('data-maxp');
            if (parseInt(maxnum) <= 1) {
                $(this).find('.pcflx-nav .pcaj-nav-link').addClass('disable');
            }
        }
        if($(this).find('.goso-ajax-more').length) {
            nav[elID] = $(this).find('.goso-ajax-more').prop('outerHTML');
        }
    });
    jQuery('body').on('click', '.elementor-widget-goso-latest-posts .pc-ajaxfil-link', function (event) {
        event.preventDefault();
        if (!$(this).hasClass('loading-posts')) {
            var $this = $(this),
                $navthis = $this,
                parentID = $(this).closest('.elementor-widget-goso-latest-posts').data('id'),
                parentclass = $(this).closest('.pcnav-lgroup'),
                wrapper = $(this).closest('.goso-latest-posts-sc').find('.goso-wrapper-posts-ajax'),
                wrapId = $this.data('id'),
                layout = parentclass.data('layout'),
                ppp = parentclass.data('number'),
                offset = parentclass.attr('data-offset'),
                exclude = parentclass.data('exclude'),
                from = parentclass.data('from'),
                comeFrom = parentclass.data('come_from'),
                mixed = parentclass.data('mixed'),
                query = parentclass.data('query'),
                infeedads = parentclass.data('infeedads'),
                number = parentclass.data('number'),
                query_type = parentclass.data('query_type'),
                archivetype = parentclass.data('archivetype'),
                archivevalue = parentclass.data('archivevalue'),
                tag = $this.data('tag'),
                cat = $this.data('cat'),
                author = $this.data('author'),
                template = parentclass.data('template'),
                navlink = false,
                prev,
                pagednum = parseInt($this.attr('data-paged')),
                curpaged = pagednum,
                $wrap_content_id = wrapper.find('.pwid-' + wrapId);


            wrapper.addClass('loading-posts pcftaj-ld');
            $this.addClass('loading-posts');

            if ($this.hasClass('pcaj-nav-link')) {
                navlink = true;
            }

            if (navlink && $this.hasClass('prev')) {
                prev = true;
            }

            if (navlink) {
                $this = parentclass.find('.current-item');
                wrapId = $this.data('id');
                cat = $this.data('cat');
                tag = $this.data('tag');
                curpaged = parseInt($this.attr('data-paged'));

                if (prev) {
                    pagednum = curpaged - 1;
                } else {
                    pagednum = curpaged + 1;
                }
            }

            if (!navlink) {
                parentclass.find('.pc-ajaxfil-link').removeClass('current-item');
                $this.addClass('current-item');
            }

            if (wrapId === 'default' && !navlink) {
                wrapper.find('.goso-wrapper-posts-content').hide();
                wrapper.find('.pwid-default').show();
                wrapper.removeClass('loading-posts pcftaj-ld');
                $this.removeClass('loading-posts');
                $navthis.removeClass('loading-posts');

                var maxp = $(this).attr('data-maxp');

                if (curpaged <= 1) {
                    parentclass.find('.pc-ajaxfil-link.prev').addClass('disable');
                } else {
                    parentclass.find('.pc-ajaxfil-link.prev').removeClass('disable');
                }

                if ($wrap_content_id.find('.pc-nomorepost').length || maxp <= 1) {
                    parentclass.find('.pc-ajaxfil-link.next').addClass('disable');
                } else {
                    parentclass.find('.pc-ajaxfil-link.next').removeClass('disable');
                }

                var o = 0;
                $wrap_content_id.find('.list-post,.grid-style,.grid-masonry').each(function () {
                    o++;
                    $(this).addClass('goso-ajrs-animate').attr('style', 'animation-delay:' + o / 10 + 's')
                });
            } else if ($wrap_content_id.length && !navlink) {
                wrapper.find('.goso-wrapper-posts-content').hide();
                $wrap_content_id.show();
                wrapper.removeClass('loading-posts pcftaj-ld');
                $this.removeClass('loading-posts');
                $navthis.removeClass('loading-posts');

                if (curpaged <= 1) {
                    parentclass.find('.pc-ajaxfil-link.prev').addClass('disable');
                } else {
                    parentclass.find('.pc-ajaxfil-link.prev').removeClass('disable');
                }

                if ($wrap_content_id.find('.pc-nomorepost').length) {
                    parentclass.find('.pc-ajaxfil-link.next').addClass('disable');
                } else {
                    parentclass.find('.pc-ajaxfil-link.next').removeClass('disable');
                }

                var o = 0;
                $wrap_content_id.find('.list-post,.grid-style,.grid-masonry').each(function () {
                    o++;
                    $(this).addClass('goso-ajrs-animate').attr('style', 'animation-delay:' + o / 10 + 's')
                });
            } else {

                var OBjBlockData = gosoGetOBjBlockData(parentclass.data('blockid')),
                    dataFilter = OBjBlockData.atts_json ? JSON.parse(OBjBlockData.atts_json) : OBjBlockData.atts_json;

                var data = {
                    action: 'goso_more_post_ajax',
                    query: query,
                    offset: offset,
                    mixed: mixed,
                    layout: layout,
                    exclude: exclude,
                    from: from,
                    comefrom: comeFrom,
                    datafilter: dataFilter,
                    template: template,
                    ppp: ppp,
                    number: number,
                    infeedads: infeedads,
                    query_type: query_type,
                    archivetype: archivetype,
                    archivevalue: archivevalue,
                    tag: tag,
                    cat: cat,
                    author: author,
                    pagednum: pagednum,
                    qtype: 'ajaxtab',
                    nonce: ajax_var_more.nonce,
                };


                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: ajax_var_more.url,
                    data: data,
                    success: function (data) {

                        var data_offset = parseInt(offset) + ppp,
                            data_paded = curpaged,
                            $wrap_content,
                            $check_class = false,
                            $check_masonry = false;

                        if (wrapper.find('.goso-wrapper-posts-content .goso-wrapper-data').hasClass('goso-grid')) {
                            $check_class = true;
                        }

                        if (wrapper.find('.goso-wrapper-posts-content .goso-wrapper-data').hasClass('masonry')) {
                            $check_masonry = true;
                        }

                        if (navlink) {
                            wrapper.find('.pwid-' + wrapId).remove();
                            data_paded = curpaged + 1;
                        }

                        if (prev) {
                            data_paded = curpaged - 1;
                        }

                        if ($check_class) {
                            wrapper.append('<div class="goso-wrapper-posts-content pwcustom pwid-' + wrapId + '"><ul class="goso-wrapper-data goso-grid goso-shortcode-render"></ul></div>');
                        } else if ($check_masonry) {
                            wrapper.append('<div class="goso-wrapper-posts-content pwcustom pwid-' + wrapId + '"><div class="goso-wrap-masonry"><div class="goso-wrapper-data masonry goso-masonry"></div></div></div>');
                        } else {
                            wrapper.append('<div class="goso-wrapper-posts-content pwcustom pwid-' + wrapId + '"><div class="goso-wrapper-data"></div></div>');
                        }

                        $wrap_content = wrapper.find('.pwid-' + wrapId + ' .goso-wrapper-data');

                        if (data) {
                            $this.attr('data-paged', data_paded);
                            $this.attr('data-offset', data_offset);

                            if (data_paded <= 1) {
                                parentclass.find('.pc-ajaxfil-link.prev').addClass('disable');
                            } else {
                                parentclass.find('.pc-ajaxfil-link.prev').removeClass('disable');
                            }

                            if (layout === 'masonry' || layout === 'masonry-2') {
                                var $data = $(data);
                                $wrap_content.append($data).imagesLoaded(function () {
                                    $wrap_content.isotope({
                                        itemSelector: '.item-masonry',
                                        transitionDuration: '.55s',
                                        layoutMode: 'masonry'
                                    });
                                });

                                $(".container").fitVids();

                                $('.goso-wrapper-data .goso-owl-carousel-slider').each(function () {
                                    var $this = $(this),
                                        $rtl = false;
                                    if ($('html').attr('dir') === 'rtl') {
                                        $rtl = true;
                                    }
                                    var owl_args = {
                                        rtl: $rtl,
                                        loop: true,
                                        margin: 0,
                                        items: 1,
                                        navSpeed: 600,
                                        lazyLoad: true,
                                        dotsSpeed: 600,
                                        nav: true,
                                        dots: false,
                                        navText: ['<i class="gosoicon-left-chevron"></i>', '<i class="gosoicon-right-chevron"></i>'],
                                        autoplay: true,
                                        autoplayTimeout: 5000,
                                        autoHeight: true,
                                        autoplayHoverPause: true,
                                        autoplaySpeed: 600
                                    };

                                    $this.owlCarousel(owl_args);
                                });

                                if ($().easyPieChart) {
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

                            } else {
                                var $data = $(data);
                                $wrap_content.append($data);

                                $(".container").fitVids();

                                $('.goso-wrapper-data .goso-owl-carousel-slider').each(function () {
                                    var $this = $(this),
                                        $datalazy = false,
                                        $rtl = false;

                                    if ($('html').attr('dir') === 'rtl') {
                                        $rtl = true;
                                    }
                                    if ($this.attr('data-lazy')) {
                                        $datalazy = true;
                                    }
                                    var owl_args = {
                                        rtl: $rtl,
                                        loop: true,
                                        margin: 0,
                                        items: 1,
                                        navSpeed: 600,
                                        dotsSpeed: 600,
                                        lazyLoad: $datalazy,
                                        nav: true,
                                        dots: false,
                                        navText: ['<i class="gosoicon-left-chevron"></i>', '<i class="gosoicon-right-chevron"></i>'],
                                        autoplay: true,
                                        autoplayTimeout: 5000,
                                        autoHeight: true,
                                        autoplayHoverPause: true,
                                        autoplaySpeed: 600
                                    };

                                    $this.imagesLoaded(function () {
                                        $this.owlCarousel(owl_args);
                                    });
                                });

                                if ($().easyPieChart) {
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
                                        var $this = $(this);
                                        if ($this.attr('title')) {
                                            var $title = $this.attr('title');
                                            $this.children().append('<div class="caption">' + $title + '</div>');
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
                                                    $this.addClass('animated');
                                                }); // inview
                                            }); // each
                                        });
                                    });
                                }

                                if ($().theiaStickySidebar) {
                                    var top_margin = 90;
                                    if ($('body').hasClass('admin-bar')) {
                                        top_margin = 122;
                                    }
                                    $('#main.goso-main-sticky-sidebar, #sidebar.goso-sticky-sidebar').theiaStickySidebar({
                                        // settings
                                        additionalMarginTop: top_margin
                                    });
                                } // if sticky
                            }

                            if ($('.pwid-' + wrapId ).find('.pc-nomorepost').length) {
                                parentclass.find('.pc-ajaxfil-link.next').addClass('disable');
                            } else {
                                parentclass.find('.pc-ajaxfil-link.next').removeClass('disable');
                            }

                            if (nav[parentID] !== undefined) {
                                wrapper.find('.pwid-' + wrapId).append($(nav[parentID]));

                                wrapper.find('.pwid-' + wrapId + ' .goso-ajax-more .goso-ajax-more-button')
                                    .removeAttr('data-cat')
                                    .removeAttr('data-tag')
                                    .removeAttr('data-author');

                                if (cat) {
                                    wrapper.find('.pwid-' + wrapId + ' .goso-ajax-more .goso-ajax-more-button').attr('data-cat', cat);
                                }
                                if (tag) {
                                    wrapper.find('.pwid-' + wrapId + ' .goso-ajax-more .goso-ajax-more-button').attr('data-tag', tag);
                                }
                                if (author) {
                                    wrapper.find('.pwid-' + wrapId + ' .goso-ajax-more .goso-ajax-more-button').attr('data-author', author);
                                }
                                wrapper.find('.pwid-' + wrapId + ' .goso-ajax-more .goso-ajax-more-button').attr('data-offset', number);
                            }

                            wrapper.find('.goso-wrapper-posts-content').hide();
                            wrapper.find('.pwid-' + wrapId).show();
                            wrapper.removeClass('loading-posts pcftaj-ld');
                            $this.removeClass('loading-posts');
                            $navthis.removeClass('loading-posts');
                            var o = 0;
                            wrapper.find('.pwid-' + wrapId + ' .list-post, .pwid-' + wrapId + ' .grid-style, .pwid-' + wrapId + ' .grid-masonry').each(function () {
                                o++;
                                $(this).addClass('goso-ajrs-animate').attr('style', 'animation-delay:' + o / 10 + 's')
                            });
                            $(document).trigger('pcajax_loaded');
                        } else {
                            wrapper.find('.goso-wrapper-posts-content').hide();
                            wrapper.find('.pwid-' + wrapId).show();
                            wrapper.find('.pwid-' + wrapId).append('<div class="pcajx-nopost"><span>No post found !</span></div>');
                            wrapper.removeClass('loading-posts pcftaj-ld');
                            $this.removeClass('loading-posts');
                            $navthis.removeClass('loading-posts');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }

                });
            }
        }
    });

    function gosoGetOBjBlockData($blockID) {
        var $obj = new gosoBlock();

        jQuery.each(gosoBlocksArray, function (index, block) {

            if (block.blockID === $blockID) {
                $obj = gosoBlocksArray[index];
            }
        });

        return $obj;
    }
});
