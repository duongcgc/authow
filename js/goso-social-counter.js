jQuery(function ($) {
    'use strict';
    $(document).on('click', '.goso_access_btn', function () {
        window.location.href = $(this).data('setting');
    });
});
