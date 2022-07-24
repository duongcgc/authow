(function ($, api) {
    "use strict";

    api.Panel = api.Panel.extend({
        expand: function (params) {
            var panel = this.container[1];

            if (panel.id === 'sub-accordion-panel-authow_fw_header' || panel.id === 'sub-accordion-panel-authow_header') {
                $('body').trigger('authow-fw-open-header-builder');
            }

            return this._toggleExpanded(true, params);
        }
    });

})(jQuery, wp.customize);
