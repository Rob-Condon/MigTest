<?php

/**
 * Element Controls : Social Icons
 */

return array(

	// Social Icons Items

	'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'eacs-social-icons-item',
			'newTitle' => __('Social Icon %s', 'essential-addons-cs'),
			'floor' => 1,
			'capacity' => 100,
			'title_field' => 'heading'
		),
		'context' => 'content',
		'suggest' => array(
			array( 'heading' => __('Facebook', 'essential-addons-cs') ),
			array( 'heading' => __('Social Icon 2', 'essential-addons-cs') ),
		)
	),

	// Icon font size

	'icon_font_size' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Icon Font Size (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the font size for the icons', 'essential-addons-cs' ),
		),
    'suggest' => __( '36', 'essential-addons-cs' ),
	),

	// Icon Width

	'icon_width' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Icon Width (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the width for the icons', 'essential-addons-cs' ),
		),
    'suggest' => __( '50', 'essential-addons-cs' ),
	),

	// Icon Height

	'icon_height' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Icon Height (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the height for the icons', 'essential-addons-cs' ),
		),
    'suggest' => __( '50', 'essential-addons-cs' ),
	),


	// Add spacing

	'icon_margin' => array(
	 	'type' => 'dimensions',
	 	'ui' => array(
			'title'   => __( 'Spacing between Icons',  'essential-addons-cs' ),
			'tooltip' => __( 'Select spacing between icons.', 'essential-addons-cs' ),
		)
	),


	// Icon Type

	'icon_style' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Icon Style', 'essential-addons-cs' ),
      'tooltip' => __( 'Set the icon style', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'icon_sqaure',      'label' => __( 'Square', 'essential-addons-cs' ) ),
        array( 'value' => 'icon_rounded',     'label' => __( 'Rounded', 'essential-addons-cs' ) ),
        array( 'value' => 'icon_circle', 	  'label' => __( 'Circle', 'essential-addons-cs' ) )
      ),
		),
	),


	// Icon Animation

	'icon_animation' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Hover Animation', 'essential-addons-cs' ),
      'tooltip' => __( 'Set animation for hover', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'none',      				  'label' => __( 'No Animation', 'essential-addons-cs' ) ),
        array( 'value' => 'icon_animation_spin',      'label' => __( 'Spin', 'essential-addons-cs' ) ),
        array( 'value' => 'icon_animation_bounce', 	  'label' => __( 'Bounce', 'essential-addons-cs' ) )
      ),
		),
	),


	// Add border

	'add_border' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Add border to icons?', 'essential-addons-cs' ),
			'tooltip' => __( 'Add border to each icon', 'essential-addons-cs' ),
		)
	),

	// Border width

	'icon_border_width' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Border width', 'essential-addons-cs' ),
			'tooltip' => __( 'Set border width in pixel value', 'essential-addons-cs' ),
		),
    'suggest' => __( '1', 'essential-addons-cs' ),

		'condition' => array(
      'add_border' => true
    )
	),

	// Border Color

	'icon_border_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Border Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set border color', 'essential-addons-cs' ),
	    ),

		'condition' => array(
      'add_border' => true
    )

	),



	//
	// Visibility
	//

	'visibility' => array(
		'type' => 'multi-choose',
		'ui' => array(
			'title' => __( 'Hide based on screen width', 'essential-addons-cs' ),
			'toolip' => __( 'Hide this element at different screen widths. Keep in mind that the &ldquo;Extra Large&rdquo; toggle is 1200px+, so you may not see your element disappear if your preview window is not large enough.', 'cornerstone' )
		),
		'options' => array(
			'columns' => '5',
			'choices' => array(
				array( 'value' => 'xl', 'icon' => fa_entity( 'desktop' ), 'tooltip' => __( 'XL', 'essential-addons-cs' ) ),
				array( 'value' => 'lg', 'icon' => fa_entity( 'laptop' ),  'tooltip' => __( 'LG', 'essential-addons-cs' ) ),
				array( 'value' => 'md', 'icon' => fa_entity( 'tablet' ),  'tooltip' => __( 'MD', 'essential-addons-cs' ) ),
				array( 'value' => 'sm', 'icon' => fa_entity( 'tablet' ),  'tooltip' => __( 'SM', 'essential-addons-cs' ) ),
				array( 'value' => 'xs', 'icon' => fa_entity( 'mobile' ),  'tooltip' => __( 'XS', 'essential-addons-cs' ) ),
			)
		)
	)
);