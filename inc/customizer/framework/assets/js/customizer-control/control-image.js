(function($, api){
  "use strict";

  api.controlConstructor['authow-fw-image'] = api.ImageControl.extend({
    initialize: function( id, options ) {
      api.Control.prototype.initialize.call( this, id, options );
      window.initializeControl(this, id, options);
    },
  });
})(jQuery, wp.customize);
