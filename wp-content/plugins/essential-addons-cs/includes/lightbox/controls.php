<?php

/**
 * Element Controls : EA Lightbox
 */


return array(

	'lightbox_type' => array(
		'type'    => 'select',
        'context' => 'content',
		'ui' => array(
	    	'title' => __( 'Select Ligthtbox Type', 'essential-addons-cs' ),
			'tooltip' => __( 'What type of lightbox you want to show?', 'essential-addons-cs' ),
		),
		'options' => array(
	        'choices' => array(
	            array( 'value' => 'lightbox-image',  'label' => __( 'Image', 'essential-addons-cs' ) ),
	            array( 'value' => 'lightbox-content', 'label' => __( 'HTML Content', 'essential-addons-cs' ) ),
	            array( 'value' => 'lightbox-url', 'label' => __( 'External URL (Page/Video/Map)', 'essential-addons-cs' ) )
	        )
		)
	),


	// lightbox image

	'lightbox_image' => array(
		'type' => 'image',
		'ui' => array(
			'title' => __( 'Lightbox Image', 'essential-addons-cs' ),
      'tooltip' => __( 'Choose image for lightbox', 'essential-addons-cs' ),
		),
        'condition' => array(
            'lightbox_type' => 'lightbox-image'
        )
  	),

	'lightbox_content' => array(
		'type'    => 'editor',
        'context' => 'content',
        'expandable' => false,
		'ui' => array(
		    'title' => __( 'Lightbox Content', 'essential-addons-cs' ),
			'tooltip' => __( 'Content that will display in lightbox popup.', 'essential-addons-cs' ),
		),
        'condition' => array(
            'lightbox_type' => 'lightbox-content'
        )
	),


	'lightbox_url' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( '', 'essential-addons-cs' ),
		'ui' => array(
	    	'title' => __( 'Provide Page/Video/Map URL', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide external page URL including YouTube, Vimeo, Google Map etc.', 'essential-addons-cs' ),
		),
        'condition' => array(
            'lightbox_type' => 'lightbox-url'
        )
	),


	'lightbox_youtube' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( '', 'essential-addons-cs' ),
		'ui' => array(
	    	'title' => __( 'YouTube Video URL', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide your for the YouTube video', 'essential-addons-cs' ),
		),
        'condition' => array(
            'lightbox_type' => 'lightbox-youtube'
        )
	),


	'lightbox_vimeo' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( '', 'essential-addons-cs' ),
		'ui' => array(
	    	'title' => __( 'Vimeo Video URL', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide your for the Vimeo video', 'essential-addons-cs' ),
		),
        'condition' => array(
            'lightbox_type' => 'lightbox-vimeo'
        )
	),

	'lightbox_map' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( '', 'essential-addons-cs' ),
		'ui' => array(
	    	'title' => __( 'Google Map URL', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide URL of your Google Map', 'essential-addons-cs' ),
		),
        'condition' => array(
            'lightbox_type' => 'lightbox-map'
        )
	),


	'trigger_on' => array(
		'type'    => 'select',
        'context' => 'content',
		'ui' => array(
	    	'title' => __( 'Trigger Lightbox On', 'essential-addons-cs' ),
			'tooltip' => __( 'When should the popup be initiated.', 'essential-addons-cs' ),
		),
		'options' => array(
	        'choices' => array(
	            array( 'value' => 'button',  'label' => __( 'Button Click', 'essential-addons-cs' ) ),
	            array( 'value' => 'element', 'label' => __( 'External Element', 'essential-addons-cs' ) ),
	            array( 'value' => 'load', 'label' => __( 'Page Load', 'essential-addons-cs' ) )
	        )
		)
	),

	'button_size' => array(
		'type'    => 'select',
        'context' => 'content',
        'suggest' => __( 'Click Me', 'essential-addons-cs' ),
		'ui' => array(
	    	'title' => __( 'Button Size', 'essential-addons-cs' ),
			'tooltip' => __( 'How big of a button would you like?', 'essential-addons-cs' ),
		),
		'options' => array(
	        'choices' => array(
	            array( 'value' => 'default',  'label' => __( 'Theme Default', 'essential-addons-cs' ) ),
	            array( 'value' => 'x-btn-small', 'label' => __( 'Small', 'essential-addons-cs' ) ),
	            array( 'value' => 'x-btn-medium', 'label' => __( 'Medium', 'essential-addons-cs' ) ),
	            array( 'value' => 'x-btn-large', 'label' => __( 'Large', 'essential-addons-cs' ) ),
	        ),
        ),
        'condition' => array(
            'trigger_on' => 'button'
        )
	),

	'button_text' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( 'Click Me', 'essential-addons-cs' ),
		'ui' => array(
	    	'title' => __( 'Button Text', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide a title for this button', 'essential-addons-cs' ),
		),
        'condition' => array(
            'trigger_on' => 'button'
        )
	),

	'identifier' => array(
		'type'    => 'text',
        'context' => 'content',
        'suggest' => __( '#open-popup or .open-popup' , 'essential-addons-cs'),
		'ui' => array(
	    	'title' => __( 'Element Identifier', 'essential-addons-cs' ),
			'tooltip' => __( 'Enter the ID or Class of the page element that will trigger the lightbox.
								Ex. #open-popup or .open-popup', 'essential-addons-cs' ),
		),
        'condition' => array(
            'trigger_on' => 'element'
        )
	),

	'delay' => array(
		'type'    => 'number',
        'context' => 'content',
        'suggest' => __( '2', 'essential-addons-cs' ),
		'ui' => array(
	    	'title' => __( 'Delay (seconds)', 'essential-addons-cs' ),
			'tooltip' => __( 'Time delay before lightbox popup on page load (in seconds).', 'essential-addons-cs' ),
		),
        'condition' => array(
            'trigger_on' => 'load'
        )
	),

	// Content Background Color

	'content_bg_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Content Background Color', 'essential-addons-cs' ),
		),
	'suggest' => __( '#fff', 'essential-addons-cs' ),
	),

	// Close button color

	'close_btn_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Close button color', 'essential-addons-cs' ),
		),
	'suggest' => __( '#333', 'essential-addons-cs' ),
	),

	// Close button background color

	'close_btn_bg_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Close button background color', 'essential-addons-cs' ),
		),
	'suggest' => __( '#f1f1f1', 'essential-addons-cs' ),
	),

	// Lightbox Content Width

	'popup_width' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Lightbox Content Width (%)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set Lightbox Content Width', 'essential-addons-cs' ),
		),
    'suggest' => __( '80', 'essential-addons-cs' ),
	),

	// Lightbox Content Max Width

	'popup_max_width' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Lightbox Content Max Width (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set Lightbox Content Max Width', 'essential-addons-cs' ),
		),
    'suggest' => __( '650', 'essential-addons-cs' ),
	),

	// Lightbox Content border radius

	'popup_border_radius' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Content border radius (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set border radius value if you want to make it rounded', 'essential-addons-cs' ),
		),
    'suggest' => __( '0', 'essential-addons-cs' ),
	),

	// Content Padding

	'popup_padding' => array(
	 	'type' => 'dimensions',
	 	'ui' => array(
			'title'   => __( 'Padding for lightbox content', 'essential-addons-cs' )
		)
	),
	// Enable Overlay

	'enable_overlay' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Enable dark overlay?', 'essential-addons-cs' ),
			'tooltip' => __( 'Enable dark overlay for whole page', 'essential-addons-cs' ),
		)
	),

	'overlay_bg_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Overlay Background Color', 'essential-addons-cs' ),
		),
        'condition' => array(
            'enable_overlay' => true
        ),
	'suggest' => __( 'rgba(0, 0, 0, 0.75);', 'essential-addons-cs' ),
	),


);
