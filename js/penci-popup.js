(function ($) {
    "use strict";
    var PENCI = PENCI || {};
    PENCI.promoPopup = function () {

        if ($('body').hasClass('pc-age-verify') && Cookies.get('penci_age_verify') !== 'confirmed') {
            return false;
        }

        var promo_version = penci_popup_settings.promo_version,
            shown = false,
            pages = Cookies.get('penci_shown_pages'),

            showPopup = function () {
                $.magnificPopup.open({
                    items: {
                        src: '.penci-popup-content'
                    },
                    type: 'inline',
                    removalDelay: 500, //delay removal by X to allow out-animation
                    tClose: true,
                    tLoading: false,
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = 'mfp-ani-wrap penci-promo-popup-wrapper';
                        },
                        close: function () {
                            if ('section' === penci_popup_settings.popup_event) {
                                sessionStorage.setItem('penci_popup_' + promo_version, 'shown');
                            } else if ('all_pages' !== penci_popup_settings.popup_event) {
                                Cookies.set('penci_popup_' + promo_version, 'shown', {
                                    expires: parseInt(penci_popup_settings.popup_delay),
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

        if (pages < penci_popup_settings.popup_pages) {
            pages++;

            Cookies.set('penci_shown_pages', pages, {
                expires: penci_popup_settings.popup_delay,
                path: '/'
            });

            return false;
        }

        if (('section' !== penci_popup_settings.popup_event && Cookies.get('penci_popup_' + promo_version) !== 'shown') || ('section' === penci_popup_settings.popup_event && sessionStorage.getItem('penci_popup_' + promo_version) !== 'shown')) {
            showPopup();
        }

        if ('all_pages' === penci_popup_settings.popup_event) {
            showPopup();
        }
    };

    $(document).ready(function () {
        PENCI.promoPopup();
    });
})(jQuery);
