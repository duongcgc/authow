( function($, api) {
  "use strict";
  
  api.sectionConstructor.default = api.Section.extend({
    expand : function(params)
    {
      var section = this.container[1];
      
      if(!$(section).hasClass('authow-fw-section-loaded'))
      {
        $(section).addClass('authow-fw-section-loaded').trigger('authow-fw-open-section');
      }
      
      api.Section.prototype.expand.call(this, params);
    }
  });
  
  
})( jQuery, wp.customize );
