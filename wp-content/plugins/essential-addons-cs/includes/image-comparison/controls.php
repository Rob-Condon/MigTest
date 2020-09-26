<?php

/**
 * Element Controls : Image Comparison
 */

return array(

	'image_before' => array(
		'type' => 'image',
		'ui' => array(
			'title' => __( 'First Image', 'essential-addons-cs' ),
      'tooltip' => __( 'Choose first image.', 'essential-addons-cs' ),
		)
  ),

	'image_before_alt' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'First Image ALT Tag', 'essential-addons-cs' ),
	  'tooltip' => __( 'Provide ALT Tag for Image', 'essential-addons-cs' )
	),
	'context' => 'content',
	'suggest' => __( '', 'essential-addons-cs' )
	),

	'image_after' => array(
		'type' => 'image',
		'ui' => array(
			'title' => __( 'Second Image', 'essential-addons-cs' ),
      'tooltip' => __( 'Choose second image.', 'essential-addons-cs' ),
		)
  ),

	'image_after_alt' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'Second Image ALT Tag', 'essential-addons-cs' ),
	  'tooltip' => __( 'Provide ALT Tag for Image', 'essential-addons-cs' )
	),
	'context' => 'content',
	'suggest' => __( '', 'essential-addons-cs' )
	),

	'container_width_control' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Set max width for the container?', 'essential-addons-cs' ),
			'tooltip' => __( 'Set max width for the container', 'essential-addons-cs' ),
		)
	),

	'container_max_width' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Container Max Width (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set container maximum width in pixel', 'essential-addons-cs' ),
		),
    'suggest' => __( '650', 'essential-addons-cs' ),
		'condition' => array(
      'container_width_control' => true
    )
	),

	'comp_line_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Comparison Line Color', 'essential-addons-cs' )
		)
	),

	'comp_grabber_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Comparison Grabber Color', 'essential-addons-cs' )
		)
	),

	'container_border_radius' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Container border radius (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set border radius value if you want to make it rounded', 'essential-addons-cs' ),
		),
    'suggest' => __( '0', 'essential-addons-cs' ),
	),


	// Add border

	'container_add_border' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Add border to container?', 'essential-addons-cs' ),
			'tooltip' => __( 'Add border to the image container', 'essential-addons-cs' ),
		)
	),

	// Border width

	'container_border_width' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Border width', 'essential-addons-cs' ),
			'tooltip' => __( 'Set border width in pixel value', 'essential-addons-cs' ),
		),
    'suggest' => __( '1', 'essential-addons-cs' ),

		'condition' => array(
      'container_add_border' => true
    )
	),

	// Border Color

	'container_border_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Border Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set border color', 'essential-addons-cs' ),
	    ),

		'condition' => array(
      'container_add_border' => true
    )

	),

);