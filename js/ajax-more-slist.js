jQuery(document).ready(function ($) {
    function gosoGetsListData() {
        jQuery('body').on('click', '.goso-slajax-more-click .goso-ajax-more-button', function (event) {
            event.preventDefault();
            if (!$(this).hasClass('loading-posts')) {
                var $this = $(this),
                    wrapId = $this.data('id'),
                    parentclass = $(this).closest('.pcnav-lgroup'),
                    wrapper = $(this).closest('.goso-smalllist').find('.pcsl-inner'),
                    tag = $this.data('tag'),
                    cat = $this.data('cat'),
                    ppp = parentclass.data('ppp'),
                    maxitem = $this.data('max'),
                    author = $this.data('author'),
                    mes = $this.data('mes'),
                    type = $this.data('query_type'),
                    pagednum = parseInt($this.attr('data-pagednum')),
                    archivetype = $this.data('archivetype'),
                    archivevalue = $this.data('archivevalue'),
                    curpaged = pagednum;

                var OBjBlockData = gosoGetOBjBlockData($this.data('blockid')),
                    dataFilter = OBjBlockData.atts_json ? JSON.parse(OBjBlockData.atts_json) : OBjBlockData.atts_json;

                $this.addClass('loading-posts');

                var data = {
                    action: 'goso_more_slist_post_ajax',
                    datafilter: dataFilter,
                    id: wrapId,
                    tag: tag,
                    cat: cat,
                    type: type,
                    author: author,
                    pagednum: pagednum,
                    checkmore: true,
                    archivetype: archivetype,
                    archivevalue: archivevalue,
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

                            if (data_paded <= 1) {
                                parentclass.find('.pc-ajaxfil-link.prev').addClass('disable');
                            } else {
                                parentclass.find('.pc-ajaxfil-link.prev').removeClass('disable');
                            }

                            if (data_paded * ppp >= maxitem) {
                                parentclass.find('.pc-ajaxfil-link.next').addClass('disable');
                            } else {
                                parentclass.find('.pc-ajaxfil-link.next').removeClass('disable');
                            }

                            $this.attr('data-pagednum', curpaged + 1);

                            wrapper.append(data);

                            $(".goso-wrapper-smalllist").fitVids();

                            $('.pcsl-crs').owlCarousel();

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
                            $this.removeClass('loading-posts');
                        } else {
                            $this.find(".ajax-more-text").text(mes);
                            $this.find("i").remove();
                            $this.removeClass('loading-posts');
                            setTimeout(function () {
                                $this.parent().remove();
                            }, 1200);
                        }
                    }
                });
            }
        });
    }

    function gosoGetOBjBlockData($blockID) {
        var $obj = new gosoBlock();

        jQuery.each(gosoBlocksArray, function (index, block) {

            if (block.blockID === $blockID) {
                $obj = gosoBlocksArray[index];
            }
        });

        return $obj;
    }

    gosoGetsListData();

    $('body').on('goso-small-list-loaded', function () {
        gosoGetsListData();
    });
});
