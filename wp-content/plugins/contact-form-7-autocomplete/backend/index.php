<?php
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
class cf7_auto_backend {
    function __construct(){
        add_action("admin_enqueue_scripts",array($this,"add_lib"),0,0);
        add_filter("wpcf7_editor_panels",array($this,"custom_form"));
        add_action("wpcf7_save_contact_form", array($this,"save_data"));
    }
    /*
    * Add css and js
    */
    function add_lib(){
        wp_enqueue_script("cf7_auto",CT_7_AUTO_PLUGIN_URL."/backend/js/cf7_auto.js",array(),time());
        wp_enqueue_style("cf7_auto",CT_7_AUTO_PLUGIN_URL."/backend/css/cf7_auto.css",array(),time());
        $args = array(
           'public'   => true
        );
        $post_types = get_post_types( $args );
        wp_localize_script( 'cf7_auto', 'cf7_auto', $post_types );
    }
    function custom_form($panels){
        $panels["form-panel-auto-setting"] = array(
				'title' => __( 'Google Autocomplete Key', 'contact-form-7' ),
				'callback' => "cf7_auto_setting_form" );
        return $panels;
    }
     function save_data($contact_form){
        $post_id = $contact_form->id;
        $key = $_POST["cf7_auto_key"];
        update_option( '_cf7_auto_key', $key);
    }
}
new cf7_auto_backend;
function cf7_auto_setting_form($post){
    ?>
    <table class="form-table">
        <tr>
			<th scope="row">
				<label for="cf7_auto_key">
					<?php _e("Google Autocomplete Key",CT_7_MULTISTEP_TEXT_DOMAIN) ?>
				</label>
			</th>
			<td>
				<input name="cf7_auto_key" type="text" value="<?php echo get_option("_cf7_auto_key") ?>" class="regular-text">
			     <a href="https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform" target="_blank">Link Get key</a>
            </td>
		</tr>
    </table>
    <?php
}