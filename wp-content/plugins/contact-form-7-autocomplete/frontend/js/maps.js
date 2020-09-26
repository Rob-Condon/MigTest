jQuery(document).ready(function($) {
    initAutocomplete();

      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };
      function initAutocomplete() {
     
          $('.autocomplete_map').each(function() {
              var name = $(this).attr("name");
              var autocomplete = new google.maps.places.Autocomplete($(this)[0]);
              google.maps.event.addListener(autocomplete, 'place_changed', function () {
                  
                   $(".address-autocomplete-maps-"+name).removeClass('hidden');
                   var place = autocomplete.getPlace();
                    for (var i = 0; i < place.address_components.length; i++) {
                        var addressType = place.address_components[i].types[0];
                        if (componentForm[addressType]) {
                          var val = place.address_components[i][componentForm[addressType]];
                          $('.'+addressType+ "_" + name ).val(val);
                        }
                      }
              });
          });
      }

      
     



});