<?php

/**
 * Element Controls: Social Icons Item
 */

return array(

	// Title

	'heading' => array(
		'type' => 'title',
		'suggest' => __( 'Social Icon', 'essential-addons-cs' ),
	),

	// Content

	'social_icon' => array(
	    'type' => 'icon-choose',
	    'ui' => array(
	        'title' => __( 'Choose Icon', 'essential-addons-cs' ),
	    ),
	    'context' => 'content',
	    'suggest' => 'facebook',
	  ),

	// URL

	'link_url' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'Link URL', 'essential-addons-cs' ),
	  'tooltip' => __( 'Provide URL for your social icon', 'essential-addons-cs' )
	),
	'context' => 'content',
	'suggest' => __( 'https://facebook.com', 'essential-addons-cs' )
	),

	// Open in New window

	'link_target' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Open in new window', 'essential-addons-cs' ),
			'tooltip' => __( 'Enable if you want to open the link in new tab', 'essential-addons-cs' ),
		)
	),
	
	// Icon Color


	'icon_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Icon Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set color for the icon', 'essential-addons-cs' ),
	    )

	),

	// Icon Background Color


	'icon_bg_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Icon Background Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set background color for icon', 'essential-addons-cs' ),
	    )

	),

	// Icon Hover Color


	'icon_hover_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Icon Hover Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set color on hover for the icon', 'essential-addons-cs' ),
	    )

	),

	// Icon Hover Background Color


	'icon_hover_bg_color' => array(
	    'type' => 'color',
	    'ui' => array(
	        'title'   => __( 'Icon Hover Background Color', 'essential-addons-cs' ),
	        'tooltip' => __( 'Set background color on hover for icons', 'essential-addons-cs' ),
	    )

	),

);