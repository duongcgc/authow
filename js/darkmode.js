(function ($) {
    "use strict";
    var GOSO = GOSO || {};

    /* General functions
	 ---------------------------------------------------------------*/
    GOSO.darkmode = function () {
        $(document).on('click', '.pcdm-slider', function () {
            var t = $(this);

            t.toggleClass('activate');

            if (t.hasClass('activate')) {
                $('body').addClass('dark-layout-enabled').addClass('pcdark-mode');
                Cookies.set('goso_dark_enable', 'enable', {
                    expires: 86400,
                    path: '/'
                });
            } else {
                $('body').removeClass('dark-layout-enabled').removeClass('pcdark-mode');
                Cookies.set('goso_dark_enable', 'disable', {
                    expires: 86400,
                    path: '/'
                });
            }
        });
    }
    $(document).ready(function () {
        GOSO.darkmode();
    });
})(jQuery);
