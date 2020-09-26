<?php

/**
 * Element Controls : Post Timeline
 */

return array(

	// Post Type

	'post_type' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Post Type', 'essential-addons-cs' ),
      'tooltip' => __( 'Choose between standard posts or portfolio posts.', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'post',        'label' => __( 'Post', 'essential-addons-cs' ) ),
        array( 'value' => 'portfolio',    'label' => __( 'Portfolio', 'essential-addons-cs' ) )
      ),
		),
	),

	// Post Count

	'max_post_count' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Post Count', 'essential-addons-cs' ),
			'tooltip' => __( 'Set how many post you want to display.', 'essential-addons-cs' ),
		),
    'suggest' => __( '4', 'essential-addons-cs' ),
	),

	// Show Excerpt

	'show_excerpt' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Show Excerpt?', 'essential-addons-cs' ),
			'tooltip' => __( 'Show or hide excerpt', 'essential-addons-cs' ),
		)
	),

	// Excerpt length

	'excerpt_length' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Excerpt Length', 'essential-addons-cs' ),
			'tooltip' => __( 'Enter the number of words you want to show as excerpts', 'essential-addons-cs' ),
		),
		'condition' => array(
      'show_excerpt' => true
    ),
    'suggest' => __( '20', 'essential-addons-cs' ),
	),

	// Hide Featured Image

	'hide_featured_image' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Hide Featured Image', 'essential-addons-cs' ),
			'tooltip' => __( 'Hide or Show featured image', 'essential-addons-cs' ),
		)
	),


	// Offset

	'offset' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'Offset', 'essential-addons-cs' ),
	  'tooltip' => __( 'Enter a number to offset initial starting post of your Recent Posts.', 'essential-addons-cs' )
	),
	'context' => 'offset',
	'suggest' => ''
	),

	// Category

	'category' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'Category', 'essential-addons-cs' ),
	  'tooltip' => __( 'To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', 'essential-addons-cs' )
	),
	'context' => 'category',
	'suggest' => ''
	),

	// Show Load More
	'show_loadmore' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Show Load More?', 'essential-addons-cs' ),
			'tooltip' => __( 'Show or hide load more', 'essential-addons-cs' ),
		),
		'condition' => array(
      		'post_type' => 'post'
    	),
	),

	// Load More Text
	'loadmore_text' => array(
		'type' 		=> 'text',
		'ui' 		=> array(
		  'title' 	=> __( 'Loadmore Button Text', 'essential-addons-cs' ),
		),
		'context' 	=> 'show_loadmore',
		'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
	),

	'loadmore_font_size' => array(
        'type' => 'number',
        'ui' => array(
            'title' => __('Loadmore Button Font Size', 'essential-addons-cs'),
            'tooltip' => __('Set button font size in pixel value', 'essential-addons-cs'),
        ),
        'suggest' => __('16', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),

    'loadmore_font_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Loadmore Font Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#ffffff', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),

    'loadmore_font_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Loadmore Font Hover Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#00a94e', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),

    'loadmore_border_main_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Loadmore Border Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#00a94e', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),
    'loadmore_border_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Loadmore Border Hover Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#00a94e', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),

    'loadmore_background_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Loadmore Background Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#222', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),

    'loadmore_background_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Loadmore Background Hover Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#27bdbd', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),

    'loadmore_border_size' => array(
        'type' => 'number',
        'ui' => array(
            'title' => __('Loadmore Button Border Width (px)', 'essential-addons-cs'),
            'tooltip' => __('Set border width in pixel value', 'essential-addons-cs'),
        ),
        'suggest' => __('2', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),


    'loadmore_border_radius' => array(
        'type' => 'number',
        'ui' => array(
            'title' => __('Loadmore Border Radius (px)', 'essential-addons-cs'),
            'tooltip' => __('Set border radius in pixel value', 'essential-addons-cs'),
        ),
        'suggest' => __('2', 'essential-addons-cs'),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),

    // Button Padding
    'loadmore_button_padding' => array(
        'type' => 'dimensions',
        'ui' => array(
            'title'   => __( 'Loadmore Button Padding', 'essential-addons-cs' )
        ),
        'condition' => array(
      		'show_loadmore' => true,
      		'post_type' => 'post'
    	),
    ),


	// Bullet Color


	'timeline_bullet_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Timeline Bullet Color)', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set color for timeline bullets', 'essential-addons-cs' ),
	    )
	),

	// Bullet Border Color


	'timeline_bullet_border_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Timeline Bullet Border Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set border color for timeline bullets', 'essential-addons-cs' ),
	    )
	),

	// Timeline Line Color


	'timeline_line_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Timeline Vertical line Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set border color for timeline vertical line', 'essential-addons-cs' ),
	    )
	),


	// Border and Arrow Color

	'timeline_border_arrow_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Border & Arrow Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set border and arrow color', 'essential-addons-cs' ),
	    )

	),
	// Date background Color

	'timeline_date_bg_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Date Background Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set background color for date', 'essential-addons-cs' ),
	    )

	),
	// Date text Color

	'timeline_date_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Date Text Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set color for date', 'essential-addons-cs' ),
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