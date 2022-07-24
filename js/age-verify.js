/* global authow_settings */
(function ($) {
    "use strict";
    var PENCI = PENCI || {};
    PENCI.ageVerify = function () {
        if (Cookies.get('goso_age_verify') === 'confirmed') {
            return;
        }

        $.magnificPopup.open({
            items: {
                src: '.goso-age-verify'
            },
            type: 'inline',
            closeOnBgClick: false,
            closeBtnInside: false,
            showCloseBtn: false,
            enableEscapeKey: false,
            removalDelay: 500,
            tClose: true,
            tLoading: false,
            callbacks: {
                beforeOpen: function () {
                    this.st.mainClass = 'mfp-ani-wrap goso-promo-popup-wrapper';
                }
            }
        });

        $('.goso-age-verify-allowed').on('click', function () {
            Cookies.set('goso_age_verify', 'confirmed', {
                expires: parseInt(goso_age_settings.age_verify_expires),
                path: '/'
            });

            $.magnificPopup.close();
        });

        $('.goso-age-verify-forbidden').on('click', function () {
            $('.goso-age-verify').addClass('goso-forbidden');
        });
    };

    $(document).ready(function () {
        PENCI.ageVerify();
    });
})(jQuery);
