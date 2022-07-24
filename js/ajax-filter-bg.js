/* global gosoBlock */
/* global gosoBlocksArray */
jQuery(document).ready(function ($) {
    var nav = [];
    $('.elementor-widget-goso-big-grid').each(function () {
        var t = $(this),
            elID = t.data('id'),
            c = 'li.all .pc-ajaxfil-link',
            datamax = t.find('.goso-biggrid-inner.default .goso-biggrid-data').data('maxp');

        if (t.find(c).length) {
            t.find(c).attr('data-maxp', datamax);
        }

        if (parseInt(datamax) <= 1) {
            $(this).find('.pcflx-nav .pcaj-nav-link').addClass('disable');
        }

        if(t.find('.goso-ajax-more').length) {
            nav[elID] = t.find('.goso-ajax-more').prop('outerHTML');
        }
    });

    jQuery('body').on('click', '.elementor-widget-goso-big-grid .pc-ajaxfil-link', function (event) {
        event.preventDefault();
        if (!$(this).hasClass('loading-posts')) {
            var $this = $(this),
                parentID = $(this).closest('.elementor-widget-goso-big-grid').data('id'),
                $navthis = $this,
                divid = $this.data('id'),
                divc = 'goso-biggrid-tab-' + divid,
                parent = $this.closest('.pcnav-lgroup'),
                settings = parent.data('settings'),
                layout = parent.data('layout'),
                query_type = parent.data('query_type'),
                arppp = parent.data('number'),
                cat = $this.data('cat'),
                tag = $this.data('tag'),
                author = $this.data('author'),
                wrap_content = $this.closest('.goso-biggrid-wrapper').find('.goso-biggrid'),
                mainc = wrap_content.find('.goso-biggrid-data').attr('class'),
                pagednum = parseInt($this.attr('data-paged')),
                curpaged = pagednum,
                navlink = false,
                prev = false,
                o = 0;

            if ($this.hasClass('pcaj-nav-link')) {
                navlink = true;
            }

            if (navlink && $this.hasClass('prev')) {
                prev = true;
            }

            if (navlink) {
                $this = parent.find('.current-item');
                divid = $this.data('id');
                divc = 'goso-biggrid-tab-' + divid;
                cat = $this.data('cat');
                tag = $this.data('tag');
                curpaged = parseInt($this.attr('data-paged'));

                if (prev) {
                    pagednum = curpaged - 1;
                } else {
                    pagednum = curpaged + 1;
                }
            }

            $this.addClass('loading-posts');
            wrap_content.addClass('loading-posts pcftaj-ld');
            parent.find('.pc-ajaxfil-link').removeClass('current-item');
            $this.addClass('current-item');

            if (divid === 'default' && !navlink) {
                wrap_content.find('.goso-biggrid-inner').hide();
                wrap_content.find('.goso-biggrid-inner.default').show();
                wrap_content.removeClass('loading-posts pcftaj-ld');
                $this.removeClass('loading-posts');
                $navthis.removeClass('loading-posts');

                var maxp = $(this).attr('data-maxp');

                wrap_content.find('.goso-biggrid-inner.default .goso-bgitem').each(function () {
                    o++;
                    $(this).addClass('goso-ajrs-animate').attr('style', 'animation-delay:' + o / 10 + 's')
                });

                if (pagednum <= 1) {
                    parent.find('.pc-ajaxfil-link.prev').addClass('disable');
                } else {
                    parent.find('.pc-ajaxfil-link.prev').removeClass('disable');
                }

                if ($('.' + divc).find('.pc-nomorepost').length || parseInt(maxp) <= 1) {
                    parent.find('.pc-ajaxfil-link.next').addClass('disable');
                } else {
                    parent.find('.pc-ajaxfil-link.next').removeClass('disable');
                }

            } else if (wrap_content.find('.' + divc).length && !navlink) {
                wrap_content.find('.goso-biggrid-inner').hide();
                wrap_content.find('.' + divc).show();
                wrap_content.removeClass('loading-posts pcftaj-ld');
                $this.removeClass('loading-posts');
                $navthis.removeClass('loading-posts');
                wrap_content.find('.' + divc + ' .goso-bgitem').each(function () {
                    o++;
                    $(this).addClass('goso-ajrs-animate').attr('style', 'animation-delay:' + o / 10 + 's')
                });

                if (pagednum <= 1) {
                    parent.find('.pc-ajaxfil-link.prev').addClass('disable');
                } else {
                    parent.find('.pc-ajaxfil-link.prev').removeClass('disable');
                }

                if ($('.' + divc).find('.pc-nomorepost').length) {
                    parent.find('.pc-ajaxfil-link.next').addClass('disable');
                } else {
                    parent.find('.pc-ajaxfil-link.next').removeClass('disable');
                }

            } else {

                var data = {
                    action: 'goso_bgmore_post_ajax',
                    settings: settings,
                    layout: layout,
                    pagednum: pagednum,
                    query_type: query_type,
                    cat: cat,
                    tag: tag,
                    author: author,
                    qtype: 'ajaxtab',
                    arppp: arppp,
                    nonce: ajax_var_more.nonce,
                };

                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: ajax_var_more.url,
                    data: data,
                    success: function (data) {
                        if (data) {
                            var data_paded = curpaged;

                            if (navlink) {
                                wrap_content.find('.' + divc).remove();
                                data_paded = curpaged + 1;
                            }

                            if (prev) {
                                data_paded = curpaged - 1;
                            }

                            if (mainc.indexOf("goso-fixh") >= 0) {
                                wrap_content.append('<div class="goso-biggrid-inner ' + divc + '"><div class="goso-big-grid-ajax-data"><div class="' + mainc + '"></div></div></div>');
                            } else {
                                wrap_content.append('<div class="goso-biggrid-inner ' + divc + '"><div class="' + mainc + '"></div></div>');
                            }

                            if (data_paded <= 1) {
                                parent.find('.pc-ajaxfil-link.prev').addClass('disable');
                            } else {
                                parent.find('.pc-ajaxfil-link.prev').removeClass('disable');
                            }

                            if (nav[parentID] !== undefined) {
                                wrap_content.find('.' + divc).append($(nav[parentID]));
                                wrap_content.find('.' + divc + ' .goso-ajax-more .goso-ajax-more-button')
                                    .removeAttr('data-cat')
                                    .removeAttr('data-tag')
                                    .removeAttr('data-author');
                                if (cat) {
                                    wrap_content.find('.' + divc + ' .goso-ajax-more .goso-ajax-more-button').attr('data-cat', cat);
                                }
                                if (tag) {
                                    wrap_content.find('.' + divc + ' .goso-ajax-more .goso-ajax-more-button').attr('data-tag', tag);
                                }
                                if (author) {
                                    wrap_content.find('.' + divc + ' .goso-ajax-more .goso-ajax-more-button').attr('data-author', author);
                                }
                                wrap_content.find('.' + divc + ' .goso-ajax-more .goso-ajax-more-button').attr('data-pagednum', data_paded + 1);
                                wrap_content.find('.' + divc + ' .goso-ajax-more .goso-ajax-more-button').attr('data-paged', data_paded + 1);
                            }

                            $this.attr('data-paged', data_paded);

                            if (layout === 'style-2') {

                                wrap_content.find('.' + divc + ' .goso-biggrid-data').append($data).imagesLoaded(function () {
                                    wrap_content.find('.' + divc + ' .goso-biggrid-data').isotope({
                                        itemSelector: '.item-masonry',
                                        transitionDuration: '.55s',
                                        layoutMode: 'masonry'
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
                            } else {
                                if (layout === 'style-1') {
                                    wrap_content.find('.' + divc + ' .goso-biggrid-data').append(data);
                                } else {
                                    var filter_data = $(data).html();
                                    wrap_content.find('.' + divc + ' .goso-biggrid-data').append(filter_data);
                                }

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
                            }

                            if ($('.' + divc).find('.pc-nomorepost').length) {
                                parent.find('.pc-ajaxfil-link.next').addClass('disable');
                            } else {
                                parent.find('.pc-ajaxfil-link.next').removeClass('disable');
                            }

                            wrap_content.find('.goso-biggrid-inner').hide();
                            wrap_content.find('.' + divc).show();
                            wrap_content.removeClass('loading-posts pcftaj-ld');
                            $this.removeClass('loading-posts');
                            $navthis.removeClass('loading-posts');

                            var o = 0;
                            wrap_content.find('.' + divc + ' .goso-bgitem').each(function () {
                                o++;
                                $(this).addClass('goso-ajrs-animate').attr('style', 'animation-delay:' + o / 10 + 's')
                            });
                            $(document).trigger('bgajax_loaded');
                        } else {
                            if (navlink) {
                                parent.find('.pc-ajaxfil-link.next').addClass('disable');
                            } else {
                                wrap_content.find('.goso-biggrid-inner').hide();
                                wrap_content.find('.' + divc).append('<div class="pcajx-nopost"><span>No post found !</span></div>');
                                wrap_content.find('.' + divc).show();
                            }
                            wrap_content.removeClass('loading-posts pcftaj-ld');
                            $this.removeClass('loading-posts');
                            $navthis.removeClass('loading-posts');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    },
                    completed: function () {
                        wrap_content.removeClass('loading-posts pcftaj-ld');
                        $this.removeClass('loading-posts');
                        $navthis.removeClass('loading-posts');
                    }
                });
            }
        }
    });
});
