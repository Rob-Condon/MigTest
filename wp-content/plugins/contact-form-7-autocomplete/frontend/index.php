<?php
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
class cf7_auto_frontend {
    function __construct(){
        add_action("wp_enqueue_scripts",array($this,"add_lib"));
        add_action( 'wp_ajax_cf7_auto', array($this,'ajax_callback') );
        add_action( 'wp_ajax_nopriv_cf7_auto',array($this,'ajax_callback') );
        add_action( 'wpcf7_init', array($this,'wpcf7_add_form_tag_text') );
        add_action("wp_footer",array($this,"footer"));
        add_filter( 'wpcf7_posted_data', array($this,'wpcf7_custom_address_posted_data') );
    }
    function wpcf7_custom_address_posted_data($posted_data){
        $tags = wpcf7_scan_form_tags(
            array( 'type' => array( 'text', 'text*' ) ) );

          if ( empty( $tags ) ) {
            return $posted_data;
          }

          foreach ( $tags as $tag ) {
            if ( ! isset( $posted_data[$tag->name] ) ) {
              continue;
            }

            $options = $tag->options;
            if( count($options) > 0) {
                foreach( $options as $option ){ 
                   if( preg_match("#add_autocomplete#",$option)){
                        $autos = explode(":",$option);
                        if( isset($autos[1])){
                            if( $autos[1] == "address" || $autos[1] == "address_full") { 
                                $br = "\n";
                                $data_full = "Address: " . $posted_data[$tag->name] .$br;
                                $data_full .= "Street address: ".$posted_data["street_number_".$tag->name].$br;
                                $data_full .= "Route: ".$posted_data["route_".$tag->name].$br;
                                $data_full .= "City: ". $posted_data["locality_".$tag->name].$br;
                                $data_full .= "State: ". $posted_data["administrative_area_level_1_".$tag->name].$br;
                                $data_full .= "Zip code : ". $posted_data["postal_code_".$tag->name].$br;
                                $data_full .= "Country: ". $posted_data["country_".$tag->name].$br;
                                $posted_data[$tag->name] = $data_full;
                            }
                        }
                    }
                }
            }
            
          }
          return $posted_data;

    }
    function footer(){
        ?>
        <div class="pac-container1" style="display: none;">
            <div class="pac-item1"><?php _e("Loading...",CT_7_AUTO_TEXT_DOMAIN) ?></div>
        </div>
        <?php
    }
    /*
    * Custom html text
    */
    function wpcf7_add_form_tag_text(){
        wpcf7_add_form_tag(
          array( 'text', 'text*' ),
          'wpcf7_text_form_tag_handler1', array( 'name-attr' => true ) );
    }
     /*
    * Add js and css
    */
   
     function add_lib(){
        $key = (get_option("_cf7_auto_key"))?get_option("_cf7_auto_key"):"AIzaSyCBKu8gwzxqTk_6vNh4C6YlqP4DH1AoVyI";
        wp_register_script("googleapis",'https://maps.googleapis.com/maps/api/js?key=' .$key . '&libraries=places');
        wp_register_script("googleapis_map_main",CT_7_AUTO_PLUGIN_URL."frontend/js/maps.js",array("googleapis","jquery"));
        wp_register_script("contact-form-7-auto",CT_7_AUTO_PLUGIN_URL."frontend/js/cf7_auto.js",array('jquery'),time(),true);
        wp_localize_script("contact-form-7-auto","cf7_auto",array("ajaxurl"=>admin_url( 'admin-ajax.php' )));
        wp_register_style("contact-form-7-auto",CT_7_AUTO_PLUGIN_URL."frontend/css/cf7_auto.css");
    }
    /*
    * Ajax callback
    */
    function ajax_callback(){
        $keyword = $_POST["keyword"];
        $type = $_POST["type"];
        $name = $_POST["name"];
        $type_custom = explode("|",$type);
        //var_dump($type_custom);
        
       
        if( $type == "users" ) :
            $i=1;
            $blogusers = get_users( array( 'search' => $keyword ) );
            foreach ( $blogusers as $user ) {
                $data .= '<div data-name="'.$name.'" class="pac-item1">'.esc_html( $user->display_name ).'</div>';
                if( $i>4){
                    break;
                }
                $i++;
            }
        elseif( $type_custom[0] == "data"):
          global $wpdb;
            $fivesdrafts = $wpdb->get_results("SELECT * FROM ".$type_custom[1]." WHERE ".$type_custom[2] ." LIKE '%".$keyword."%' LIMIT 10");
            if( is_array($fivesdrafts)):
              foreach ( $fivesdrafts as $fivesdraft ){
                $data .= '<div data-name="'.$name.'" class="pac-item1">'.esc_html( $fivesdraft->$type_custom[3]  ).'</div>';
              }
            endif;
        else:
            $new  = new WP_Query(array("post_type"=>$type,"s"=>$keyword,"posts_per_page"=>5));
            $data ="";
            while( $new->have_posts() ) : $new->the_post();
            $data .= '<div data-name="'.$name.'" class="pac-item1">'.get_the_title().'</div>';
            endwhile;wp_reset_postdata();
        endif;
        echo($data);
        die();
    }
}
new cf7_auto_frontend;

function wpcf7_text_form_tag_handler1($tag){
    $tag = new WPCF7_FormTag( $tag );
    ;
    if ( empty( $tag->name ) ) {
      return '';
  }

  $validation_error = wpcf7_get_validation_error( $tag->name );

  $class = wpcf7_form_controls_class( $tag->type, 'wpcf7-text' );

  if ( in_array( $tag->basetype, array( 'email', 'url', 'tel' ) ) ) {
      $class .= ' wpcf7-validates-as-' . $tag->basetype;
  }

  if ( $validation_error ) {
      $class .= ' wpcf7-not-valid';
  }

  $atts = array();

  $atts['size'] = $tag->get_size_option( '40' );
  $atts['maxlength'] = $tag->get_maxlength_option();
  $atts['minlength'] = $tag->get_minlength_option();

  if ( $atts['maxlength'] && $atts['minlength']
   && $atts['maxlength'] < $atts['minlength'] ) {
      unset( $atts['maxlength'], $atts['minlength'] );
}
    /*
    * Custom
    */
    $options = $tag->options;

    $class_auto ="";
    $check_id = false;
    $check_auto = false;
    if( count($options) > 0) {
        foreach( $options as $option ){
            if( preg_match("#add_autocomplete#",$option)){
                $autos = explode(":",$option);
                if( isset($autos[1])){
                    if( $autos[1] == "address" || $autos[1] == "address_full") {
                        //$atts['id'] = "autocomplete_map";
                        wp_enqueue_script("googleapis_map_main");
                        if( $autos[1] == "address_full" ) {
                            $class_auto = "autocomplete_map";
                            $class_show = true;
                        }else{
                            $class_show = false;
                            $class_auto = "autocomplete_map";
                        }
                        
                        $check_id = true;
                    }else{
                        $class_auto = "add_autocomplete";
                        $atts["data-autocomplete"] = $autos[1];
                        $atts['autocomplete'] = "off";
                        $check_auto = true;
                        wp_enqueue_script("contact-form-7-auto");
                    }
                    wp_enqueue_style("contact-form-7-auto");

                }
                break;
            }
        }
    }

    $atts['class'] = $tag->get_class_option( $class )." $class_auto";
    if( !$check_id ) {
        $atts['id'] = $tag->get_id_option();
    }
    if( !$check_auto ) {
        $atts['autocomplete'] = $tag->get_option( 'autocomplete',
          '[-0-9a-zA-Z]+', true );
    }
    /*
    * And custom
    */


    $atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );



    if ( $tag->has_option( 'readonly' ) ) {
      $atts['readonly'] = 'readonly';
  }

  if ( $tag->is_required() ) {
      $atts['aria-required'] = 'true';
  }

  $atts['aria-invalid'] = $validation_error ? 'true' : 'false';

  $value = (string) reset( $tag->values );

  if ( $tag->has_option( 'placeholder' ) || $tag->has_option( 'watermark' ) ) {
      $atts['placeholder'] = $value;
      $value = '';
  }

  $value = $tag->get_default_option( $value );

  $value = wpcf7_get_hangover( $tag->name, $value );

  $atts['value'] = $value;

  if ( wpcf7_support_html5() ) {
      $atts['type'] = $tag->basetype;
  } else {
      $atts['type'] = 'text';
  }

  $atts['name'] = $tag->name;

  $atts = wpcf7_format_atts( $atts );

  $html = sprintf(
      '<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
      sanitize_html_class( $tag->name ), $atts, $validation_error );

  if( isset($autos[1])){ 
    if( $autos[1] == "address_full" || $autos[1] == "address") { 
        $html = sprintf(
      '<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
      sanitize_html_class( $tag->name ), $atts.' ', $validation_error );
          ob_start();
          ?>
          <table class="address-autocomplete-maps <?php if($class_show){echo 'address-autocomplete-maps-'.$tag->name; } ?> hidden">
              <tr>
                  <td class="label">
                      <?php _e("Street address",CT_7_AUTO_TEXT_DOMAIN) ?>
                  </td>
                  <td class="slimField">
                      <input class="street_number_<?php echo  $tag->name  ?>" name="street_number_<?php echo  $tag->name  ?>">
                  </td>
                  <td class="wideField" colspan="2">
                      <input class="route_<?php echo  $tag->name  ?>" name="route_<?php echo  $tag->name  ?>">
                  </td>
              </tr>
              <tr>
                  <td class="label">
                      <?php _e("City",CT_7_AUTO_TEXT_DOMAIN) ?>
                  </td>
                  <td class="wideField" colspan="3">
                      <input class="locality_<?php echo  $tag->name  ?>" name="locality_<?php echo  $tag->name  ?>">
                  </td>
              </tr>
              <tr>
                  <td class="label"><?php _e("State",CT_7_AUTO_TEXT_DOMAIN) ?></td>
                  <td class="slimField">
                      <input class="field" class="administrative_area_level_1_<?php echo  $tag->name  ?>" name="administrative_area_level_1_<?php echo  $tag->name  ?>">
                  </td>
                  <td class="label">
                      <?php _e("Zip code",CT_7_AUTO_TEXT_DOMAIN) ?>
                  </td>
                  <td class="wideField">
                    <input  class="postal_code_<?php echo  $tag->name  ?>" name="postal_code_<?php echo  $tag->name  ?>">
                  </td>
              </tr>
              <tr>
                  <td class="label">
                      <?php _e("Country",CT_7_AUTO_TEXT_DOMAIN) ?>
                  </td>
                  <td class="wideField" colspan="3">
                      <input class="country_<?php echo  $tag->name  ?>" name="country_<?php echo  $tag->name  ?>">
                   </td>
              </tr>
          </table>
          <?php
          $data = ob_get_contents();
          ob_end_clean();

            $html .= $data;
        return $html.'';
          }else{
            return $html;
        }
    }else{
        return $html;
    }

}