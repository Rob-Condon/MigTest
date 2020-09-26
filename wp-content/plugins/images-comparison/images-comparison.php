<?php

/*
Plugin Name: Before & After Images Comparison
Plugin URI: http://demo.curlythemes.com/timetable-wordpress-plugin/
Description: Before & After Image comparison shortcode & addon for Visual Composer
Version: 1.0.1
Author: Curly Themes
Author URI: http://demo.curlythemes.com
Text Domain: ImagesComparison
Domain Path: /lang
*/

class ImagesComparison {

  function __construct(){

    add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
    add_shortcode( 'images-comparison', array( $this,  'imagesComparisonShortcode' ) );

    add_action( 'vc_before_init', array( $this, 'vc_images_comparison' ) );
		//add_shortcode( 'images-comparison_vc', array( $this, 'shape' ) );

  }

  public function vc_images_comparison() {

			/** Carousel Container */
			vc_map( array(
			   "name" => __("Image Comparison", 'xtender'),
			   "base" => "images-comparison",
			   "show_settings_on_create" => true,
			   "category" => __('xtender', 'xtender'),
			   "params" => array(
          array(
							"type" => "attach_image",
							"heading" => __("Before Image", 'xtender'),
							"param_name" => "image_1",
							'edit_field_class' => 'vc_col-sm-6'
					),
          array(
							"type" => "attach_image",
							"heading" => __("After Image", 'xtender'),
							"param_name" => "image_2",
							'edit_field_class' => 'vc_col-sm-6'
					),
          array(
 							"type" => "textfield",
 							"heading" => __("Before Label", 'xtender'),
 							"param_name" => "before_label",
							'edit_field_class' => 'vc_col-sm-6',
 					),
          array(
 							"type" => "textfield",
 							"heading" => __("After Label", 'xtender'),
 							"param_name" => "after_label",
							'edit_field_class' => 'vc_col-sm-6',
 					),
          array(
 							"type" => "textfield",
 							"heading" => __("Default Offset Point", 'xtender'),
 							"param_name" => "default_offset_pct",
							'edit_field_class' => 'vc_col-sm-6',
 							"value" => 0.5
 					),
          array(
 							"type" => "dropdown",
 							"heading" => __("Orientation", 'xtender'),
 							"param_name" => "orientation",
							'edit_field_class' => 'vc_col-sm-6',
 							"value" => array(
                'Horizontal' => 'horizontal',
                'Vertical' => 'vertical'
              )
 					),
 					array(
 						 "type" => "css_editor",
 						 "heading" => __("Style", 'xtender'),
 						 'edit_field_class' => 'vc_col-sm-12 vc_column',
 						 'group' => __( 'Design options', 'xtender' ),
 						 "param_name" => "css"
 					),
 					array(
 							"type" => "textfield",
 							"heading" => __("CSS Classes", 'xtender'),
 							"param_name" => "el_css",
 							"value" => null
 					)
				)
			) );

		}

  public static function images_comparison_get_image_id($image_url) {
  	global $wpdb;
  	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
          return $attachment[0];
  }

  function imagesComparisonShortcode( $atts, $content = '' ){

    $atts = shortcode_atts( array(
			'default_offset_pct' => 0.5,
			'orientation' => 'horizontal',
			'before_label' => null,
			'after_label'	 => null,
      'image_1'	 => null,
      'image_2'	 => null,
      'el_css' => null,
      'css' => null,
		), $atts, 'images-comparison' );

    extract( $atts );

    if( ! wp_script_is( 'images-comparison-scripts' ) ) wp_enqueue_script( 'images-comparison-scripts' );

    $attributes = array();

    foreach( $atts as $key => $value ){
      if( ! is_null( $value ) && ! in_array( $key, array( 'image_1', 'image_2' ) ) ){
        $attributes[] = "data-{$key}='" . esc_attr( $value ) . "'";
      }
    }

    if( ! is_null( $atts['image_1'] ) && ! is_null( $atts['image_2'] ) ){

      if( filter_var( $atts['image_1'], FILTER_VALIDATE_URL ) ){
        $atts['image_1'] = self::images_comparison_get_image_id( $atts['image_1'] );
      }

      if( filter_var( $atts['image_2'], FILTER_VALIDATE_URL ) ){
        $atts['image_2'] = self::images_comparison_get_image_id( $atts['image_2'] );
      }

      $content = '';
      $content .= wp_get_attachment_image( $atts['image_1'], 'large' );
      $content .= wp_get_attachment_image( $atts['image_2'], 'large' );
    }

    $attributes = implode( ' ', $attributes );

    if( defined( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' ) && function_exists('vc_shortcode_custom_css_class') ){
      $el_css .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'images-comparison', $atts );
    }

    return "<div class='images-comparison__container {$el_css}'><div class='images-comparison' {$attributes}>{$content}</div></div>";

  }

  function register_assets(){

    wp_enqueue_script(
  		'images-comparison-scripts',
  		plugins_url( '/images-comparison' ) . '/assets/front/js/front-scripts-min.js',
  		array( 'jquery', 'imagesloaded' ),
  		filter_var( WP_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? rand() : null,
  		true
  	);


  	wp_enqueue_style(
  		'images-comparison-style',
  		plugins_url( '/images-comparison' ) . '/assets/front/css/front.css',
  		null,
  		filter_var( WP_DEBUG, FILTER_VALIDATE_BOOLEAN ) || is_user_logged_in() ? rand() : '1.0',
  		'all'
  	);

  }

}

new ImagesComparison();

?>
