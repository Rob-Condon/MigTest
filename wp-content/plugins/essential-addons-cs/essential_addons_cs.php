<?php

/*
Plugin Name: Essential Addons for Cornerstone & Pro
Plugin URI: https://essential-addons.com/cornerstone/
Description: Essential element library for Cornerstone and Pro page builder for WordPress.
Author: Codetic
Author URI: http://www.codetic.net/
Version: 2.8.2
Text Domain: essential-addons-cs
*/

define( 'ESSENTIAL_ADDONS_CS_PATH', plugin_dir_path( __FILE__ ) );
define( 'ESSENTIAL_ADDONS_CS_URL', plugin_dir_url( __FILE__ ) );

add_action( 'wp_enqueue_scripts', 'essential_addons_cs_enqueue' );
add_action( 'cornerstone_register_elements', 'essential_addons_cs_register_elements' );
add_filter( 'cornerstone_icon_map', 'essential_addons_cs_icon_map' );

require_once( ESSENTIAL_ADDONS_CS_PATH.'admin/settings.php' );

/**
 * This function will return true for all activated modules
 */
function essential_addons_cs_activated_modules() {

   $eael_default_keys = array( 'count-down', 'creative-btn', 'img-comparison', 'instagram-feed', 'interactive-promo', 'lightbox', 'logo-carousel', 'post-block', 'post-carousel', 'post-grid', 'post-timeline', 'product-carousel', 'product-grid', 'social-icons', 'team-members', 'testimonial-slider' );

   $eael_default_settings  = array_fill_keys( $eael_default_keys, true );
   $eael_get_settings      = get_option( 'eacs_save_settings', $eael_default_settings );
   $eael_new_settings      = array_diff_key( $eael_default_settings, $eael_get_settings );

   if( ! empty( $eael_new_settings ) ) {
      $eael_updated_settings = array_merge( $eael_get_settings, $eael_new_settings );
      update_option( 'eacs_save_settings', $eael_updated_settings );
   }

   return $eael_get_settings = get_option( 'eacs_save_settings', $eael_default_settings );

}

function essential_addons_cs_register_elements() {

	$is_component_active = essential_addons_cs_activated_modules();

	if( $is_component_active['logo-carousel'] ) {
		cornerstone_register_element( 'EACS_Logo_Carousel', 'eacs-logo-carousel', ESSENTIAL_ADDONS_CS_PATH . 'includes/logo-carousel' );
		cornerstone_register_element( 'EACS_Logo_Carousel_Item', 'eacs-logo-carousel-item', ESSENTIAL_ADDONS_CS_PATH . 'includes/logo-carousel-item' );
	}
	if( $is_component_active['testimonial-slider'] ) {
		cornerstone_register_element( 'EACS_Testimonial_Slider', 'eacs-testimonial-slider', ESSENTIAL_ADDONS_CS_PATH . 'includes/testimonial-slider' );
		cornerstone_register_element( 'EACS_Testimonial_Item', 'eacs-testimonial-item', ESSENTIAL_ADDONS_CS_PATH . 'includes/testimonial-item' );
	}
	if( $is_component_active['team-members'] ) {
		cornerstone_register_element( 'EACS_Team_Members', 'eacs-team-members', ESSENTIAL_ADDONS_CS_PATH . 'includes/team-members' );
		cornerstone_register_element( 'EACS_Team_Item', 'eacs-team-item', ESSENTIAL_ADDONS_CS_PATH . 'includes/team-members-item' );
	}
	if( $is_component_active['product-carousel'] ) {
		cornerstone_register_element( 'EACS_Product_Carousel', 'eacs-product-carousel', ESSENTIAL_ADDONS_CS_PATH . 'includes/product-carousel' );
	}
	if( $is_component_active['product-grid'] ) {
		cornerstone_register_element( 'EACS_Product_Grid', 'eacs-product-grid', ESSENTIAL_ADDONS_CS_PATH . 'includes/product-grid' );
	}
	if( $is_component_active['interactive-promo'] ) {
		cornerstone_register_element( 'EACS_Interactive_Promo', 'eacs-interactive-promo', ESSENTIAL_ADDONS_CS_PATH . 'includes/interactive-promo' );
	}
	if( $is_component_active['instagram-feed'] ) {
		cornerstone_register_element( 'EACS_Instagram_Feed', 'eacs-instagram-feed', ESSENTIAL_ADDONS_CS_PATH . 'includes/instagram-feed' );
	}
	if( $is_component_active['count-down'] ) {
		cornerstone_register_element( 'EACS_Countdown', 'eacs-countdown', ESSENTIAL_ADDONS_CS_PATH . 'includes/countdown' );
	}
	if( $is_component_active['social-icons'] ) {
		cornerstone_register_element( 'EACS_Social_Icons', 'eacs-social-icons', ESSENTIAL_ADDONS_CS_PATH . 'includes/social-icons' );
		cornerstone_register_element( 'EACS_Social_Icons_Item', 'eacs-social-icons-item', ESSENTIAL_ADDONS_CS_PATH . 'includes/social-icons-item' );
	}
	if( $is_component_active['lightbox'] ) {
		cornerstone_register_element( 'EACS_Lightbox', 'eacs-lightbox', ESSENTIAL_ADDONS_CS_PATH . 'includes/lightbox' );
	}
	if( $is_component_active['creative-btn'] ) {
		cornerstone_register_element( 'EACS_Creative_Button', 'eacs-creative-button', ESSENTIAL_ADDONS_CS_PATH . 'includes/creative-button' );
	}
	if( $is_component_active['img-comparison'] ) {
		cornerstone_register_element( 'EACS_Image_Comparison', 'eacs-image-comparison', ESSENTIAL_ADDONS_CS_PATH . 'includes/image-comparison' );
	}
	if( $is_component_active['post-grid'] ) {
		cornerstone_register_element( 'EACS_Post_Grid', 'eacs-post-grid', ESSENTIAL_ADDONS_CS_PATH . 'includes/post-grid' );
		require_once( ESSENTIAL_ADDONS_CS_PATH. 'includes/shortcodes/post-grid.php' );
	}
	if( $is_component_active['post-block'] ) {
		cornerstone_register_element( 'EACS_Post_Block', 'eacs-post-block', ESSENTIAL_ADDONS_CS_PATH . 'includes/post-block' );
		require_once( ESSENTIAL_ADDONS_CS_PATH. 'includes/shortcodes/post-block.php' );
	}
	if( $is_component_active['post-timeline'] == true ) {
		cornerstone_register_element( 'EACS_Post_Timeline', 'eacs-post-timeline', ESSENTIAL_ADDONS_CS_PATH . 'includes/post-timeline' );
		require_once( ESSENTIAL_ADDONS_CS_PATH. 'includes/shortcodes/post-timeline.php' );
	}
	if( $is_component_active['post-carousel'] ) {
		cornerstone_register_element( 'EACS_Post_Carousel', 'eacs-post-carousel', ESSENTIAL_ADDONS_CS_PATH . 'includes/post-carousel' );
		require_once( ESSENTIAL_ADDONS_CS_PATH. 'includes/shortcodes/post-carousel.php' );
	}

}

function essential_addons_cs_enqueue() {
	$is_component_active = get_option( 'eacs_save_settings' );
	if( $is_component_active['logo-carousel'] || $is_component_active['post-carousel'] || $is_component_active['product-carousel'] || $is_component_active['team-members'] || $is_component_active['testimonial-slider'] ) {
		wp_enqueue_script( 'essential_addons_cs-swiper-js', ESSENTIAL_ADDONS_CS_URL . 'assets/swiper/swiper.min.js', array('jquery'), null, true );
	}
	if( $is_component_active['instagram-feed'] ) {
		wp_enqueue_script( 'essential_addons_cs-instagram-js', ESSENTIAL_ADDONS_CS_URL . 'assets/js/eacs-instafeed.min.js', array('jquery'), null, true );
	}
	if( $is_component_active['instagram-feed'] || $is_component_active['post-grid']  ) {
		wp_enqueue_script( 'essential_addons_cs-masonry-js', ESSENTIAL_ADDONS_CS_URL . 'assets/js/masonry.min.js', array('jquery'), null, true );
	}
	if( $is_component_active['lightbox'] ) {
		wp_enqueue_script( 'essential_addons_cs-lightbox-js', ESSENTIAL_ADDONS_CS_URL . 'assets/lightbox/lity.min.js', array('jquery'), null, true );
	}
	if( $is_component_active['img-comparison'] ) {
		wp_enqueue_script( 'essential_addons_cs-img-comp-js', ESSENTIAL_ADDONS_CS_URL . 'assets/js/cocoen.min.js', array('jquery'), null, true );
	}
	if( $is_component_active['count-down'] ) {
		wp_enqueue_script( 'essential_addons_cs-countdown-js', ESSENTIAL_ADDONS_CS_URL . 'assets/js/countdown.min.js', array('jquery'), null, true );
	}
	if( $is_component_active['post-block'] || $is_component_active['post-grid'] || $is_component_active['post-timeline'] ) {
		wp_enqueue_script( 'essential_addons_cs-load-more-js', ESSENTIAL_ADDONS_CS_URL . 'assets/js/load-more.js', array( 'jquery' ), null, true );
	}
	if( $is_component_active['img-comparison'] || $is_component_active['count-down'] ) {
		wp_enqueue_script( 'essential_addons_cs-script-js', ESSENTIAL_ADDONS_CS_URL . 'assets/js/eacs-scripts.js', array( 'jquery' ), null, true );
	}
	wp_enqueue_style( 'essential_addons_cs-swiper', ESSENTIAL_ADDONS_CS_URL . 'assets/swiper/swiper.min.css', array(), null );
	wp_enqueue_style( 'essential_addons_cs-lightbox-css', ESSENTIAL_ADDONS_CS_URL . 'assets/lightbox/lity.min.css', array(), null );
	wp_enqueue_style( 'essential_addons_cs-styles', ESSENTIAL_ADDONS_CS_URL . 'assets/styles/essential-addons-cs.css', array(), null );
}

function essential_addons_cs_icon_map( $icon_map ) {
	$icon_map['essential-addons-cs'] = ESSENTIAL_ADDONS_CS_URL . 'assets/svg/icons.svg';
	return $icon_map;
}


// Action menus

function eacs_add_settings_link( $links ) {
    $settings_link = sprintf( '<a href="admin.php?page=eacs-settings">' . __( 'Settings' ) . '</a>' );
    array_push( $links, $settings_link);
   return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'eacs_add_settings_link' );



// Redirect to options page

register_activation_hook(__FILE__, 'eacs_activate');
add_action('admin_init', 'eacs_redirect');

function eacs_activate() {
    add_option('eacs_do_activation_redirect', true);
}

function eacs_redirect() {
    if (get_option('eacs_do_activation_redirect', false)) {
        delete_option('eacs_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("admin.php?page=eacs-settings");
        }
    }
}

require_once('wp-updates-plugin.php');
new WPUpdatesPluginUpdater_1659( 'http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));
