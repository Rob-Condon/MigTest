!function($){"use strict";$(function(){$(".images-comparison").each(function(){var t=this,a={before_label:"",after_label:"",orientation:"horizontal",default_offset_pct:.5};$(t).data("default_offset_pct")&&(a.default_offset_pct=Number($(t).data("default_offset_pct"))),$(t).data("orientation")&&(a.orientation=$(t).data("orientation")),$(t).data("before_label")&&(a.before_label=$(t).data("before_label")),$(t).data("after_label")&&(a.after_label=$(t).data("after_label")),$(t).imagesLoaded(function(){$(t).twentytwenty(a)})})})}(jQuery);