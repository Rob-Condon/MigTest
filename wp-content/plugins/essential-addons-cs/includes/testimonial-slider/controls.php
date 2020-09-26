<?php

/**
 * Element Controls : Testimonial Slider
 */

return array(

	// Max Items

	'max_visible_items' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Max visible items', 'essential-addons-cs' ),
			'tooltip' => __( 'Carousel will automatically show less items to fit smaller screens. Limit the max amount here.', 'essential-addons-cs' ),
		),
    'suggest' => __( '3', 'essential-addons-cs' ),
	),

	// Max Items for Tablet

	'max_visible_items_tablet' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Max visible items for Tablet', 'essential-addons-cs' ),
			'tooltip' => __( 'Carousel will automatically show less items to fit smaller screens. Limit the max amount here.', 'essential-addons-cs' ),
		),
    'suggest' => __( '2', 'essential-addons-cs' ),
	),

	// Max Items for Mobile

	'max_visible_items_mobile' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Max visible items for Mobile', 'essential-addons-cs' ),
			'tooltip' => __( 'Carousel will automatically show less items to fit smaller screens. Limit the max amount here.', 'essential-addons-cs' ),
		),
    'suggest' => __( '1', 'essential-addons-cs' ),
	),



	// Auto Play

	'auto_play' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Auto Play', 'essential-addons-cs' ),
			'tooltip' => __( 'Will automatically play the carousel', 'essential-addons-cs' ),
		)
	),

	// Delay

	'autoplay_delay' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Autoplay Delay (ms)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the duration between slides (in ms).', 'essential-addons-cs' ),
		),
    	'suggest' => __( '5000', 'essential-addons-cs' ),
		'condition' => array(
      		'auto_play' => true
    	)
	),

	// Speed

	'transition_speed' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Transition Speed (ms)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the duration of transition between slides (in ms).', 'essential-addons-cs' ),
		),
    	'suggest' => __( '500', 'essential-addons-cs' ),
	),

	// Loop (instead of rewind)

	'loop' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Loop', 'essential-addons-cs' ),
			'tooltip' => __( 'Instead of rewinding at the end, simulate eternal looping.', 'essential-addons-cs' ),
		)
	),

	// Centered Slides

	'centered_slides' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Centered Slides?', 'essential-addons-cs' ),
			'tooltip' => __( ' 	If true, then active slide will be centered, not always on the left side.', 'essential-addons-cs' ),
		)
	),

	// Draggable

	'draggable' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Draggable?', 'essential-addons-cs' ),
			'tooltip' => __( 'Carousel items will be draggable by mouse', 'essential-addons-cs' ),
		)
	),

	// Auto Height

	'auto_height' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Auto Height?', 'essential-addons-cs' ),
			'tooltip' => __( 'Set to true and slider wrapper will adopt its height to the height of the currently active slide', 'essential-addons-cs' ),
		)
	),

	// Pagination

	'dot_nav' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Dot Pagination?', 'essential-addons-cs' ),
			'tooltip' => __( 'Enable Dot Pagination', 'essential-addons-cs' ),
		)
	),

	// Navigation

	'arrow_nav' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Arrow Navigation?', 'essential-addons-cs' ),
			'tooltip' => __( 'Enable Left and Right Arrow Navigation', 'essential-addons-cs' ),
		)
	),

	// Pagination Position
	
	'pagination_position' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Navigation Position', 'essential-addons-cs' ),
      'tooltip' => __( 'Select the navigation poisition', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'normal',          'label' => __( 'Normal', 'essential-addons-cs' ) ),
        array( 'value' => 'nav_top_left',  'label' => __( 'Navigation Top Left', 'essential-addons-cs' ) ),
        array( 'value' => 'nav_top_right', 'label' => __( 'Navigation Top Right', 'essential-addons-cs' ) ),
      ),
		),
		'condition' => array(
      'arrow_nav' => true
    )
	),


	// Add spacing

	'space_between' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Spacing between slides', 'essential-addons-cs' ),
			'tooltip' => __( 'Select spacing between the slide items.', 'essential-addons-cs' ),
		),
    'suggest' => __( '10', 'essential-addons-cs' ),
	),

	// Bullet Color

	'bullet_nav_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Pagination Bullet Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set color for bullet pagination', 'essential-addons-cs' ),
	    )

	),

	// Active Bullet Color

	'active_bullet_nav_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Active Bullet Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set color for active bullet', 'essential-addons-cs' ),
	    )

	),

	// Navigation Color

	'arrow_nav_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Arrow Navigation Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set color for arrows and bullets', 'essential-addons-cs' ),
	    )

	),

	// Navigation Background Color

	'arrow_nav_bg_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Navigation Background Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set background color for arrows', 'essential-addons-cs' ),
	    )

	),

	// Add border

	'add_border' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Add border to items?', 'essential-addons-cs' ),
			'tooltip' => __( 'Add border to each item', 'essential-addons-cs' ),
		)
	),

	// Border width

	'logo_border_width' => array(
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

	'logo_border_color' => array(
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
	// Text Align
	//

	'slide_alignment' => array(
		'type' => 'choose',
		'ui' => array(
			'title' => __( 'Set Alignment', 'cornerstone' ),
			'tooltip' =>__( 'Set a alignment for the text and image',  'essential-addons-cs' ),
		),
		'options' => array(
			'columns' => '4',
			'offValue' => '',
			'choices' => array(
				array( 'value' => 'eacs-testimonial-slide-default', 'icon' => fa_entity( 'ban' ),    'tooltip' => __( 'Default', 'cornerstone' ) ),
				array( 'value' => 'eacs-testimonial-slide-left', 'icon' => fa_entity( 'align-left' ),    'tooltip' => __( 'Left', 'cornerstone' ) ),
				array( 'value' => 'eacs-testimonial-slide-centered', 'icon' => fa_entity( 'align-center' ),  'tooltip' => __( 'Center', 'cornerstone' ) ),
				array( 'value' => 'eacs-testimonial-slide-right', 'icon' => fa_entity( 'align-right' ),   'tooltip' => __( 'Right', 'cornerstone' ) )
			)
		)
	),

	// Carousel Items

	'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'eacs-testimonial-item',
			'newTitle' => __('Testimonial %s', 'essential-addons-cs'),
			'floor' => 2,
			'capacity' => 100,
			'title_field' => 'heading'
		),
		'context' => 'content',
		'suggest' => array(
			array( 'heading' => __('Testimonial 1', 'essential-addons-cs') ),
			array( 'heading' => __('Testimonial 2', 'essential-addons-cs') ),
			array( 'heading' => __('Testimonial 3', 'essential-addons-cs') ),
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