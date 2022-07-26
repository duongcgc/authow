window.onload = function () {
    var events = [
        'keydown',
        'scroll',
        'mouseover',
        'touchmove',
        'touchstart',
        'mousedown',
        'mousemove'
    ];

    var triggerListener = function (e) {
        jQuery(window).trigger('gosoEventStarted');
        removeListener();
    };

    var removeListener = function () {
        events.forEach(function (eventName) {
            window.removeEventListener(eventName, triggerListener);
        });
    };

    var addListener = function (eventName) {
        window.addEventListener(eventName, triggerListener);
    };

    events.forEach(function (eventName) {
        addListener(eventName);
    });
};
(function ($) {
    "use strict";
    var GOSO = GOSO || {};

    GOSO.googleMapInit = function () {
        $('.google-map-container').each(function () {
            var $map = $(this);
            var data = $map.data('map-args');

            var config = {
                locations: [
                    {
                        lat: data.latitude,
                        lon: data.longitude,
                        icon: data.marker_icon,
                        animation: google.maps.Animation.DROP
                    }
                ],
                controls_on_map: false,
                map_div: '#' + data.selector,
                start: 1,
                map_options: {
                    zoom: parseInt(data.zoom),
                    scrollwheel: 'yes' === data.mouse_zoom
                }
            };

            if (data.json_style) {
                config.styles = {};
                config.styles['Custom Style'] = $.parseJSON(data.json_style);
            }

            if ('yes' === data.marker_text_needed) {
                config.locations[0].html = data.marker_text;
            }

            if ('button' === data.init_type) {
                $map.find('.goso-init-map').on('click', function (e) {
                    e.preventDefault();

                    if ($map.hasClass('goso-map-inited')) {
                        return;
                    }

                    $map.addClass('goso-map-inited');
                    new Maplace(config).Load();
                });
            } else if ('scroll' === data.init_type) {
                $(window).on('scroll', function () {
                    if (window.innerHeight + $(window).scrollTop() + parseInt(data.init_offset) > $map.offset().top) {
                        if ($map.hasClass('goso-map-inited')) {
                            return;
                        }

                        $map.addClass('goso-map-inited');
                        new Maplace(config).Load();
                    }
                });
            } else if ('interaction' === data.init_type) {
                $(window).on('gosoEventStarted', function () {
                    new Maplace(config).Load();
                });
            } else {
                new Maplace(config).Load();
            }
        });

        var $gmap = $('.google-map-container-with-content');

        $(window).on('resize', function () {
            $gmap.css({
                'height': $gmap.find('.goso-google-map.with-content').outerHeight()
            });
        });
    };

    $(document).ready(function () {
        GOSO.googleMapInit();
    });

    $( window ).on( 'elementor/frontend/init', function() {
        if ( window.elementorFrontend ) {

            elementorFrontend.hooks.addAction('frontend/element_ready/goso-map.default', function ($scope) {
                GOSO.googleMapInit();
            });
        }
    });
})(jQuery);
