wp.customize.controlConstructor['authow-fw-multi-check'] = wp.customize.controlConstructor.default.extend({

    ready: function () {
        'use strict';

        jQuery('.customize-control-authow-fw-multi-check input[type="checkbox"]').on('change', function () {
                var checkbox_values = jQuery(this).parents('.customize-control').find('input[type="checkbox"]:checked').map(
                    function () {
                        return this.value;
                    }
                ).get().join(',');

                jQuery(this).parents('.customize-control').find('input[type="hidden"]').val(checkbox_values).trigger('change');
            }
        );
    }
});
