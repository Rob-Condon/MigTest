// source --> https://tlcblockcare.co.nz/wp-content/themes/pro/framework/js/dist/site/x-head.min.js?ver=2.0.4 
jQuery.fn.scrollBottom=function(){return jQuery(document).height()-this.scrollTop()-this.height()},jQuery(document).ready(function(t){window.xGlobal={classActive:"x-active",classFocused:"x-focused"},t(".x-btn-navbar, .x-btn-navbar-search, .x-btn-widgetbar").click(function(t){t.preventDefault()}),t('iframe[src*="youtube.com"]').each(function(){var e=t(this).attr("src");t(this).attr("src").indexOf("?")>0?t(this).attr({src:e+"&wmode=transparent",wmode:"Opaque"}):t(this).attr({src:e+"?wmode=transparent",wmode:"Opaque"})}),t("body").on("click",".x-iso-container .flex-direction-nav a",function(){setTimeout(function(){t(window).xsmartresize()},750)}),t("body.x-masonry-active").on("keyup",function(e){e.which>=37&&e.which<=40&&setTimeout(function(){t(window).xsmartresize()},750)})});