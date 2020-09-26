<?php

/**
 * Element Controls : Countdown
 */

return array(

	// Set date

	// 'countdown_date' => array(
	// 	'type'    => 'date',
	// 	'ui' => array(
	// 		'title' => __( 'Set Date', 'essential-addons-cs' ),
	// 	),
	// 	'options' => array(
	// 	'choose_format' => false,
	// 	'default_format'   => 'YYYY-MM-DD',
	// 	)
	// ),

	// Set Date

	'countdown_date' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Set Date (YYYY/MM/DD HH:MM)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the date when the countdown will finish.', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( 'YYYY/MM/DD HH:MM', 'essential-addons-cs' ),
	),


	// Box Color

	'item_bg_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Box Background Color', 'essential-addons-cs' ),
		),
	),

	// Digit Text Color

	'digit_text_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Digit Color', 'essential-addons-cs' ),
		)
	),

	// Label Color

	'label_text_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Label Text Color', 'essential-addons-cs' ),
		),
	),

	// Digit font size

	'digit_font_size' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Digit Font Size (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the font size for countdown numbers', 'essential-addons-cs' ),
		),
    'suggest' => __( '54', 'essential-addons-cs' ),
	),


	// Label font size

	'label_font_size' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Set Label Font Size (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the font size for countdown labels (i.e. Days, Hours)', 'essential-addons-cs' ),
		),
    'suggest' => __( '18', 'essential-addons-cs' ),
	),


	// Item Spacing

	'item_spacing' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Item Spacing (px)', 'essential-addons-cs' ),
			'tooltip' => __( 'Set spacing between items', 'essential-addons-cs' ),
		),
    'suggest' => __( '10', 'essential-addons-cs' ),
	),

	// Item Padding

	'item_padding' => array(
	 	'type' => 'dimensions',
	 	'ui' => array(
			'title'   => __( 'Spacing within boxes', 'essential-addons-cs' )
		)
	),


	// Add border

	'add_border' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Add border to boxes?', 'essential-addons-cs' ),
			'tooltip' => __( 'Add border to each items', 'essential-addons-cs' ),
		)
	),

	// Border width

	'item_border_width' => array(
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

	'item_border_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Border Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set border color', 'essential-addons-cs' ),
	    ),

		'condition' => array(
      'add_border' => true
    )

	),


	'show_label_block' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Labels Block?', 'essential-addons-cs' ),
			'tooltip' => __( 'Display labels block or inline', 'essential-addons-cs' ),
		)
	),

	'show_separator' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Display Separator?', 'essential-addons-cs' ),
			'tooltip' => __( 'Display the colon separator', 'essential-addons-cs' ),
		)
	),


	// Custom Label


	'show_days' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Show Days?', 'essential-addons-cs' ),
			'tooltip' => __( 'Show or hide Days', 'essential-addons-cs' ),
		)
	),

	'countdown_days_label' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Label for Days', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the label or leave empty to hide', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( 'Days', 'essential-addons-cs' ),

		'condition' => array(
      'show_days' => true
    )
	),

	'show_hours' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Show Hours?', 'essential-addons-cs' ),
			'tooltip' => __( 'Show or hide Hours', 'essential-addons-cs' ),
		)
	),

	'countdown_hours_label' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Label for Hours', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the label or leave empty to hide', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( 'Hours', 'essential-addons-cs' ),
		'condition' => array(
      'show_hours' => true
    )
	),

	'show_minutes' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Show Minutes?', 'essential-addons-cs' ),
			'tooltip' => __( 'Show or hide Minutes', 'essential-addons-cs' ),
		)
	),

	'countdown_minutes_label' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Label for Minutes', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the label or leave empty to hide', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( 'Minutes', 'essential-addons-cs' ),
		'condition' => array(
      'show_minutes' => true
    )
	),

	'show_seconds' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Show Seconds?', 'essential-addons-cs' ),
			'tooltip' => __( 'Show or hide Seconds', 'essential-addons-cs' ),
		)
	),

	'countdown_seconds_label' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Label for Seconds', 'essential-addons-cs' ),
			'tooltip' => __( 'Set the label or leave empty to hide', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( 'Seconds', 'essential-addons-cs' ),
		'condition' => array(
      'show_seconds' => true
    )
	),


);