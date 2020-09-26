jQuery(document).ready(function($){
    $(".wpcf7-text.add_autocomplete").keyup(function(e){
        var data_name = $(this);
        cf7_auto_delay(function(){
            var id=$(data_name).data("autocomplete");
            var keyword = $(data_name).val();
            var data = {
            		'action': 'cf7_auto',
            		'type': id,
                    'name' : data_name.attr("name"),
                    'keyword': keyword
            	};
            $(".pac-container1").show();
            $(".pac-container1").html('<div class="pac-item1">Loading...</div>');
            jQuery.post(cf7_auto.ajaxurl, data, function(response) {
        		if( response == "" ) {
                    $(".pac-container1").hide();
        		}else{
        		  $(".pac-container1").html(response);
        		}
        	});
        },500 );
    })
    $("body").on("click",".pac-item1",function(e){
        var id = $(this).html();
        var name = $(this).data("name");
        $("input[name='"+name+"']").val(id);
        $(".pac-container1").hide();
        return false;
    })
    $(".wpcf7-text.add_autocomplete").focus(function(e){
      var auto =  $(".pac-container1");
      var left = $(this).offset().left;
      var top = $(this).offset().top;
      var width = $(this).outerWidth();
      var height = $(this).outerHeight();
      auto.css("left",left);
      auto.css("top",top+height);
      auto.css("width",width)
    })
   var cf7_auto_delay = (function( ){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
        })();
})
