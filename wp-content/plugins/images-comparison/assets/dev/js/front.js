(function ($) {
    "use strict";

    $(function(){

      $(".images-comparison").each(function(){
        var container = this;
        var options = {
          before_label : '',
          after_label  : '',
          orientation  : 'horizontal',
          default_offset_pct : 0.5 
        };
        if( $(container).data('default_offset_pct') ){
          options.default_offset_pct = Number( $(container).data('default_offset_pct') );
        }
        if( $(container).data('orientation') ){
          options.orientation = $(container).data('orientation');
        }
        if( $(container).data('before_label') ){
          options.before_label = $(container).data('before_label');
        }
        if( $(container).data('after_label') ){
          options.after_label = $(container).data('after_label');
        }
        $(container).imagesLoaded( function() {
          $(container).twentytwenty(options);
        });
      });



    });

})(jQuery);
