(function ($) {
    "use strict";
    var PENCI = PENCI || {};
    PENCI.promoPopup = function () {

        if ($('body').hasClass('pc-age-verify') && Cookies.get('goso_age_verify') !== 'confirmed') {
            return false;
        }

        var promo_version = goso_popup_settings.promo_version,
            shown = false,
            pages = Cookies.get('goso_shown_pages'),

            showPopup = function () {
                $.magnificPopup.open({
                    items: {
                        src: '.goso-popup-content'
                    },
                    type: 'inline',
                    removalDelay: 500, //delay removal by X to allow out-animation
                    tClose: true,
                    tLoading: false,
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = 'mfp-ani-wrap goso-promo-popup-wrapper';
                        },
                        close: function () {
                            if ('section' === goso_popup_settings.popup_event) {
                                sessionStorage.setItem('goso_popup_' + promo_version, 'shown');
                            } else if ('all_pages' !== goso_popup_settings.popup_event) {
                                Cookies.set('goso_popup_' + promo_version, 'shown', {
                                    expires: parseInt(goso_popup_settings.popup_delay),
                                    path: '/'
                                });
                            }
                        }
                    }
                });
            };

        if (!pages) {
            pages = 0;
        }

        if (pages < goso_popup_settings.popup_pages) {
            pages++;

            Cookies.set('goso_shown_pages', pages, {
                expires: goso_popup_settings.popup_delay,
                path: '/'
            });

            return false;
        }

        if (('section' !== goso_popup_settings.popup_event && Cookies.get('goso_popup_' + promo_version) !== 'shown') || ('section' === goso_popup_settings.popup_event && sessionStorage.getItem('goso_popup_' + promo_version) !== 'shown')) {
            showPopup();
        }

        if ('all_pages' === goso_popup_settings.popup_event) {
            showPopup();
        }
    };

    $(document).ready(function () {
        PENCI.promoPopup();
    });
})(jQuery);
