(function ($) {
    "use strict";
    var PENCI = PENCI || {};
    PENCI.elButtonPopup = function () {
        $('.pc-popup-btn').magnificPopup({
            type: 'inline',
            removalDelay: 500, //delay removal by X to allow out-animation
            tClose: true,
            tLoading: true,
            callbacks: {
                beforeOpen: function () {
                    this.st.mainClass = 'mfp-ani-wrap penci-promo-popup-wrapper';
                },
            }
        });
    };

    $(document).ready(function () {
        PENCI.elButtonPopup();
    });
    $(window).on('elementor/frontend/init', function () {
        if (window.elementorFrontend) {

            elementorFrontend.hooks.addAction('frontend/element_ready/penci-button-popup.default', function ($scope) {
                PENCI.elButtonPopup();
            });
        }
    });
})(jQuery);
