<?php

/**
 * Element Controls : Interactive Promo
 */

return array(

	'image' => array(
		'type' => 'image',
		'ui' => array(
			'title' => __( 'Promo Image', 'essential-addons-cs' ),
      'tooltip' => __( 'Choose Promo Image.', 'essential-addons-cs' ),
		)
  ),

	'alt_tag' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'ALT Tag', 'essential-addons-cs' ),
	  'tooltip' => __( 'Provide ALT Tag for Image', 'essential-addons-cs' )
	),
	'context' => 'content',
	'suggest' => __( '', 'essential-addons-cs' )
	),

	'heading' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Heading &amp; Content', 'essential-addons-cs' ),
			'tooltip' => __( 'Tooltip to describe your controls.', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( 'Heading', 'essential-addons-cs' ),
	),

	'content' => array(
		'type'    => 'textarea',
		'context' => 'content',
		'suggest' => __( 'Click to inspect, then edit as needed.', 'essential-addons-cs' ),
	),

	// URL

	'promo_url' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'Link URL', 'essential-addons-cs' ),
	  'tooltip' => __( 'Provide URL to link the promo', 'essential-addons-cs' )
	),
	'context' => 'content',
	'suggest' => __( '#', 'essential-addons-cs' )
	),

	// Open in New window

	'link_target' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Open in new window', 'essential-addons-cs' ),
			'tooltip' => __( 'Enable if you want to open the link in new tab', 'essential-addons-cs' ),
		)
	),

	'heading_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Heading Color', 'essential-addons-cs' )
		)
	),

	'content_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Content Color', 'essential-addons-cs' )
		)
	),

	'overlay_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Overlay Color', 'essential-addons-cs' )
		)
	),

	// Effect

	'promo_effect' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Set Effect', 'essential-addons-cs' ),
      'tooltip' => __( 'Select the effect of your promo', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'effect-lily',        'label' => __( 'Effect 1', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-sadie',       'label' => __( 'Effect 2', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-layla',       'label' => __( 'Effect 3', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-oscar',       'label' => __( 'Effect 4', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-marley',      'label' => __( 'Effect 5', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-ruby',        'label' => __( 'Effect 6', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-roxy',        'label' => __( 'Effect 7', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-bubba',       'label' => __( 'Effect 8', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-romeo',       'label' => __( 'Effect 9', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-sarah',       'label' => __( 'Effect 10', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-chico',       'label' => __( 'Effect 11', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-milo',        'label' => __( 'Effect 12', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-apollo',      'label' => __( 'Effect 13', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-jazz',        'label' => __( 'Effect 14', 'essential-addons-cs' ) ),
        array( 'value' => 'effect-ming',        'label' => __( 'Effect 15', 'essential-addons-cs' ) )
      ),
		),
	),
);