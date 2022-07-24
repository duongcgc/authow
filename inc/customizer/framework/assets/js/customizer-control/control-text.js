;(function ($, api) {
  'use strict'

  api.controlConstructor['authow-fw-text'] = api.controlConstructor.default.extend({
    ready: function () {
      var control = this

      this.container.on('change click keyup paste', 'input', function () {
        control.setting.set($(this).val())
      })
    },
  })

  api.controlConstructor['authow-fw-password'] = api.controlConstructor['authow-fw-text']
})(jQuery, wp.customize)
